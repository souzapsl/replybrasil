<?php

    require 'vendor/smarty/smarty/libs/Smarty.class.php';
    require 'class/MegaSena.class.php';

    $smarty = new Smarty;
    
    // Quantos jogos você quer?
    $betting_quantity = 3;
    
    $megasena = new MegaSena($betting_quantity);
    
    // Array com os jogos gerados
    $bettings = $megasena->getBettings();
  
    // Os numeros da Mega Sena de 1 a 60
    $numbers = $megasena->getNumbers();
    
    // Título da página
    $smarty->assign( "page_title" , "Teste Mega Sena - Reply Brasil" );
    
    // Números de tabelas a ser gerada
    $smarty->assign( "tables" , $betting_quantity);
    
    $smarty->assign( "bettings" , $bettings);
    
    // Todos os números possíveis da mega sena
    $smarty->assign( "numbers" , $numbers );
   
    // Renderiza o template
    $smarty->display("index.tpl");
