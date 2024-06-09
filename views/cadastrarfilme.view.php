<?php require 'layout/header.php'; ?>
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

                    <input type="number" name="ano" placeholder="Ano" min="1900" max="2100" required>

                    <input type="text" name="diretor" placeholder="Diretor" required>
                    
                    <input type="number" name="estrelas" placeholder="Estrelas" min="1" max="5" required>

                    <select name="genero" required>
                        <option value="">Gênero</option>
                        <option value="Comédia">Aventura</option>
                        <option value="Ação">Ação</option>
                        <option value="Drama">Drama</option>
                        <option value="Comédia">Comédia</option>
                    </select>

                    <textarea name="sinopse" placeholder="Sinopse" rows="4" required></textarea>
                </div>

                <div class="cadastrocapa">]
                    <img class="capa" alt="capa" src="../static/imagens/placeholdercapa.png" />
                    <input name="capa" type="file" required />
                    <button id="removerimg" type="button" class="btfiltrar">remover imagem</button>
                </div>

            </div>

            <button type="submit" class="btwatchlist">cadastrar</button>

        </form>

</main>

<?php require 'layout/footer.php';

if (isset($_GET['mensagem'])) {
    echo "<script> alert('" . $_GET['mensagem'] . "');</script>";
}
?>

<script>
    const input = document.querySelector('input[name="capa"]');
    const preview = document.querySelector('.capa');
    const removerimg = document.querySelector('#removerimg');

    removerimg.addEventListener('click', function(e) {
        preview.src = '../static/imagens/placeholdercapa.png';
        input.value = "";
    });

    input.addEventListener('change', function(e) {
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>

</body>

</html>