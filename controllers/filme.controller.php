<?php

require_once("conexao.php");
require("models/filme.model.php");




class FilmeController {


    
   

    public function index($id) {
        require("models/reviews.model.php");
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM filmes WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, "Filme");
        $filme = $query->fetch(); 
         
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM reviews WHERE  idFilmes = :idFilmes");
        $query->bindParam(':idFilmes', $id);
        $query->execute();
        $reviews= $query->fetchAll(PDO::FETCH_CLASS, "reviews");
    



        
        function PesquisarReviews($id,$idUsuario){
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM reviews WHERE idUsuarios = :idUsuario and idFilmes = :idFilmes");
            $query->bindParam(':idUsuario', $idUsuario);
            $query->bindParam(':idFilmes', $id);
            $query->execute();
            $Reviews = $query->fetch(PDO::FETCH_ASSOC);

            if ($query->rowCount() == 0) {
               return false; 
    
             } else {
            

                return true; 
               
            }

        }
        
        function PesquisarWatchlist($id,$idUsuario){
            
            if (isset($_SESSION['id'])) {
                


               $bd = Conexao::get();
               $query = $bd->prepare("SELECT * FROM watchlist WHERE idUsuarios = :idUsuario and idFilmes = :idFilmes");
               $query->bindParam(':idUsuario', $idUsuario);
               $query->bindParam(':idFilmes', $id);
               $query->execute();
               $watchlist = $query->fetch(PDO::FETCH_ASSOC);
       
             
               
                //Verifica se o filme já está na watchlist
                if ($query->rowCount() ==0) {
                   echo '<a class="btwatchlist" href="'.urldecode($id).'/adicionar">watchlist</a>';
       
                } else {
                  
                   echo '<a class="btwatchlist" href="'.urldecode($id).'/remover">remover da watchlist</a>';
               }
            }
       } 
       
    
      
       
        require("views/filme.view.php");
    }


    function AdicionarReview($id){
        session_start();
        
            $bd = Conexao::get();

            try {
               $query = $bd->prepare("INSERT INTO reviews (idUsuarios, idFilmes , avaliacao, comentario,nome ) VALUES (:idUsuarios, :idFilmes, :avaliacao,:comentario,:nome)");
               $query->bindParam(':idUsuarios', $_SESSION['id'] );//ALTERAR ISSO AQUI
               $query->bindParam(':idFilmes', $id);
               $query->bindParam(':avaliacao', $_POST["avaliacao"]);
               $query->bindParam(':comentario', $_POST["comentario"]);
               $query->bindParam(':nome', $_SESSION['nome']);
               $query->execute();
       
               header("Location: /filme/".urldecode($id));
           } catch (PDOException $e) {
       
               header("Location: /filme/".urldecode($id));
           }

        }
            
              
                
       

    Function AddWatchlist($id){
        session_start();
        $idUsuario = $_SESSION['id'];
        $bd = Conexao::get();
       
            $queryInsert = $bd->prepare("INSERT INTO watchlist (idUsuarios, idFilmes) VALUES (:idUsuarios, :idFilmes)");
            $queryInsert->bindParam(':idUsuarios', $idUsuario);
            $queryInsert->bindParam(':idFilmes', $id);
            $queryInsert->execute();
            header("Location: /filme/".urldecode($id));
    }

    Function RemoverWatchlist($id){
        session_start();
        $idUsuario = $_SESSION['id'];
        $bd = Conexao::get();

            $queryInsert = $bd->prepare("DELETE FROM watchlist WHERE idUsuarios=:idUsuarios AND idFilmes = :idFilmes");
            $queryInsert->bindParam(':idUsuarios', $idUsuario);
            $queryInsert->bindParam(':idFilmes', $id);
            $queryInsert->execute();
            header("Location: /filme/".urldecode($id));

    }




    
}