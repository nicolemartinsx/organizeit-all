<?php
// Função para carregar as avaliações a partir do arquivo JSON
function carregarAvaliacoes()
{
    if (file_exists("../models/dados/reviews.json")) {
        $json_avaliacoes = file_get_contents("../models/dados/reviews.json");
        $json = json_decode($json_avaliacoes, true);
        if (isset($json)) {
            return $json;
        } else {
            return [];
        }
    } else {
        return [];
    }
}

// Array associativo com informações dos filmes (pode incluir as avaliações)
$filmes = [
    "Blue Beetle" => [
        "titulo" => "Blue Beetle",
        'capa' => '../public/imagens/1.jpg',
        "diretor" => "Diretor1",
        "ano_lancamento" => "2023",
        "sinopse" => "texto texto texto texto texto"
    ],
    "Indiana Jones" => [
        "titulo" => "Indiana Jones",
        'capa' => '../public/imagens/2.jpg',
        "diretor" => "Diretor2",
        "ano_lancamento" => "2023",
        "sinopse" => "texto texto texto texto texto"
    ],
    "Oppenheimer" => [
        "titulo" => "Oppenheimer",
        'capa' => '../public/imagens/3.jpg',
        "diretor" => "Diretor3",
        "ano_lancamento" => "2023",
        "sinopse" => "texto texto texto texto texto"
    ],
    "Coringa" => [
        "titulo" => "Coringa",
        'capa' => '../public/imagens/4.jpg',
        "diretor" => "Diretor4",
        "ano_lancamento" => "2023",
        "sinopse" => "texto texto texto texto texto"
    ],
    "Malevola" => [
        "titulo" => "Malevola",
        'capa' => '../public/imagens/5.jpg',
        "diretor" => "Diretor5",
        "ano_lancamento" => "2023",
        "sinopse" => "texto texto texto texto texto"
    ],
    "Barbie" => [
        "titulo" => "Barbie",
        'capa' => '../public/imagens/6.jpg',
        "diretor" => "Diretor6",
        "ano_lancamento" => "2023",
        "sinopse" => "texto texto texto texto texto"
    ]
];
