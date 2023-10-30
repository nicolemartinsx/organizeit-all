<?php

require_once("conexao.php");
require("models/filme.model.php");
require("models/reviews.model.php");

class InicialController {
    public function index() {
        $bd = Conexao::get();

        $query = $bd->prepare("SELECT * FROM filmes LIMIT 5");
        $query->execute();
        $filmes = $query->fetchAll(PDO::FETCH_CLASS, "Filme");

        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM reviews inner join filmes on reviews.idFilmes = filmes.id LIMIT 5");
        $query->execute();
        $reviews= $query->fetchAll(PDO::FETCH_CLASS, "reviews");

        
        require("models/inicial.model.php");
        require("views/inicial.view.php");
    }
}

