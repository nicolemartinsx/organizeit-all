<?php

require_once("conexao.php");

require("models/watchlist.model.php");




class PerfilController
{

    function MostrarPerfil($idPerfil)
    {


        require_once("conexao.php");
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM watchlist LEFT JOIN filmes on watchlist.idfilmes = filmes.id where watchlist.idusuarios = :id; ");
        $query->bindParam(':id', $idPerfil);
        $query->execute();

        $watchlist = $query->fetchAll(PDO::FETCH_CLASS, "Watchlist");

        require("views/perfil.view.php");
    }
}
