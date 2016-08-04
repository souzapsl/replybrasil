<?php

    require 'vendor/smarty/smarty/libs/Smarty.class.php';
    require 'class/Upload.class.php';

    $smarty = new Smarty;
    
    // Título da página
    $smarty->assign( "page_title" , "Upload - Reply Brasil" );
    
    $smarty->assign( "message" , "" );
        
    $smarty->assign( "new_file" , "" );
    
    if (isset($_FILES['file'])) {
        
        $upload = new Upload($_FILES['file']);
        
        $is_upload = $upload->upload();
        
        $smarty->assign( "message" , $upload->message );
       
        if($is_upload){
            $smarty->assign( "new_file" , $upload->read() );
        }
    }
    
    // Renderiza o template
    $smarty->display("upload.tpl");
