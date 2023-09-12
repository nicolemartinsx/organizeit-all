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
        require('data.php');

        foreach ($filmes as $filme) {
        ?>
            <a href="pagina_filme.php?filme=<?= urlencode($filme['titulo']) ?>">
                <img src=<?= $filme['capa'] ?> class="capa" alt=<?= $filme['titulo'] ?>>
            </a>
        <?php
        }
        ?>
    </div>

    <div class="bvermais">
        <a href="emalta.php">ver mais</a>
    </div>

    <!-- Reviews -->
    <div class=" divisao">
        novas reviews
        <hr>
    </div>

    <div class="tabelareviews">
        <?php
        $novas_avaliacoes = [
            [
                'autor' => 'Autor da Review',
                'capa' => 'imagens/1.jpg',
                'titulo' => 'Minha avaliação',
                'estrelas' => 4,
                'descricao' => 'Ótimo filme!',
            ],
            [
                'autor' => 'Autor da Review',
                'capa' => 'imagens/2.jpg',
                'titulo' => 'Minha avaliação 1',
                'estrelas' => 5,
                'descricao' => 'Um clássico imperdível.',
            ],
            [
                'autor' => 'Autor da Review',
                'capa' => 'imagens/3.jpg',
                'titulo' => 'Minha avaliação 2',
                'estrelas' => 3,
                'descricao' => 'Não curti',
            ],
        ];

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
                            echo '<img src="imagens/estrela.png" />';
                        }
                        for ($i = 0; $i < 5 - $avaliacao['estrelas']; $i++) {
                            echo '<img src="imagens/estrela_outline.png">';
                        }
                        ?>
                    </div>
                    <div class="texto"><img src="imagens/quote.png" class="icone" />
                        <?= $avaliacao['descricao'] ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</main>
<!-- Footer -->
<footer>
    <div>
        <a>Sobre nós </a>
        <a>Contato </a>
        <a>Termos de uso</a>
    </div>
    <span>Criado por Celson, Matheus e Nicole <br> 2023</span>
</footer>

</body>

</html>