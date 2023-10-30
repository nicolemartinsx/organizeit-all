<?php require('layout/header.php');?>

<body>
    <main>
        <div class="welcome">
            <?= 'Watchlist de ' . $_SESSION['nome'];    ?>
        </div>

        <div class="divisao">
            <a class="ativo" href="<?= $base_url ?>/controllers/perfil.controller.php">watchlist</a>
            <a href="<?= $base_url ?>reviews/<?=$_SESSION['id']?>">reviews</a>
            <hr>
            <div class="filmes">
        <?php
        foreach ($watchlist as $filme) :
        ?>
            <a href="/filme/<?= $filme->id ?>">
                <img src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
            </a>
        <?php
        endforeach;
        ?>
    </div>



    </main>
</body>