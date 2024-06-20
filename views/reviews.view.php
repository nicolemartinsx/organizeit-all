<?php require('layout/header.php');
?>

<body>
    <main>

        <div class="welcome">
            <?= 'Resenhas de ' . $_SESSION['nome'];    ?>
        </div>

        <div class="divisao">
            <a href="/">inicio</a>
            >
            <a href="/perfil/<?= $_SESSION['id'] ?>">perfil</a>
            >
            <br />

            <a href="/perfil/<?= $_SESSION['id'] ?>">meus filmes</a>
            &nbsp;&nbsp;
            <a class="ativo" href="/reviews/<?= $_SESSION['id'] ?>">resenhas</a>
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
                                        echo '<img alt="" src="../static/imagens/estrela.png" />';
                                    }
                                    for ($i = 0; $i < 5 - $avaliacao->avaliacao; $i++) {
                                        echo '<img alt="" src="../static/imagens/estrela_outline.png">';
                                    }
                                    ?>
                                </div>
                                <div class="texto"><img alt="" src="../static/imagens/quote.png" class="icone" />
                                    <?= $avaliacao->comentario ?>
                                </div>
                                <form action="/reviews/<?= $_SESSION['id'] ?>/deletar/<?= $avaliacao->idFilmes ?>" onsubmit="return confirm('Tem certeza que deseja deletar sua resenha?')">
                                    <button class="btwatchlist" style="margin-top: 0;">deletar</button>
                                </form>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <?php if (count($reviews) == 0) : ?>
                <div class="welcome">Você ainda não fez nenhuma resenha</div>
            <?php endif ?>
        </div>
    </main>

    <?php require('layout/footer.php'); ?>
</body>