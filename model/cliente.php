<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

$conexao = new PDO("sqlite:locadora.sqlite");

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    //Transformar o vetor 'categoria' numa string
    $categoria = implode(',', $_POST['categoria']);
    if($_POST['idcatalogo'] > 0) {
        //Se 'idcatalogo' existe (é positivo),
        //alterar os dados do filme no catálogo
        $categoria = implode(',', $_POST['categoria']);
        $sql = "UPDATE catalogo SET "
                . "nome = '{$_POST['nome']}',"
                . "sinopse = '{$_POST['sinopse']}',"
                . "ano =  {$_POST['ano']}, "
                . "tipo = '{$_POST['tipo']}',"
                . "midia = '{$_POST['midia']}',"
                . "disponivel = {$_POST['disponivel']},"
                . "categoria = '$categoria'"
                . "WHERE idcatalogo = {$_POST['idcatalogo']}";
    } else {
        //Se 'idcatalogo' não existe (não é positivo),
        //cadastrar um novo filme no catálogo
        $sql = "INSERT INTO catalogo (nome, sinopse, ano, tipo, midia, disponivel, categoria)" . 
        "VALUES ('{$_POST['nome']}', '{$_POST['sinopse']}', {$_POST['ano']}, '{$_POST['tipo']}'," .
        "'{$_POST['midia']}',{$_POST['disponivel']},'$categoria')";
    }
    //$conexao->exec($sql);

    //Executar a conexão ao banco de dados e 
    //informar o resultado da operação
    if($conexao->exec($sql) === false){
        echo '{"status": "erro"}';
    } else {
        echo '{"status": "ok"}';
    }
} elseif($_SERVER["REQUEST_METHOD"] == 'GET') {
    //Enviar os dados do filme cadastrado na tabela 'catalogo' 
    //onde 'idcatalogo' = "id"
    $sql = "SELECT * FROM catalogo WHERE idcatalogo = {$_GET['id']}";
    $filme = $conexao->query($sql);
    echo json_encode($filme->fetch(PDO::FETCH_ASSOC));
}
