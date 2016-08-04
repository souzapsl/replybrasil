<?php

/**
 * MegaSena
 * Operações para aposta Mega Sena
 * @copyright (c) 2016, Paulo Souza
 * @author PAULO SOUZA
 */
class MegaSena {
    
    /**
     * Quantidade de jogos setado na instância da classe  new MegaSena(3);
     * @var integer
     */
    private $quantity;
    
    /**
     * Quantidade de números que devem ser gerados
     * @var integer 
     */
    private $length;
    
    /**
     * Número inicial do range
     * @var integer 
     */
    private $from;
    
    /**
     * Número final do range
     * @var integer 
     */
    private $to;
    
    public function __construct($quantity) {
        $this->from = 1;
        $this->to = 60;  
        $this->length = 6;
        $this->quantity = $quantity;
    }
    
    public function getNumbers(){
        return range($this->from, $this->to);
    }
    
    public function getBettings(){
        $bettings = [];
        $count = 0;
        for ($i = 0; ; $i++) {
            $betting = $this->getBetting();
            $repeated = $this->isRepeated($bettings, $betting);
            if(!$repeated) {
                $bettings[] = $betting;
                $count++;
            }
            if($count == $this->quantity) {
                break;
            }
        }
        return $bettings;
    }
    
    public function isRepeated($bettings, $betting){
        if( ! count($bettings) ){
            return false;
        }
        foreach($bettings as $bet) {
            if($betting == $bet) {
                    return true;
            }
        }
        return false;
    }
   
    /**
        * Retorna um array com 6 dezenas aleatórias, os números não se repetem
        * @return array
    */
    public function getBetting() {
        $array_num = $this->getNumbers();
        shuffle($array_num);
        $numbers = array_slice($array_num, 0, $this->length);
        sort($numbers);
        return $numbers;
    }
    
    
}
