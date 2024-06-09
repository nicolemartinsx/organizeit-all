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
        
        foreach ($reviews as $avaliacao) {
        ?>
            <div class="review">
             
                <img src="<?= 'data:image/jpeg;base64,' . base64_encode($avaliacao->capa) ?>" class="capa" alt=<?= $avaliacao->titulo ?>>
                <div class="info">

                    <?= $avaliacao->nome ?>
                    <div class="titulo"><?= $avaliacao->titulo?></div>
                    <div class="estrela">
                        <?php
                        for ($i = 0; $i < $avaliacao->avaliacao; $i++) {
                            echo '<img src="static/imagens/estrela.png" />';
                        }
                        for ($i = 0; $i < 5 - $avaliacao->avaliacao; $i++) {
                            echo '<img src="static/imagens/estrela_outline.png">';
                        }
                        ?>
                    </div>
                    <div class="texto"><img src="static/imagens/quote.png" class="icone" />
                        <?= $avaliacao->comentario ?>
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