<?php

$conexao = new PDO("sqlite:locadora.sqlite");

$sql = "SELECT idcatalogo, idcategoria FROM tipofilme ORDER BY idcatalogo";
$categoria = $conexao->query($sql);
echo json_encode($categoria->fetch(PDO::FETCH_ASSOC));
