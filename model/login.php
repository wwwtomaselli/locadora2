<?php

session_start();

$conexao = new PDO("sqlite:locadora.sqlite");

//usuario: eumesmo
//senha: eumesmo
$sql = "SELECT * FROM usuario WHERE login = ? AND senha = ?";

$salt = 'pindamonhangaba';
$login = sha1($_POST['password'] . $salt);

$prepare = $conexao->prepare($sql);
$resultado  = $prepare->execute(array($_POST['username'],$login));
$usuario = $prepare->fetch(PDO::FETCH_ASSOC);

//'$time': 0, ou 1 semana após agora (em segundos)

if ($usuario != false){
    $time = $_POST['remember'] * (mktime() + 7 * 24 * 60 * 60);
    setcookie('locadora', json_encode($usuario), $time, '/');
    header('Location: ../index.php');
} else {
    echo "Usuário ou senha inválidos";
}
