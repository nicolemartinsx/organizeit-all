

<?php require('header.view.php'); ?>
<!DOCTYPE html>
<html lang="pt">
<?php 

 
 $nomePerfil = $_SESSION['nome'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    foreach ($_POST['numero'] as $key => $value) {
        echo $value;
        $FilmesFav = "$nomePerfil,$value";
        file_put_contents("../models/dados/watchlist.txt", $FilmesFav . PHP_EOL, FILE_APPEND);
    }  
}






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
  
  echo $_SESSION['nome'];    ?>
  </h4>
  </div>
 
     <div class="divisao">
    <a class = "link"  href = "<?= $base_url ?>/controllers/perfil.controller.php"><p>Favoritos</p></a>  
    <a class = "link"  href = "<?= $base_url ?>/controllers/watchlist.controller.php"><p class = "escrita-link">Watchlist</p></a>
    <a class = "link"  href = "<?= $base_url ?>/controllers/reviews.controller.php"><p>Reviews</p></a>
    
        <hr>
    </div>



    <?php 
            echo "<h2>Filmes na watchlist</h2><br>";
			
            require('../models/filmes.model.php');
        $foo=FALSE;
        $favoritos = file_exists("../models/dados/watchlist.txt") ? file("../models/dados/watchlist.txt", FILE_IGNORE_NEW_LINES) : [];
        
        foreach ($favoritos as $linha) {
        $dados = explode(",", $linha);
        if ($dados[0] == $nomePerfil) {
            $foo=TRUE;
        
           // echo "<p>";
           // echo str_replace("_" , " ", $dados[1]);
            foreach ($filmes as $filme) {
               
                if($dados[1]==$filme['titulo']){
                ?>     <img src="<?=$base_url.$filme['capa'] ?>" class="capa" alt=<?= $filme['titulo'] ?>>
<?php }
        
                }

                $foo =true;
            
        } 
    }
    ?>
    <?php if($foo == false){?>
		<h1>Você não tem nenhum filme na watchlist, clique e adicione</h1>
    <div class="filmes">
        
    <?php
        $i = 0;
 
        require("../models/inicial.model.php");
        foreach ($filmes as $filme) {
        ?>
            
            <a href="filme.controller.php?filme=<?= urlencode($filme['titulo']) ?>">
                <img src=<?= $base_url.$filme['capa'] ?> class="capa" alt=<?= $filme['titulo'] ?>>
            </a>
          
        <?php
        $i++;
        }
        ?>
 
   

</div>
<?php }?>

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
