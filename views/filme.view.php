<?php
require("layout/header.php");
?>
<main class="pagfilme">
    <?php

    if ($filme) {
        $titulo = $filme->titulo;
    }

    ?>

    <!-- Detalhes do filme -->
    <div class="filmecontainer2">
        <div class="containerfilme">
            <div class="filmecontainer">
                <img class="capafilme" src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
                <div class="estrela">
                    <?php for ($i = 0; $i < $filme->estrelas; $i++) : ?>
                        <img src="../static/imagens/estrela.png" />
                    <?php endfor; ?>
                    <?php for ($i = 0; $i < 5 - $filme->estrelas; $i++) : ?>
                        <img src="../static/imagens/estrela_outline.png">
                    <?php endfor; ?>
                </div>
            </div>
            <div class="filmedetalhes">
                <h1><?= $filme->titulo ?></h1>
                <h2>lançamento: <?= $filme->ano ?></h2>
                <h2>direção: <?= $filme->diretor ?></h2>
                <h2>gênero: <?= $filme->genero ?></h2>
                <h3><?= $filme->sinopse ?></h3>

                <?php
                if (isset($_SESSION['id'])) {
                    PesquisarWatchlist($filme->id, $_SESSION['id']);
                }


                echo '</div>';
                echo '</div>';


                // Exibe o formulário para avaliar e revisar o filme
                if (isset($_SESSION['nome'])) {
                    $achou = PesquisarReviews($filme->id, $_SESSION['id']);

                    if ($achou == false) {
                ?>
                        <form class="avaliar" method="post" action="" enctype="multipart/form-data">
                            <h2>avaliar</h2>
                            <h3>avaliação (0 a 5): <input type="number" name="avaliacao" min="0" max="5" step="1"></h3>
                            <h3 class="comentario">comentário: <textarea name="comentario"></textarea></h3>


                            <button type="submit" class="btfiltrar">enviar avaliação</button>
                        </form>
                        <?php
                    }
                }


                echo '</div>';
                if (isset($_SESSION['id'])) {
                    //Exibe as avaliações dos usuários, se houver alguma
                    if (PesquisarReviews($filme->id, $_SESSION['id']) == True) {
                        echo '<div class=" divisao">reviews<hr></div>';
                        echo '<div class="tabelareviews">';
                        foreach ($reviews as $avaliacao) {
                        ?>
                            <div class="review">
                                <div class="info">
                                    <div class="titulo"><?= $avaliacao->nome ?></div>
                                    <div class="estrela">
                                        <?php
                                        for ($i = 0; $i < $avaliacao->avaliacao; $i++) {
                                            echo '<img src="../static/imagens/estrela.png" />';
                                        }
                                        for ($i = 0; $i < 5 -  $avaliacao->avaliacao; $i++) {
                                            echo '<img src="../static/imagens/estrela_outline.png">';
                                        }
                                        ?>
                                    </div>
                                    <div class="texto"><img src="../static/imagens/quote.png" class="icone" />
                                        <?= $avaliacao->comentario ?>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                        echo '</div>';
                    } else {
                        echo '<div class=" divisao">reviews<hr></div>';
                        echo '<h3>Ainda não há avaliações</h3>';
                    }
                }
                ?>
</main>