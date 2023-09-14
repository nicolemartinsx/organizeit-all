
<?php require('header.view.php'); ?>
<!DOCTYPE html>
<html lang="pt">
<?php  
 $nomePerfil = $_SESSION['nome'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    foreach ($_POST['numero'] as $key => $value) {
        echo $value;
        $FilmesFav = "$nomePerfil,$value";
        file_put_contents("../models/dados/infoUsers.txt", $FilmesFav . PHP_EOL, FILE_APPEND);
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
            echo "<h2>Filmes favoritos</h2><br>";
             require('../models/filmes.model.php');
        $foo=FALSE;
        $favoritos = file_exists("../models/dados/infoUsers.txt") ? file("../models/dados/infoUsers.txt", FILE_IGNORE_NEW_LINES) : [];
        
        foreach ($favoritos as $linha) {
        $dados = explode(",", $linha);
        if ($dados[0] == $nomePerfil) {
            $foo=TRUE;
        
           // echo "<p>";
           // echo str_replace("_" , " ", $dados[1]);
            foreach ($filmes as $filme) {
                if($dados[1]==str_replace(" " , "_", $filme['titulo'])){
                ?>     <img src=<?= $base_url.$filme['capa'] ?> class="capa" alt=<?= $filme['titulo'] ?>>
<?php }
        
                }

                $foo =true;
            
        } 
    }
    ?>
    <?php if($foo == false){?>

    <div class="filmes">
    <form method="post" action="">
    <?php
        $i = 0;
        // Exemplo de filmes em alta (dados estaticos)
        require('../models/filmes.model.php');
        echo "<p>Selecione 4 filmes favoritos</p>";
        foreach ($filmes as $filme) {
        ?>
            
            <img src=<?= $base_url.$filme['capa'] ?> class="capa" alt=<?= $filme['titulo'] ?>>
            <input type="checkbox" name="numero[<?php echo $i; ?>]" value = <?=str_replace(" " , "_", $filme['titulo']) ?> ><br>
          
        <?php
        $i++;
        }
        ?>
    <input type="submit" value="Cadastrar">
    </form>
   

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
