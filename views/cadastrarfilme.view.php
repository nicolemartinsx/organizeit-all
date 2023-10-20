<?php require 'header.php'; ?>
<!DOCTYPE html>
<main>

    <body>
        <div class="divisao">
            cadastrar filme
            <hr>
        </div>

        <form class="formcadastrarfilme" method="post" action="" enctype="multipart/form-data">

            <div class="containercadastrarfilme">
                <div class="containerinput">
                    <input type="text" name="titulo" placeholder="Titulo" required>

                    <input type="number" name="ano" placeholder="Ano" required>

                    <input type="text" name="diretor" placeholder="Diretor" required>

                    <textarea name="sinopse" placeholder="Sinopse" required></textarea>
                </div>

                <div class="cadastrocapa">]
                    <img class="capa" alt="capa" src="../public/imagens/placeholdercapa.png" />
                    <input name="capa" type="file" required />
                    <button id="removerimg" type="button" class="btfiltrar">remover imagem</button>
                </div>

            </div>

            <button type="submit" class="btwatchlist">cadastrar</button>

        </form>

</main>

<?php require 'footer.php';

if (isset($_GET['erro'])) {
    echo "<script> alert('" . $_GET['erro'] . "');</script>";
}
?>

<script>
    const input = document.querySelector('input[name="capa"]');
    const preview = document.querySelector('.capa');
    const removerimg = document.querySelector('#removerimg');

    removerimg.addEventListener('click', function(e) {
        preview.src = '../public/imagens/placeholdercapa.png';
        input.value = "";
    });

    input.addEventListener('change', function(e) {
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>

</body>

</html>