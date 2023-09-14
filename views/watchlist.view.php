<?php require('header.view.php');

if (isset($_GET["filme"]) && isset($_GET["watchlist"])) {
    $watchlist = file_exists("../models/dados/watchlist.txt") ? file("../models/dados/watchlist.txt", FILE_IGNORE_NEW_LINES) : [];
    $novo = [];
    foreach ($watchlist as $linha) {
        $dados = explode(",", $linha);
        if ($dados[0] != $_SESSION["nome"] || $dados[1] != $_GET["filme"]) {
            $novo[] = $linha;
        }
    }
    $novo = implode(PHP_EOL, $novo);
    file_put_contents("../models/dados/watchlist.txt", $novo);
}
?>

<body>
    <main>

        <div class="divisao">
            watchlist
            <hr>
        </div>

        <div class="tabelareviews">
            <?php

            require('../models/filmes.model.php');
            $foo = FALSE;
            $favoritos = file_exists("../models/dados/watchlist.txt") ? file("../models/dados/watchlist.txt", FILE_IGNORE_NEW_LINES) : [];

            foreach ($favoritos as $linha) {
                $dados = explode(",", $linha);
                if ($dados[0] == $_SESSION['nome']) {
                    $foo = TRUE;

                    // echo "<p>";
                    // echo str_replace("_" , " ", $dados[1]);
                    foreach ($filmes as $filme) {
                        if ($dados[1] == $filme['titulo']) { ?>
                            <div class="filmecontainer">
                                <a href="../controllers/filme.controller.php?filme=<?= urlencode($filme['titulo']) ?>">
                                    <img src="<?= $base_url . '/' . $filme['capa'] ?>" class="capa" alt=<?= $filme['titulo'] ?>>
                                </a>
                                <a class="btfiltrar" href="../controllers/watchlist.controller.php?filme=<?= urlencode($filme['titulo']) ?>&watchlist=0">remover</a>
                            </div>
            <?php }
                    }

                    $foo = true;
                }
            }
            ?>
        </div>
        <?php if ($foo == false) { ?>
            <div class="welcome">Você não tem nenhum filme na watchlist, clique e adicione</div>
            <div class="filmes">

                <?php
                $i = 0;

                require("../models/inicial.model.php");
                foreach ($filmes as $filme) {
                ?>

                    <a href="filme.controller.php?filme=<?= urlencode($filme['titulo']) ?>">
                        <img src=<?= $base_url . '/' . $filme['capa'] ?> class="capa" alt=<?= $filme['titulo'] ?>>
                    </a>

                <?php
                    $i++;
                }
                ?>



            </div>
        <?php } ?>



    </main>

    <footer>
        <div>
            <a>Sobre nós </a>
            <a>Contato </a>
            <a>Termos de uso</a>
        </div>
        <span>Criado por Celson, Matheus e Nicole <br> 2023</span>
    </footer>
</body>