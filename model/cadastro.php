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
        $id_filme = $_POST['idcatalogo'];
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



    /*$imagem = $_FILES['arq-imagem']['name'];
    if(move_uploaded_file($_FILES['arq-imagem']['tmp_name'], 'imagens/' . $imagem)){
        echo '{"status": "okImagem"}';
    } else {
        echo '{"status": "erroImagem"}';
        echo $_FILES['arq-imagem']['error'];
    }*/



    //$conexao->exec($sql);

    //Executar a conexão ao banco de dados e 
    //informar o resultado da operação
    if($conexao->exec($sql) === false){
        echo '{"status": "erro"}';
    } else {
        echo '{"status": "ok"}';
    }
    
    $id_filme = isset($id_filme)? $id_filme : $conexao->lastInsertId();
    
    $pasta = "../imagens";
    $img = $_REQUEST['img-src'];
    $img = preg_replace('#^data:image/[^;]+;base64,#', '', $img);
    $img = str_replace(' ','+',$img);
    $data = base64_decode($img);
    $file = $pasta . $id_filme . '.' . 'jpg'; //.$_REQUEST['img-extension'] //uniqid()
    $sucesso = file_put_contents($file, $data);

} elseif($_SERVER["REQUEST_METHOD"] == 'GET') {
    //Enviar os dados do filme cadastrado na tabela 'catalogo' 
    //onde 'idcatalogo' = "id"
    $sql = "SELECT * FROM catalogo WHERE idcatalogo = {$_GET['id']}";
    $filme = $conexao->query($sql);
    echo json_encode($filme->fetch(PDO::FETCH_ASSOC));
}
