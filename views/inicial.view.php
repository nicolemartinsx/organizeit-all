<?php require('layout/header.php'); ?>
<main>
    </br>
    <div class="welcome">JUNTE-SE A NOSSA COMUNIDADE!</div>

    <!-- Em alta -->
    <div class="divisao">
        recentes
        <hr>
    </div>

    <div class="filmes">
        <?php
        foreach ($filmes as $filme) :
        ?>
            <a href="/filme/<?= $filme->id ?>">
                <img src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
            </a>
        <?php
        endforeach;
        ?>
    </div>

    <div class="bvermais">
        <a href="/em-alta">ver mais</a>
    </div>

    <!-- Reviews -->
    <div class=" divisao">
        novas reviews
        <hr>
    </div>

    <div class="tabelareviews">

        <?php
        require('models/inicial.model.php');
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

<?php require('layout/footer.php');

if (isset($_GET['mensagem'])) {
    echo "<script> alert('" . $_GET['mensagem'] . "');</script>";
}

?>

</body>

</html>