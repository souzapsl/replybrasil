<?php

/**
 * Upload
 * Faz o upload de um arquivo txt e mostra seu conteúdo
 * @copyright (c) 2016, Paulo Souza
 * @author PAULO
 */
class Upload {
    
    /**
     * Mensagens durante o upload
     * @var string 
     */
    public $message = "";
    
    /**
     * O arquivo enviado
     * @var array 
     */
    private $file;
    
    /**
     * Extensão do arquivo enviado
     * @var string 
     */
    private $ext;
    
    /**
     * Nome do arquivo enviado
     * @var string 
     */
    private $name;
    
    /**
     * O novo nome para o arquivo
     * @var string 
     */
    private $new_file;
    
    /**
     * Nome temporário do arquivo no processo de upload
     * @var string 
     */
    private $tmp_name;
  
    /**
     * PATH da pasta de upload de arquivos
     * @var string 
     */
    private $uploaddir = 'files/';
    
    /**
     * Extensões de arquivos permimitas
     * @var array 
     */
    private $extensions_perm = array("txt");
    
    public function __construct($file) {
        $this->file = $file;
        $this->ext = pathinfo($this->file['name'], PATHINFO_EXTENSION);
        $this->name = $this->file['name'];
        $this->tmp_name = $this->file['tmp_name'];
    }

    /**
     * Efatua validações e chama o upload do arquivo
     * @return boolean
     */
    public function upload(){
       
        $this->new_file = $this->uploaddir . $this->fileName();
        
        if( $this->validFile() ){
            return $this->moveFile();
        }
    }
    
    /**
     * Faz o upload do arquivo
     * @return boolean
     */
    public function moveFile(){
        if (move_uploaded_file($this->tmp_name, $this->new_file)) {
            $this->message = "Arquivo enviado com sucesso";
            return true;
        }
        $this->message = "Erro au efetuar upload do arquivo";
        return false;
    }

    /**
     * Checa se foi enviado um arquivo no formulário
     * @return boolean
     */
    public function checkFile(){
        if( ! empty($this->name) ) {
            return true;
        }
        $this->message = "Não foi selecionado um arquivo";
        return false;
    }
    
    /**
     * Checa se a extensão de arquivo enviada é permitida
     * @return boolean
     */
    public function checkExtension(){
        if( ! empty($this->name) && in_array($this->ext, $this->extensions_perm)) {
            return true;
        }
        $this->message = "Extensão de arquivo não permitida";
        return false;
    }
    
    /**
     * Validação do arquivo
     * @return boolean
     */
    public function validFile(){
        return $this->checkFile() && $this->checkExtension();
    }
    

    /**
     * Retorna o novo nome para o arquivo txt
     * @param string $ext
     * @return string
     */
    public function fileName(){
        return date('d-m-Y_H_i_s-') . time() . "." . $this->ext;
    }
    
    /**
     * Retorna o buffet do arquivo enviado
     * @return mixed
     */
    public function read(){
        $this->file = fopen($this->new_file, "rb") or die("Erro ao abrir arquivo");
        return utf8_encode(fread($this->file,  filesize($this->new_file)));
    }
}
