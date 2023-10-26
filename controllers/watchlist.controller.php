<?php

require("../views/watchlist.view.php");
require("../models/filme.model.php");
require_once("../conexao.php");

class watchlist{

}
function MostrarWatchlist (){
 
  

    $foo = FALSE;
    require_once("../conexao.php");
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
                $foo = true;
                return $foo;
            }
             $foo = false;
             return $foo;

        }
        
        function MostrarFilmes (){
            
                $bd = Conexao::get();

                $query = $bd->prepare("SELECT * FROM filmes");
                $query->execute();  
                $filmes = $query->fetchAll(PDO::FETCH_CLASS, "Filme");

                foreach ($filmes as $filme) :
                    ?>
                        <a href="filme.controller.php?id=<?= urlencode($filme->id) ?>">
                            <img src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
                        </a>
                    <?php
                    endforeach;
        }