<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

$conexao = new PDO("sqlite:locadora.sqlite");

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    var_dump($_POST);
    $nascimento = explode("/", $_POST['data-nascimento']);
    $nascimento_sql = $nascimento[2] . '-' . $nascimento[1] . '-' . $nascimento[0];
    $sql = "INSERT INTO cliente (nome, nascimento, telefone, email)" . 
    "VALUES ('{$_POST['nome']}', '$nascimento_sql', '{$_POST['telefone']}', '{$_POST['email']}')";
    
    //Executar a conexão ao banco de dados e 
    //informar o resultado da operação
    if($conexao->exec($sql) === false){
        echo '{"status": "erro"}';
    } else {
        echo '{"status": "ok"}';
    }
}