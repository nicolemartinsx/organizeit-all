<?php
require('layout/header.php');

function opcaoSelecionada($campo, $valor)
{
    if (isset($_GET[$campo]) && $_GET[$campo] == $valor) echo 'selected=""';
}
?>

<body>
    <main>
        <div class="divisao">
            <a href="/">inicio</a>
            >
            <a href="/em-alta">filmes</a>
            <?php if (isset($_GET['q'])) : ?>
                >
                pesquisa
            <?php endif ?>
        </div>
        <div class="divisao">
            <?php
            if (isset($_GET['q'])) {
            ?>
                resultados da pesquisa por: <?= $_GET['q'] ?>
            <?php
            } else {
            ?>
                <form class="sortby" method="GET">
                    <label for="selectGenero">gênero:</label>
                    <select id="selectGenero" name="genero">
                        <option value="">selecione</option>
                        <?php foreach ($generos as $genero) : ?>
                            <option value="<?= $genero ?>" <?= opcaoSelecionada("genero", $genero) ?>><?= strtolower($genero) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="selectAno">ano:</label>
                    <select id="selectAno" name="ano">
                        <option value="">selecione</option>
                        <?php foreach ($anos as $ano) : ?>
                            <option value="<?= $ano ?>" <?= opcaoSelecionada("ano", $ano) ?>><?= $ano ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btfiltrar">filtrar</button>
                    <a href="/em-alta">limpar</a>
                </form>
            <?php
            }

            ?>
            <hr>
        </div>

        <div class="filmes">
            <?php if (count($filmes) == 0) : ?>
                <h2>Nenhum filme encontrado</h2>
            <?php endif ?>
            <?php foreach ($filmes as $filme) : ?>
                <a class="filmecontainer" href="/filme/<?= $filme->id ?>">
                    <img src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
                    <div class="estrela">
                        <?php for ($i = 0; $i < $filme->estrelas; $i++) : ?>
                            <img alt="" src="../static/imagens/estrela.png" />
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < 5 - $filme->estrelas; $i++) : ?>
                            <img alt="" src="../static/imagens/estrela_outline.png">
                        <?php endfor; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
</body>
<?php require('layout/footer.php'); ?>

</html>