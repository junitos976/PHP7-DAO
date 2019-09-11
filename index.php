<?php

    require_once("config.php");

    //Carrega apenas um usuário 
    // $usuario = new Usuario();
    // $usuario->loadById(1);
    
    // echo $usuario;

    // Carreta uma lista de usuários
    // $usuarios = Usuario::getlist();

    

    $usuario = new Usuario();
    $usuario->loadById(1);
 
    $usuario->update("juuuuuu","PROF123456", 1);

echo  json_encode($usuario->getlist());


?>