<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Seus cabeçalhos de meta e estilo aqui -->
</head>
<body>
    <?php
    // Verifica se o título do filme foi passado na URL
    if (isset($_GET['filme'])) {
        $titulo = urldecode($_GET['filme']);

        // Array associativo com informações dos filmes (pode incluir as avaliações)
        $filmes = [
            "Filme 1" => [
                "titulo" => "Filme 1",
                "diretor" => "Diretor do Filme 1",
                "ano_lancamento" => "2023",
                "sinopse" => "Sinopse do Filme 1"
            ],
            "Filme 2" => [
                "titulo" => "Filme 2",
                "diretor" => "Diretor do Filme 2",
                "ano_lancamento" => "2023",
                "sinopse" => "Sinopse do Filme 2"
            ],
            "Filme 3" => [
                "titulo" => "Filme 3",
                "diretor" => "Diretor do Filme 3",
                "ano_lancamento" => "2023",
                "sinopse" => "Sinopse do Filme 3"
            ],
            "Filme 4" => [
                "titulo" => "Filme 4",
                "diretor" => "Diretor do Filme 4",
                "ano_lancamento" => "2023",
                "sinopse" => "Sinopse do Filme 4"
            ],
            "Filme 5" => [
                "titulo" => "Filme 5",
                "diretor" => "Diretor do Filme 5",
                "ano_lancamento" => "2023",
                "sinopse" => "Sinopse do Filme 5"
            ],
            "Filme 6" => [
                "titulo" => "Filme 6",
                "diretor" => "Diretor do Filme 6",
                "ano_lancamento" => "2023",
                "sinopse" => "Sinopse do Filme 6"
            ]
        ];
        // Verifica se o filme existe no array
        if (array_key_exists($titulo, $filmes)) {
            $filme = $filmes[$titulo];
            // Exibe informações detalhadas do filme
            echo '<h1>' . $filme['titulo'] . '</h1>';
            echo '<p>Diretor: ' . $filme['diretor'] . '</p>';
            echo '<p>Ano de Lançamento: ' . $filme['ano_lancamento'] . '</p>';
            echo '<p>Sinopse: ' . $filme['sinopse'] . '</p>';
            // Exibe a classificação média do filme
            echo '<p>Avaliação Média: ' . $filme['avaliacao'] . ' estrelas</p>';

            // Exibe as avaliações dos usuários
            echo '<h2>Avaliações dos Usuários</h2>';
            foreach ($filme['reviews'] as $review) {
                echo '<p><strong>Usuário: ' . $review['usuario'] . '</strong></p>';
                echo '<p>Avaliação: ' . $review['avaliacao'] . ' estrelas</p>';
                echo '<p>Comentário: ' . $review['comentario'] . '</p>';
                echo '<hr>';
            }

            // Formulário para avaliar e revisar o filme
            echo '<h2>Avaliar e Revisar</h2>';
            echo '<form method="post" action="adicionar_avaliacao.php">';
            echo '<p>Sua Avaliação (de 0 a 5 estrelas): <input type="number" name="avaliacao" min="0" max="5" step="0.1"></p>';
            echo '<p>Seu Comentário: <textarea name="comentario"></textarea></p>';
            echo '<input type="hidden" name="filme" value="' . $titulo . '">';
            echo '<input type="submit" value="Enviar Avaliação">';
            echo '</form>';
        } else {
            echo '<p>Filme não encontrado.</p>';
        }
    } else {
        echo '<p>Título do filme não especificado.</p>';
    }
    ?>

    <!-- Seus rodapés aqui -->

</body>
</html>
