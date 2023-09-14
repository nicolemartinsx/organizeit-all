<?php require('header.view.php');


$nomePerfil = $_SESSION['nome'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($_POST['numero'] as $key => $value) {
        echo $value;
        $FilmesFav = "$nomePerfil,$value";
        file_put_contents("../models/dados/watchlist.txt", $FilmesFav . PHP_EOL, FILE_APPEND);
    }
}
?>

<body>
    <main>
        <div class="welcome">
            <?= 'Watchlist de ' . $_SESSION['nome'];    ?>
        </div>

        <div class="divisao">
            <a class="ativo" href="<?= $base_url ?>/controllers/perfil.controller.php">watchlist</a>
            <a href="<?= $base_url ?>/controllers/reviews.controller.php">reviews</a>
            <hr>
        </div>
        <?php

        require('../models/filmes.model.php');
        $foo = FALSE;
        $favoritos = file_exists("../models/dados/watchlist.txt") ? file("../models/dados/watchlist.txt", FILE_IGNORE_NEW_LINES) : [];

        foreach ($favoritos as $linha) {
            $dados = explode(",", $linha);
            if ($dados[0] == $nomePerfil) {
                $foo = TRUE;

                // echo "<p>";
                // echo str_replace("_" , " ", $dados[1]);
                foreach ($filmes as $filme) {

                    if ($dados[1] == $filme['titulo']) { ?>
                        <a href="../
                        controllers/filme.controller.php?filme=<?= urlencode($filme['titulo']) ?>">
                            <img src="<?= $base_url . '/' . $filme['capa'] ?>" class="capa" alt=<?= $filme['titulo'] ?>>
                        </a>
        <?php }
                }

                $foo = true;
            }
        }
        ?>
        <?php if ($foo == false) { ?>
            <h1>Você não tem nenhum filme na watchlist, clique e adicione</h1>
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