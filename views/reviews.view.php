<?php require('header.php');
require('../models/filme.model.php'); ?>

<body>
    <main>

        <div class="welcome">
            <?= 'Reviews de ' . $_SESSION['nome'];    ?>
        </div>

        <div class="divisao">
            <a href="<?= $base_url ?>/controllers/perfil.controller.php">watchlist</a>
            <a class="ativo" href="<?= $base_url ?>/controllers/reviews.controller.php">reviews</a>
            <hr>
        </div>

        <div class="reviews">

            <div class="tabelareviews">
                <?php

                $avaliacoes = carregarAvaliacoes();
                foreach ($avaliacoes as $titulo => $avaliacoesFilme) {
                    foreach ($avaliacoesFilme as $avaliacao) {
                        if ($avaliacao['usuario'] == $_SESSION['nome']) { ?>
                            <div class="review">

                                <div class="info">
                                    <div class="titulo"><?= $titulo ?></div>
                                    <div class="estrela">
                                        <?php
                                        for ($i = 0; $i < $avaliacao['avaliacao']; $i++) {
                                            echo '<img src="../public/imagens/estrela.png" />';
                                        }
                                        for ($i = 0; $i < 5 - $avaliacao['avaliacao']; $i++) {
                                            echo '<img src="../public/imagens/estrela_outline.png">';
                                        }
                                        ?>
                                    </div>
                                    <div class="texto"><img src="../public/imagens/quote.png" class="icone" />
                                        <?= $avaliacao['comentario'] ?>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </main>
</body>