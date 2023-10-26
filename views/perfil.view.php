<?php require('header.php');?>

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
        MostrarWatchlist();
        

        ?>
        <?php  ?>



    </main>
</body>