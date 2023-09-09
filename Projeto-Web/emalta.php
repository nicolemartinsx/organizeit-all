<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Seus cabeçalhos de meta e estilo aqui -->
</head>
<body>
    <h1>Lista de Filmes</h1>

    <div class="filmes">
        <?php
        // Array associativo relacionando nomes de imagens com títulos de filmes
        $filmes = [
            "1.jpg" => "Filme 1",
            "2.jpg" => "Filme 2",
            "3.jpg" => "Filme 3",
            "4.jpg" => "Filme 4",
            "5.jpg" => "Filme 5",
            "6.jpg" => "Filme 6"
        ];

        // Loop para exibir cada filme com um link
        foreach ($filmes as $imagem => $titulo) {
            echo '<a href="pagina_filme.php?filme=' . urlencode($titulo) . '">';
            echo '<img src="' . $imagem . '" class="capa" alt="' . $titulo . '">';
            echo '</a>' . PHP_EOL;
        }
        ?>
    </div>

    <!-- Seus rodapés aqui -->

</body>
</html>
