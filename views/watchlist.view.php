<?php require('../layout/header.php');

//if (isset($_GET["filme"]) && isset($_GET["watchlist"])) {
//    $watchlist = file_exists("../models/dados/watchlist.txt") ? file("../models/dados/watchlist.txt", FILE_IGNORE_NEW_LINES) : [];
//    $novo = [];
//    foreach ($watchlist as $linha) {
//        $dados = explode(",", $linha);
//        if ($dados[0] != $_SESSION["nome"] || $dados[1] != $_GET["filme"]) {
//            $novo[] = $linha;
//        }
//    }
//    $novo = implode(PHP_EOL, $novo);
///    file_put_contents("../models/dados/watchlist.txt", $novo);
//}
?>

<body>
    <main>

        <div class="divisao">
            watchlist
            <hr>
        </div>

        <div class="tabelareviews">
            <?php

       
            $foo = FALSE;
            $foo = MostrarWatchlist();
            ?>
        </div>
        <?php if ($foo == false) { ?>
            <div class="welcome">Você não tem nenhum filme na watchlist, clique e adicione</div>
            <div class="filmes">

                <?php
                MostrarFilmes();
         
               

                ?>



            </div>
        <?php } ?>



    </main>
</body>