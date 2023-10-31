<?php
?>

<body>
    <main>

        <div class="divisao">
            watchlist
            <hr>
        </div>

        <div class="tabelareviews">
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
        <?php if ($foo == false) { ?>
            <div class="welcome">Você não tem nenhum filme na watchlist, clique e adicione</div>
            <div class="filmes">

                <?php
                foreach ($filmes as $filme) :
                ?>
                    <a href="filme/<?= urlencode($filme->id) ?>">
                        <img src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
                    </a>
                <?php
                endforeach;

                ?>
            </div>
        <?php } ?>



    </main>
</body>