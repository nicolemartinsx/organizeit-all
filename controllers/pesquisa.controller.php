<?php

require_once("conexao.php");
require("models/filme.model.php");

class PesquisaController {
    public function index() {
        $bd = Conexao::get();

        $sql = "SELECT * FROM filmes WHERE titulo LIKE :titulo";
        $query = $bd->prepare($sql);
        $titulo = "%" . $_GET['q'] . "%";
        $query->bindParam(":titulo", $titulo);
        $query->execute();
        $filmes = $query->fetchAll(PDO::FETCH_CLASS, "Filme");

        require("views/pesquisa.view.php");
    }

    public function emAlta() {
        $bd = Conexao::get();

        $sql = "SELECT * FROM filmes WHERE 1 = 1";
        $parameters = array();
        if (!empty($_GET['genero'])) {
            $sql .= " AND genero = :genero";
            $parameters[':genero'] = $_GET['genero'];
        }
        if (!empty($_GET['ano'])) {
            $sql .= " AND ano = :ano";
            $parameters[':ano'] = $_GET['ano'];
        }

        $queryFilmes = $bd->prepare($sql . " ORDER BY RAND()");
        $queryFilmes->execute($parameters);
        $filmes = $queryFilmes->fetchAll(PDO::FETCH_CLASS, "Filme");

        $queryGeneros = $bd->prepare("SELECT DISTINCT genero FROM filmes");
        $queryGeneros->execute();
        $generos = $queryGeneros->fetchAll(PDO::FETCH_COLUMN);

        $queryAnos = $bd->prepare("SELECT DISTINCT ano FROM filmes");
        $queryAnos->execute();
        $anos = $queryAnos->fetchAll(PDO::FETCH_COLUMN);

        require("views/pesquisa.view.php");
    }
}

