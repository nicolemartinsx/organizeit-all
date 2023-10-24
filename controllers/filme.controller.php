<?php

require_once("../conexao.php");
require("../models/filme.model.php");

$bd = Conexao::get();
$query = $bd->prepare("SELECT * FROM filmes WHERE id = :id");
$query->bindParam(':id', $_GET['id']);
$query->execute();
$query->setFetchMode(PDO::FETCH_CLASS, "Filme");
$filme = $query->fetch();


function AddWatchlist($userId){
     // Verifica se o título do filme foi passado na URL
         if (isset($_GET["watchlist"])) {
            
                        
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM watchlist WHERE idUsuarios = :idUsuario and idFilmes = :idFilmes");
            $query->bindParam(':idUsuario', $idUsuario);
            $query->bindParam(':idFilmes', $_GET['id']);
            $query->execute();
            $watchlist = $query->fetch();
            $encontrou = $watchlist;

             if ($_GET["watchlist"] == 1) {
                
                             
                 if ($encontrou == false) {
                     $queryInsert = $bd->prepare("INSERT INTO watchlist (idUsuarios, idFilmes) VALUES (:idUsuarios, :idFilmes)");
                     $queryInsert->bindParam(':idUsuarios', $userId);
                     $queryInsert->bindParam(':idFilmes', $_GET['id']);
                     $queryInsert->execute();
                 }
             } else {
                $queryInsert = $bd->prepare("DELETE FROM watchlist WHERE idUsuarios=:idUsuarios AND idFilmes = :idFilmes");
                $queryInsert->bindParam(':idUsuarios', $userId);
                $queryInsert->bindParam(':idFilmes', $_GET['id']);
                $queryInsert->execute();
             }
         }
}



function PesquisarWatchlist($filme, $idUsuario){
    if (isset($_SESSION['id'])) {
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM watchlist WHERE idUsuarios = :idUsuario and idFilmes = :idFilmes");
        $query->bindParam(':idUsuario', $idUsuario);
        $query->bindParam(':idFilmes', $_GET['id']);
        $query->execute();
        $watchlist = $query->fetch(PDO::FETCH_ASSOC);

      
        
         //Verifica se o filme já está na watchlist
         if ($query->rowCount() ==0) {
            echo '<a class="btwatchlist" href="../controllers/filme.controller.php?id=' . urlencode($filme) . '&watchlist=1">watchlist</a>';

         } else {
           
            echo '<a class="btwatchlist" href="../controllers/filme.controller.php?id=' . urlencode($filme) . '&watchlist=0">remover da watchlist</a>';
        }
     }
}

require("../views/filme.view.php");


