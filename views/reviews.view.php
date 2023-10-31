<?php require('layout/header.php');
?>

<body>
    <main>

        <div class="welcome">
            <?= 'Reviews de ' . $_SESSION['nome'];    ?>
        </div>

        <div class="divisao">
            <a href="/perfil/<?= $_SESSION['id'] ?>">watchlist</a>
            <a class="ativo" href="/reviews/< ?=$_SESSION['id'] ?>">reviews</a>
            <hr>
        </div>

        <div class="reviews">

            <div class="tabelareviews">
                <?php

                foreach ($reviews as $avaliacao) {

                    if ($avaliacao->idUsuarios == $_SESSION['id']) { ?>
                        <div class="review">

                            <div class="info">
                                <div class="titulo"><?= $avaliacao->titulo ?></div>
                                <div class="estrela">
                                    <?php
                                    for ($i = 0; $i < $avaliacao->avaliacao; $i++) {
                                        echo '<img src="../public/imagens/estrela.png" />';
                                    }
                                    for ($i = 0; $i < 5 - $avaliacao->avaliacao; $i++) {
                                        echo '<img src="../public/imagens/estrela_outline.png">';
                                    }
                                    ?>
                                </div>
                                <div class="texto"><img src="../public/imagens/quote.png" class="icone" />
                                    <?= $avaliacao->comentario ?>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>
</body>
