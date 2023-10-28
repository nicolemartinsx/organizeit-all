<?php 

//if (isset($_GET["filme"]) && isset($_GET["watchlist"])) {
//    $watchlist = file_exists("../models/dados/watchlist.txt") ? file("../models/dados/watchlist.txt", FILE_IGNORE_NEW_LINES) : [];
//    $novo = [];
//    foreach ($watchlist as $linha) {
//        $dados = explode(",", $linha);
//        if ($dados[0] != $_SESSION["nome"] || $dados[1] != $_GET["filme"]) {
//            $novo[] = $linha;
//        }
//    }
//    $novo = implode(PHP_EOL, $novo);
///    file_put_contents("../models/dados/watchlist.txt", $novo);
//}
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