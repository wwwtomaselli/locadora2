<?php

$filme["nome"] = "Star Wars IV";
$filme["categoria"] = "Ficção";
$filme["sinopse"] = "Altas anveturas no espaço";
$filme["ano"] = '1978';
$filme["tipo"] = "catalogo";
$filme["midia"] = "DVD";
$filme["disponivel"] = 3;

$listaFilmes[] = $filme;

$filme["nome"] = "Terminator";
$filme["categoria"] = "Ação";
$filme["sinopse"] = "Todo mundo quer pegar Sara Connor";
$filme["ano"] = '1985';
$filme["tipo"] = "catalogo";
$filme["midia"] = "DVD";
$filme["disponivel"] = 1;

$listaFilmes[] = $filme;

$filme["nome"] = "MadMax 2";
$filme["categoria"] = "Ação";
$filme["sinopse"] = "Loucura Total";
$filme["ano"] = '1984';
$filme["tipo"] = "catalogo";
$filme["midia"] = "BluRay";
$filme["disponivel"] = 2;

$listaFilmes[] = $filme;

$filme["nome"] = "Procurando Dory";
$filme["categoria"] = "Infantil";
$filme["sinopse"] = "Oi eu sou Dory";
$filme["ano"] = '2016';
$filme["tipo"] = "lançamento";
$filme["midia"] = "BluRay";
$filme["disponivel"] = 6;

$listaFilmes[] = $filme;

echo json_encode($listaFilmes);