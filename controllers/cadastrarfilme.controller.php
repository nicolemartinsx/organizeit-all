<?php

require_once("../conexao.php");
require("../models/filme.model.php");

if (isset($_SESSION["adm"]) && $_SESSION['adm'] == '0') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $capa = file_get_contents($_FILES["capa"]["tmp_name"]);

    $bd = Conexao::get();

    try {
        $query = $bd->prepare("INSERT INTO filmes (titulo, ano, diretor, sinopse, capa) VALUES (:titulo, :ano, :diretor, :sinopse, :capa)");
        $query->bindParam(':titulo', $_POST["titulo"]);
        $query->bindParam(':ano', $_POST["ano"]);
        $query->bindParam(':diretor', $_POST["diretor"]);
        $query->bindParam(':sinopse', $_POST["sinopse"]);
        $query->bindParam(':capa', $capa);
        $query->execute();

        header("Location: ../index.php?sucesso=Filme cadastrado com sucesso!");
    } catch (PDOException $e) {

        header("Location: ?erro=Filme não cadastrado!");
    }
}


require('../views/cadastrarfilme.view.php');
