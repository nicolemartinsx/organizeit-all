<?php

require_once("conexao.php");
require("models/filme.model.php");

$bd = Conexao::get();

$query = $bd->prepare("SELECT * FROM filmes LIMIT 5");
$query->execute();
$filmes = $query->fetchAll(PDO::FETCH_CLASS, "Filme");

require("models/inicial.model.php");
require("views/inicial.view.php");
