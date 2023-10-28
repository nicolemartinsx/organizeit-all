<?php
//require_once("../conexao.php");
require("models/watchlist.model.php");
require("models/filme.model.php");

    class WatchlistController{


        public function MostrarWatchlist(){
            require('layout/header.php');
            require_once("conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM watchlist LEFT JOIN filmes on watchlist.idfilmes = filmes.id where watchlist.idusuarios = :id; " );
            $query->bindParam(':id', $_SESSION['id']);
            $query->execute();
     
            $watchlist= $query->fetchAll(PDO::FETCH_CLASS, "Watchlist");

            if($watchlist==false){
                $foo=false;
                $bd = Conexao::get();
                $query = $bd->prepare("SELECT * FROM filmes limit 5 " );
                $query->execute();
     
                $filmes= $query->fetchAll(PDO::FETCH_CLASS, "Filme");
            }else{
                $foo=true;
            }
            

        require("views/watchlist.view.php");
        }




    }





/* class WatchlistController{

    function MostrarWatchlist (){

        
       
        $foo = FALSE;
        require_once("conexao.php");
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM watchlist LEFT JOIN filmes on watchlist.idfilmes = filmes.id where watchlist.idusuarios = :id; " );
        $query->bindParam(':id', $_SESSION['id']);
        $query->execute();
     
        $watchlist = $query->fetchAll(PDO::FETCH_CLASS, "Watchlist");
    
    
            if ($watchlist!=false) {
                $foo = TRUE;
    
                // echo "<p>";
                // echo str_replace("_" , " ", $dados[1]);
                foreach ($watchlist as $filme) :
                    ?>
                        <a href="filme.controller.php?id=<?= urlencode($filme->id) ?>">
                            <img src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
                        </a>
                    <?php
                endforeach;
                   
                }
                 
               
                
            }
            
            function MostrarFilmes (){
                          
                    $bd = Conexao::get();
                    $query = $bd->prepare("SELECT * FROM filmes");
                    $query->execute();  
                    $filmes = $query->fetchAll(PDO::FETCH_CLASS, "Filme");
    
                    require("views/watchlist.view.php");   
                    require("models/filme.model.php"); 
            }


} 


 
class Filmes{

}

class Watchlist{

}

?> */