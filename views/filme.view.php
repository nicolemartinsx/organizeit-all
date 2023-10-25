<?php
require("header.php");
?>
<main class="pagfilme">
    <?php

    if (isset($_GET['id'])) {
        $titulo = $filme->titulo;
        AddWatchlist($_SESSION['id']);
        // Verifica se o título do filme foi passado na URL
        // if (isset($_GET["watchlist"])) {
        //     $watchlist = file_exists("../models/dados/watchlist.txt") ? file("../models/dados/watchlist.txt", FILE_IGNORE_NEW_LINES) : [];
        //     if ($_GET["watchlist"] == 1) {
        //         $encontrou = false;
        //         foreach ($watchlist as $linha) {
        //             $dados = explode(",", $linha);
        //             if ($dados[0] == $_SESSION['nome'] && $dados[1] == $titulo) {
        //                 $encontrou = true;
        //                 break;
        //             }
        //         }
        //         if ($encontrou == false) {
        //             $novo = $_SESSION["nome"] . ',' . $titulo;
        //             file_put_contents("../models/dados/watchlist.txt", $novo . PHP_EOL, FILE_APPEND);
        //         }
        //     } else {
        //         $novo = [];
        //         foreach ($watchlist as $linha) {
        //             $dados = explode(",", $linha);
        //             if ($dados[0] != $_SESSION["nome"] || $dados[1] != $titulo) {
        //                 $novo[] = $linha;
        //             }
        //         }
        //         $novo = implode(PHP_EOL, $novo);
        //         file_put_contents("../models/dados/watchlist.txt", $novo);
        //     }
        // }

        // Verifica se o filme existe no array
        // if (array_key_exists($titulo, $filmes)) {
        //     $filme = $filmes[$titulo];

        //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //         $avaliacao = $_POST["avaliacao"];
        //         $comentario = $_POST["comentario"];

        //         // Valide a avaliação (certifique-se de que está dentro do intervalo esperado, por exemplo, de 0 a 5).
        //         if ($avaliacao >= 0 && $avaliacao <= 5) {
        //             // Crie um array para representar a nova avaliação
        //             $novaAvaliacao = [
        //                 "usuario" => $_SESSION["nome"], // Use o email do usuário logado 
        //                 "avaliacao" => $avaliacao,
        //                 "comentario" => $comentario,
        //             ];

        //             $avaliacoes = carregarAvaliacoes();
        //             if (!array_key_exists($titulo, $avaliacoes)) {
        //                 $avaliacoes[$titulo] = [];
        //             }

        //             array_push($avaliacoes[$titulo], $novaAvaliacao);
        //             $filme['reviews'] = $avaliacoes[$titulo];

        //             // Atualize o array de filmes com a nova avaliação
        //             $filmes[$titulo] = $filme;

        //             $json_avaliacoes = json_encode($avaliacoes);
        //             file_put_contents("../models/dados/reviews.json", $json_avaliacoes);

        //             echo "<script> alert('Avaliação salva com sucesso!');</script>";
        //             header("Refresh:0");
        //         } else {
        //             echo "<script> alert('Avaliação inválida. Deve estar entre 0 e 5 estrelas');</script>";
        //         }
        //     } else {
        //         $avaliacoes = carregarAvaliacoes();
        //         if (array_key_exists($titulo, $avaliacoes)) {
        //             $filme['reviews'] = $avaliacoes[$titulo];
        //         } else {
        //             $filme['reviews'] = [];
        //         }
        //     }

    ?>

        <!-- Detalhes do filme -->
        <div class="filmecontainer2">
            <div class="containerfilme">
                <img class="capafilme" src="<?= 'data:image/jpeg;base64,' . base64_encode($filme->capa) ?>" class="capa" alt=<?= $filme->titulo ?>>
                <div class="filmedetalhes">
                    <h1><?= $filme->titulo ?></h1>
                    <h2>lançamento: <?= $filme->ano ?></h2>
                    <h2>direção: <?= $filme->diretor ?></h2>
                    <h2>gênero: <?= $filme->genero ?></h2>
                    <h3><?= $filme->sinopse ?></h3>
                    <div class="estrela">
                        <?php for ($i = 0; $i < $filme->estrelas; $i++): ?>
                            <img src="../public/imagens/estrela.png" />
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < 5 - $filme->estrelas; $i++): ?>
                            <img src="../public/imagens/estrela_outline.png">
                        <?php endfor; ?>
                    </div>

                    <?php
                    PesquisarWatchlist($filme->id, $_SESSION['id']);
                    
                    

                    echo '</div>';
                    echo '</div>';


                    // Exibe o formulário para avaliar e revisar o filme
                    // if (isset($_SESSION['nome'])) {
                    //     $achou = false;
                    //     if (array_key_exists($titulo, $avaliacoes)) {
                    //         foreach ($avaliacoes[$titulo] as $avaliacao) {
                    //             if ($avaliacao['usuario'] == $_SESSION['nome']) {
                    //                 $achou = true;
                    //                 break;
                    //             }
                    //         }
                    //     }
                    //     if ($achou == false) {
                    ?>
                    <!-- <form class="avaliar" method="post" action="../controllers/filme.controller.php?filme=<?= urlencode($titulo) ?>">
                                <h2>avaliar</h2>
                                <h3>avaliação (0 a 5): <input type="number" name="avaliacao" min="0" max="5" step="1"></h3>
                                <h3 class="comentario">comentário: <textarea name="comentario"></textarea></h3>
                                <button class="btfiltrar">enviar avaliação</button>
                            </form> -->
                    <?php
                    //     }
                    // }
                    echo '</div>';

                    //Exibe as avaliações dos usuários, se houver alguma
                    // if (!empty($filme['reviews'])) {
                    //     echo '<div class=" divisao">reviews<hr></div>';
                    //     echo '<div class="tabelareviews">';
                    //     foreach ($filme['reviews'] as $avaliacao) {
                    ?>
                    <!-- <div class="review">
                                <div class="info">
                                    <div class="titulo"><?= $avaliacao['usuario'] ?></div>
                                    <div class="estrela"> -->
                    <?php
                    // for ($i = 0; $i < $avaliacao['avaliacao']; $i++) {
                    //     echo '<img src="../public/imagens/estrela.png" />';
                    // }
                    // for ($i = 0; $i < 5 - $avaliacao['avaliacao']; $i++) {
                    //     echo '<img src="../public/imagens/estrela_outline.png">';
                    // }
                    ?>
                    <!-- </div>
                                    <div class="texto"><img src="../public/imagens/quote.png" class="icone" />
                                        <?= $avaliacao['comentario'] ?>
                                    </div>
                                </div>
                            </div> -->

                <?php
                //     }
                //     echo '</div>';
                // } else {
                //     echo '<div class=" divisao">reviews<hr></div>';
                //     echo '<h3>Ainda não há avaliações</h3>';
                // }
            } else {
                echo "<script> alert('Filme não encontrado');</script>";
            }
            // } else {
            //     echo "<script> alert('Título do filme não especificado');</script>";
            // }
                ?>
</main>