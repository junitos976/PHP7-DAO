<?php

    require_once("config.php");

    //Carrega apenas um usuário 
    // $usuario = new Usuario();
    // $usuario->loadById(1);
    
    // echo $usuario;

    // Carreta uma lista de usuários
    // $usuarios = Usuario::getlist();

     $usuarios = Usuario::search("J");


echo json_encode($usuarios);

?>