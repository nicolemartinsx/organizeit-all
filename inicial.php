<!DOCTYPE html>
<html lang= "pt">        
<head>
    <meta charset="UTF-8">
    <title>Site de Avaliações de Cinema</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Site de Avaliações de Cinema</h1>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="filmes_em_alta.php">Em Alta</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Filmes em Alta</h2>
        <div class="filmes-em-alta">
            <?php
            // Exemplo de filmes em alta (dados estaticos)
            $filmes_em_alta = [
                [
                    'titulo' => 'Filme 1',
                    'imagem' => 'imagem1.jpg',
                ],
                [
                    'titulo' => 'Filme 2',
                    'imagem' => 'imagem2.jpg',
                ],
                [
                    'titulo' => 'Filme 3',
                    'imagem' => 'imagem3.jpg',
                ],
            ];

            foreach ($filmes_em_alta as $filme) {
                echo '<div class="filme">';
                echo '<img src="' . $filme['imagem'] . '" alt="' . $filme['titulo'] . '">';
                echo '<p>' . $filme['titulo'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <section>
        <h2>Novas Avaliações</h2>
        <div class="novas-avaliacoes">
            <?php
            // Exemplo de novas avaliações de filmes (dados estáticos)
            $novas_avaliacoes = [
                [
                    'titulo' => 'Avaliação 1',
                    'descricao' => 'Ótimo filme!',
                ],
                [
                    'titulo' => 'Avaliação 2',
                    'descricao' => 'Um clássico imperdível.',
                ],
                [
                    'titulo' => 'Avaliação 3',
                    'descricao' => 'Surpreendente!',
                ],
            ];

            foreach ($novas_avaliacoes as $avaliacao) {
                echo '<div class="avaliacao">';
                echo '<h3>' . $avaliacao['titulo'] . '</h3>';
                echo '<p>' . $avaliacao['descricao'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Meu Site de Avaliações de Cinema</p>
    </footer>
</body>
</html>
