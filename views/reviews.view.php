


<?php require('header.view.php'); ?>
<!DOCTYPE html>
<html lang="pt">
<?php 

 







?>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <title>Organize IT.all</title>
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>/public/css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<main>
  
<div class = "div-nome"><h4 class = "nome">
  <?php  
  $nomePerfil=$_SESSION['nome']; 
  
  echo $_SESSION['nome'];   
  
  ?>
  </h4>
  </div>
  
   
    <div class="divisao">
        <a class = "link"  href = "<?= $base_url ?>/controllers/perfil.controller.php"><p>Favoritos</p></a>  
    <a class = "link"  href = "<?= $base_url ?>/controllers/watchlist.controller.php"><p class = "escrita-link">Watchlist</p></a>
    <a class = "link"  href = "<?= $base_url ?>/controllers/reviews.controller.php"><p>Reviews</p></a>
    

        <hr>
    </div>
 
  
  
  

    



    <?php echo "<h2>Suas reviews</h2><br>";?>

    <div class="reviews">
        
    <div class="tabelareviews">
        <?php
        
        $novas_avaliacoes = file_exists("../models/dados/avaliacoes.txt") ? file("../models/dados/avaliacoes.txt", FILE_IGNORE_NEW_LINES) : [];

        foreach ($novas_avaliacoes as $avaliacao) {
            $dados = explode(",", $avaliacao);
            if($nomePerfil==$dados[1]){

            
        ?>
            <div class="review">
                
            <img src="<?= $base_url."/public/".$dados[4] ?>" class="capa" alt="Filme 1">
                <div class="info">

                    <?= $dados[2] ?> Estrelas
                    <div class="titulo"><?= $dados[0] ?></div>
                    <div class="estrela">
                        <?php
                        for ($i = 0; $i < $dados[2]; $i++) {
							
                            ?><img src="<?= $base_url ?>/public/imagens/estrela.png" /> <?php
                        }
                        for ($i = 0; $i < 5 - $dados[2]; $i++) {
                            ?><img src="<?= $base_url ?>/public/imagens/estrela_outline.png"><?php
                        }
                        ?>
                    </div>
                    <div class="texto"><img src="<?= $base_url ?>public/imagens/quote.png" class="icone" />
                        <?= $dados[3] ?>
                    </div>
                </div>
            </div>
        <?php
       } }
        ?>
    </div>
 
   

</div>


        <br>
        <br>
        <br>

        <form action="clear-session.php" method="POST">
    <input type="submit" value="Deslogar" />
</form>


</main>

<footer>
    <div>
        <a>Sobre nós </a>
        <a>Contato </a>
        <a>Termos de uso</a>
    </div>
    <span>Criado por Celson, Matheus e Nicole <br> 2023</span>
</footer>
</body>


</html>

    



</body>


</html>
