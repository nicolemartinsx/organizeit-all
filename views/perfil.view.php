<?php require('layout/header.php'); ?>

<body>
    <main>
        <div class="welcome">
            <?= 'Lista de ' . $_SESSION['nome'];    ?>
        </div>

        <div class="divisao">
            <a href="/">inicio</a>
            >
            <a href="/perfil/<?= $_SESSION['id'] ?>">perfil</a>
            >
            <br />
            <a class="ativo" href="/perfil/<?= $_SESSION['id'] ?>">meus filmes</a>
            &nbsp;&nbsp;
            <a href="/reviews/<?= $_SESSION['id'] ?>">resenhas</a>
            <hr>
        </div>
        <div class="filmes">
            <?php foreach ($watchlist as $filme) : ?>
                <a href="/filme/<?= $filme->id ?>">
                    <img src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
                </a>
            <?php endforeach; ?>
            <?php if (count($watchlist) == 0) : ?>
                <div class="welcome">Você não tem nenhum filme na sua lista</div>
            <?php endif ?>
        </div>
    </main>

    <?php require('layout/footer.php'); ?>
</body>