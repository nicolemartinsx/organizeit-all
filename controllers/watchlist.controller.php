<?php
//require_once("../conexao.php");
require("models/watchlist.model.php");
require("models/filme.model.php");

class WatchlistController
{


    public function MostrarWatchlist()
    {
        require('layout/header.php');
        require_once("conexao.php");
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM watchlist LEFT JOIN filmes on watchlist.idfilmes = filmes.id where watchlist.idusuarios = :id; ");
        $query->bindParam(':id', $_SESSION['id']);
        $query->execute();

        $watchlist = $query->fetchAll(PDO::FETCH_CLASS, "Watchlist");

        if ($watchlist == false) {
            $foo = false;
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM filmes limit 5 ");
            $query->execute();

            $filmes = $query->fetchAll(PDO::FETCH_CLASS, "Filme");
        } else {
            $foo = true;
        }


        require("views/watchlist.view.php");
    }
}
