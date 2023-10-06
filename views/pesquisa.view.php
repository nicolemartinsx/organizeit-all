<?php
require('../views/header.php');
require('../models/filmes.model.php');

function opcaoSelecionada($campo, $valor)
{
    if (isset($_GET[$campo]) && $_GET[$campo] == $valor) echo 'selected=""';
}
?>

<body>
    <main>
        <div class="divisao">
            <?php
            if (isset($_GET['q'])) {
            ?>
                resultados da pesquisa por: <?php echo $_GET['q'] ?>
            <?php
            } else {
            ?>
                <form class="sortby" method="GET">
                    <select name="genero">
                        <option value="">genero</option>
                        <option value="comedia" <?= opcaoSelecionada("genero", "comedia") ?>>comédia</option>
                        <option value="drama" <?= opcaoSelecionada("genero", "drama") ?>>drama</option>
                        <option value="acao" <?= opcaoSelecionada("genero", "acao") ?>>ação</option>
                    </select>
                    <select name="ano">
                        <option value="">ano</option>
                        <option value="2020" <?= opcaoSelecionada("ano", "2020") ?>>2020</option>
                        <option value="2021" <?= opcaoSelecionada("ano", "2021") ?>>2021</option>
                    </select>
                    <button class="btfiltrar">filtrar</button>
                </form>
            <?php
            }

            ?>
            <hr>
        </div>

        <div class="filmes">
            <?php
            foreach ($filmes as $filme) {
                if (isset($_GET['q']) && !empty($_GET['q']) && strpos(strtolower($filme['titulo']), strtolower($_GET['q'])) === false) {
                    continue;
                }
                if (isset($_GET['genero']) && !empty($_GET['genero']) && isset($_GET['ano']) && !empty($_GET['ano'])) {
                    if ($filme['genero'] != $_GET['genero'] || $filme['ano'] != $_GET['ano']) {
                        continue;
                    }
                } elseif (isset($_GET['genero']) && !empty($_GET['genero']) && $filme['genero'] != $_GET['genero']) {
                    continue;
                } elseif (isset($_GET['ano']) && !empty($_GET['ano']) && $filme['ano'] != $_GET['ano']) {
                    continue;
                }
            ?>
                <a class="filmecontainer" href="../controllers/filme.controller.php?filme=<?= urlencode($filme['titulo']) ?>">
                    <img src=<?= $base_url . '/' . $filme['capa'] ?> class="capa" alt=<?= $filme['titulo'] ?>>
                    <div class="estrela">
                        <?php
                        for ($i = 0; $i < $filme['estrelas']; $i++) {
                            echo '<img src="../public/imagens/estrela.png" />';
                        }
                        for ($i = 0; $i < 5 - $filme['estrelas']; $i++) {
                            echo '<img src="../public/imagens/estrela_outline.png">';
                        }
                        ?>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </main>
</body>


</html>