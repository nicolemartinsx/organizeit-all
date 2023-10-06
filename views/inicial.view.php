<?php require('header.php'); ?>
<main>
    </br>
    <div class="welcome">JUNTE-SE A NOSSA COMUNIDADE!</div>

    <!-- Em alta -->
    <div class="divisao">
        em alta
        <hr>
    </div>

    <div class="filmes">
        <?php
        // Exemplo de filmes em alta (dados estaticos)
        require('models/filmes.model.php');

        foreach ($filmes as $filme) {
        ?>
            <a href="controllers/filme.controller.php?filme=<?= urlencode($filme['titulo']) ?>">
                <img src=<?= $filme['capa'] ?> class="capa" alt=<?= $filme['titulo'] ?>>
            </a>
        <?php
        }
        ?>
    </div>

    <div class="bvermais">
        <a href="controllers/pesquisa.controller.php">ver mais</a>
    </div>

    <!-- Reviews -->
    <div class=" divisao">
        novas reviews
        <hr>
    </div>

    <div class="tabelareviews">

        <?php
        foreach ($novas_avaliacoes as $avaliacao) {
        ?>
            <div class="review">
                <img src=<?= "$avaliacao[capa]" ?> class="capa" alt="Filme 1">
                <div class="info">

                    <?= $avaliacao['autor'] ?>
                    <div class="titulo"><?= $avaliacao['titulo'] ?></div>
                    <div class="estrela">
                        <?php
                        for ($i = 0; $i < $avaliacao['estrelas']; $i++) {
                            echo '<img src="public/imagens/estrela.png" />';
                        }
                        for ($i = 0; $i < 5 - $avaliacao['estrelas']; $i++) {
                            echo '<img src="public/imagens/estrela_outline.png">';
                        }
                        ?>
                    </div>
                    <div class="texto"><img src="public/imagens/quote.png" class="icone" />
                        <?= $avaliacao['descricao'] ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>


</main>

<?php require 'footer.php'; ?>

</body>

</html>