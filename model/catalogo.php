<?php

$conexao = new PDO("sqlite:locadora.sqlite");

$sql = "SELECT * FROM catalogo";

if ($_GET['filtro'] == 'disponivel') {$sql = $sql . " WHERE disponivel > 0";}
elseif ($_GET['filtro'] == 'catalogo') {$sql = $sql . " WHERE tipo = 'catalogo'";}
elseif ($_GET['filtro'] == 'lancamento') {$sql = $sql . " WHERE tipo = 'lancamento'";}

$dados = $conexao->query($sql);
$lista_filmes = $dados->fetchAll(PDO::FETCH_ASSOC);

//var_dump($lista_filmes);

foreach ($lista_filmes as $filme){
    $filme['categoria'] = ' ';
    $sql = "SELECT categoria.categoria AS categoria FROM tipofilme" . 
    " INNER JOIN categoria ON categoria.idcategoria = tipofilme.idcategoria" . 
    " WHERE idcatalogo = " . $filme['idcatalogo'];
    $dados = $conexao->query($sql);
    $categorias = $dados->fetchAll(PDO::FETCH_ASSOC);
    foreach ($categorias as $categoria){
        foreach($categoria as $nomecategoria){
            $filme['categoria'] = $filme['categoria'] . $nomecategoria . ',';
        }
    }
}

/* if ($_GET['categoria'] != 0){
    if ($_GET['filtro'] == 'todos')
        {$sql = $sql . " WHERE";} else {$sql = $sql . " AND";}
    $sql = $sql . " categoria like '%" . $_GET['categoria'] . "%'";
} */

//var_dump($lista_filmes);
echo json_encode($lista_filmes);
