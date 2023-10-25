<?php

require_once("../conexao.php");
require("../models/filme.model.php");

$bd = Conexao::get();

$sql = "SELECT * FROM filmes WHERE 1 = 1";
$parameters = array();
if (!empty($_GET['q'])) {
    $sql .= " AND titulo LIKE :titulo";
    $parameters[':titulo'] = '%' . $_GET['q'] . '%';
}
if (!empty($_GET['genero'])) {
    $sql .= " AND genero = :genero";
    $parameters[':genero'] = $_GET['genero'];
}
if (!empty($_GET['ano'])) {
    $sql .= " AND ano = :ano";
    $parameters[':ano'] = $_GET['ano'];
}
$queryFilmes = $bd->prepare($sql);
$queryFilmes->execute($parameters);
$filmes = $queryFilmes->fetchAll(PDO::FETCH_CLASS, "Filme");

$queryGeneros = $bd->prepare("SELECT DISTINCT genero FROM filmes");
$queryGeneros->execute();
$generos = $queryGeneros->fetchAll(PDO::FETCH_COLUMN);

$queryAnos = $bd->prepare("SELECT DISTINCT ano FROM filmes");
$queryAnos->execute();
$anos = $queryAnos->fetchAll(PDO::FETCH_COLUMN);

require("../views/pesquisa.view.php");
