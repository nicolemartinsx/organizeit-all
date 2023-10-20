<?php

require_once("../conexao.php");
require("../models/filme.model.php");

$bd = Conexao::get();

$query = $bd->prepare("SELECT * FROM filmes WHERE id = :id");
$query->bindParam(':id', $_GET['id']);
$query->execute();
$query->setFetchMode(PDO::FETCH_CLASS, "Filme");
$filme = $query->fetch();


require("../views/filme.view.php");
