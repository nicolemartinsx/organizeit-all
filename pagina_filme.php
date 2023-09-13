<?php
require("header.php");
?>
<main class="pagfilme">
    <?php
    // Função para carregar as avaliações a partir do arquivo JSON
    function carregarAvaliacoes()
    {
        if (file_exists("avaliacoes.txt")) {
            $json_avaliacoes = file_get_contents("avaliacoes.txt");
            return json_decode($json_avaliacoes, true);
        } else {
            return [];
        }
    }

    // Array associativo com informações dos filmes (pode incluir as avaliações)
    $filmes = [
        "Blue Beetle" => [
            "titulo" => "Blue Beetle",
            'capa' => 'imagens/1.jpg',
            "diretor" => "Diretor1",
            "ano_lancamento" => "2023",
            "sinopse" => "texto texto texto texto texto"
        ],
        "Indiana Jones" => [
            "titulo" => "Indiana Jones",
            'capa' => 'imagens/2.jpg',
            "diretor" => "Diretor2",
            "ano_lancamento" => "2023",
            "sinopse" => "texto texto texto texto texto"
        ],
        "Oppenheimer" => [
            "titulo" => "Oppenheimer",
            'capa' => 'imagens/3.jpg',
            "diretor" => "Diretor3",
            "ano_lancamento" => "2023",
            "sinopse" => "texto texto texto texto texto"
        ],
        "Coringa" => [
            "titulo" => "Coringa",
            'capa' => 'imagens/4.jpg',
            "diretor" => "Diretor4",
            "ano_lancamento" => "2023",
            "sinopse" => "texto texto texto texto texto"
        ],
        "Malevola" => [
            "titulo" => "Malevola",
            'capa' => 'imagens/5.jpg',
            "diretor" => "Diretor5",
            "ano_lancamento" => "2023",
            "sinopse" => "texto texto texto texto texto"
        ],
        "Barbie" => [
            "titulo" => "Barbie",
            'capa' => 'imagens/6.jpg',
            "diretor" => "Diretor6",
            "ano_lancamento" => "2023",
            "sinopse" => "texto texto texto texto texto"
        ]
    ];


    if (isset($_GET['filme'])) {
        $titulo = urldecode($_GET['filme']);

        // Verifica se o título do filme foi passado na URL
        if (isset($_GET["watchlist"])) {
            if ($_GET["watchlist"] == 1) {
                $watchlist = $_SESSION["nome"] . ',' . $titulo;
                file_put_contents("watchlist.txt", $watchlist . PHP_EOL, FILE_APPEND);
            } else {
                $watchlist = file("watchlist.txt", FILE_IGNORE_NEW_LINES);
                $novo = [];
                foreach ($watchlist as $linha) {
                    $dados = explode(",", $linha);
                    if ($dados[0] != $_SESSION["nome"] || $dados[1] != $titulo) {
                        $novo[] = $linha;
                    }
                }
                $novo = implode(PHP_EOL, $novo);
                file_put_contents("watchlist.txt", $novo);
            }
        }


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
                        "usuario" => $_SESSION["nome"], // Use o email do usuário logado 
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

                    echo "<script> alert('Avaliação salva com sucesso!');</script>";
                } else {
                    echo "<script> alert('Avaliação inválida. Deve estar entre 0 e 5 estrelas');</script>";
                }
            }

            // Exibe informações detalhadas do filme
            echo '<div class = "filmecontainer2">';
            echo '<div class="containerfilme">';
            echo '<img class="capafilme" src="' . $filme['capa'] . '" alt="Capa do Filme">';
            echo '<div class="filmedetalhes">';
            echo '<h1>' . $filme['titulo'] . '</h1>';
            echo '<h2>lançamento: ' . $filme['ano_lancamento'] . '</h2>';
            echo '<h2>direção: ' . $filme['diretor'] . '</h2>';
            echo '<h3>' . $filme['sinopse'] . '</h3>';

            if (isset($_SESSION['nome'])) {
                $watchlist = file_exists("watchlist.txt") ? file("watchlist.txt", FILE_IGNORE_NEW_LINES) : [];
                $encontrou = false;
                foreach ($watchlist as $linha) {
                    $dados = explode(",", $linha);
                    if ($dados[0] == $_SESSION['nome'] && $dados[1] == $filme['titulo']) {
                        $encontrou = true;
                        break;
                    }
                }
                if ($encontrou == true) {
                    echo '<a class="btwatchlist" href="pagina_filme.php?filme=' . urlencode($filme['titulo']) . '&watchlist=0">remover da watchlist</a>';
                } else {
                    echo '<a class="btwatchlist" href="pagina_filme.php?filme=' . urlencode($filme['titulo']) . '&watchlist=1">watchlist</a>';
                }
            }

            echo '</div>';
            echo '</div>';


            // Exibe o formulário para avaliar e revisar o filme
            if (isset($_SESSION['nome'])) {
                echo '<form class="avaliar" method="post" action="pagina_filme.php?filme=' . urlencode($titulo) . '">';
                echo '<h2>avaliar</h2>';
                echo '<h3>avaliação (0 a 5): <input type="number" name="avaliacao" min="0" max="5" step="1"></h3>';
                echo '<h3 class="comentario">comentário: <textarea name="comentario"></textarea></h3>';
                echo '<button class="btfiltrar">enviar avaliação</button>';
                echo '</form>';
            }
            echo '</div>';

            // Exibe as avaliações dos usuários, se houver alguma
            if (!empty($filme['reviews'])) {
                echo '<div class=" divisao">reviews<hr></div>';
                foreach ($filme['reviews'] as $avaliacao) {
    ?>
                    <div class="review">
                        <div class="info">
                            <div class="titulo"><?= $avaliacao['usuario'] ?></div>
                            <div class="estrela">
                                <?php
                                for ($i = 0; $i < $avaliacao['avaliacao']; $i++) {
                                    echo '<img src="imagens/estrela.png" />';
                                }
                                for ($i = 0; $i < 5 - $avaliacao['avaliacao']; $i++) {
                                    echo '<img src="imagens/estrela_outline.png">';
                                }
                                ?>
                            </div>
                            <div class="texto"><img src="imagens/quote.png" class="icone" />
                                <?= $avaliacao['comentario'] ?>
                            </div>
                        </div>
                    </div>
    <?php
                }
            } else {
                echo '<div class=" divisao">reviews<hr></div>';
                echo '<h3>Ainda não há avaliações</h3>';
            }
        } else {
            echo "<script> alert('Filme não encontrado');</script>";
        }
    } else {
        echo "<script> alert('Título do filme não especificado');</script>";
    }
    ?>
</main>
<!-- Footer -->
<footer>
    <div>
        <a>Sobre nós </a>
        <a>Contato </a>
        <a>Termos de uso</a>
    </div>
    <span>Criado por Celson, Matheus e Nicole <br> 2023</span>
</footer>