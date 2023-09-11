<?php
session_start();

// Função para carregar as avaliações a partir do arquivo JSON
function carregarAvaliacoes() {
    if (file_exists("avaliacoes.txt")) {
        $json_avaliacoes = file_get_contents("avaliacoes.txt");
        return json_decode($json_avaliacoes, true);
    } else {
        return [];
    }
}

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

// Verifica se o título do filme foi passado na URL
if (isset($_GET['filme'])) {
    $titulo = urldecode($_GET['filme']);

    // Verifica se o filme existe no array
    if (array_key_exists($titulo, $filmes)) {
        $filme = $filmes[$titulo];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $avaliacao = $_POST["avaliacao"];
            $comentario = $_POST["comentario"];

            // Valide a avaliação (certifique-se de que está dentro do intervalo esperado, por exemplo, de 0 a 5).
            if ($avaliacao >= 0 && $avaliacao <= 5) {
                // Crie um array para representar a nova avaliação
                $novaAvaliacao = [
                    "usuario" => $_SESSION["email"], // Use o email do usuário logado 
                    "avaliacao" => $avaliacao,
                    "comentario" => $comentario,
                ];

                // Adicione a nova avaliação ao filme no array de filmes
                $filme['reviews'][] = $novaAvaliacao;

                // Atualize o array de filmes com a nova avaliação
                $filmes[$titulo] = $filme;

                // Salve as avaliações de volta no arquivo de dados (avaliacoes.txt)
                $avaliacoes = carregarAvaliacoes();
                $avaliacoes[$titulo] = $filme['reviews'];
                $json_avaliacoes = json_encode($avaliacoes);
                file_put_contents("avaliacoes.txt", $json_avaliacoes);

                echo "<p>Avaliação salva com sucesso!</p>";
            } else {
                echo "<p>Avaliação inválida. Deve estar entre 0 e 5 estrelas.</p>";
            }
        }

        // Exibe informações detalhadas do filme
        echo '<h1>' . $filme['titulo'] . '</h1>';
        // ... (exibição das informações do filme)

        // Exibe as avaliações dos usuários, se houver alguma
        if (!empty($filme['reviews'])) {
            echo '<h2>Avaliações dos Usuários</h2>';
            foreach ($filme['reviews'] as $avaliacao) {
                echo '<p><strong>Usuário: ' . $avaliacao['usuario'] . '</strong></p>';
                echo '<p>Avaliação: ' . $avaliacao['avaliacao'] . ' estrelas</p>';
                echo '<p>Comentário: ' . $avaliacao['comentario'] . '</p>';
                echo '<hr>';
            }
        } else {
            echo '<p>Ainda não há avaliações para este filme.</p>';
        }

        // Exibe o formulário para avaliar e revisar o filme
        echo '<h2>Avaliar e Revisar</h2>';
        echo '<form method="post" action="pagina_filme.php?filme=' . urlencode($titulo) . '">';
        echo '<p>Sua Avaliação (de 0 a 5 estrelas): <input type="number" name="avaliacao" min="0" max="5" step="0.1"></p>';
        echo '<p>Seu Comentário: <textarea name="comentario"></textarea></p>';
        echo '<input type="submit" value="Enviar Avaliação">';
        echo '</form>';
    } else {
        echo '<p>Filme não encontrado.</p>';
    }
} else {
    echo '<p>Título do filme não especificado.</p>';
}
?>
<!-- rodapes>
