<?php

require("../views/perfil.view.php");
require_once("../conexao.php");
$nomePerfil = $_SESSION['nome'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($_POST['numero'] as $key => $value) {
        echo $value;
        $FilmesFav = "$nomePerfil,$value";
        file_put_contents("../models/dados/watchlist.txt", $FilmesFav . PHP_EOL, FILE_APPEND);
    }
}

class Watchlist
{
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
            }

            $foo = true;
        }
    
