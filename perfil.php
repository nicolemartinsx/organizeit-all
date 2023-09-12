

<!DOCTYPE html>
<html lang="pt">
<?php 
 session_start(); 
 $nomePerfil = $_SESSION['nome'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome1 = $_POST["nome1"];
    $nome2 = $_POST["nome2"];
    $nome3 = $_POST["nome3"];
    $nome4 = $_POST["nome4"];
  


        $FilmesFav = "$nomePerfil,$nome1,$nome2,$nome3,$nome4";
        file_put_contents("infoUsers.txt", $FilmesFav . PHP_EOL, FILE_APPEND);
        
    
}


?>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <title>Organize IT.all</title>
       
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <div class="header-container">
            <!-- Logo -->
            <img src="logo.png" alt="Logo da empresa" width="334" height="55">

            <div class="alinhamentoheader">
                <!-- Campo de pesquisa -->
                <div class="pesquisa">
                    <input type="text" class="pesquisa-input" placeholder="Pesquisar...">
                    <a><img src="pesquisar.png" alt="Lupa" width="25"></a>
                </div>

                <!-- Botões -->


                <a class="headerbutton" href="index.php">INICIO</a>
                <a class="headerbutton" href="emalta.php">EM ALTA</a>
                <a class="headerbutton login" href="login.php">LOGIN</a>
            </div>
        </div>
    </header>
    <h1>Perfil</h1>
    <img src ="Foto_perfil_exemplo.jpg" height = "100"> 
  
  <?php  
  echo "<p> <b>";
  echo $_SESSION['nome'];    ?>
    <br>
    <a href = "watchlist.php">Watchlist</a>
    <a href = "amigos.php">Amigos</a>



    <?php 
        $foo=FALSE;
        $favoritos = file_exists("infoUsers.txt") ? file("infoUsers.txt", FILE_IGNORE_NEW_LINES) : [];
        
        foreach ($favoritos as $linha) {
        $dados = explode(",", $linha);
        if ($dados[0] == $nomePerfil) {
            $foo=TRUE;
            echo "<h2>Filmes favoritos</h2>";
            echo "<p >";
            echo $dados[1];
            echo "</p><img src = '2.jpg' height = '100' > "; 
            echo "<p>";
            echo $dados[2];
            echo "</p><img src = '2.jpg' height = '100'>    "; 
            echo "<p>";
            echo $dados[3];
            echo "</p><img src = '2.jpg' height = '100'>"; 
            echo "<p>";
            echo $dados[4];
            echo "</p><img src = '2.jpg' height = '100'>";     
            break;
        } 
    }
         if($foo == false){
   
            ?>
        <p>Por favor digite os seus filmes favoritos</p>
        <form method="post" action="">
        <label for="nome1">Nome:</label>
        <input type="text" name="nome1" required><br>

        <label for="nome2">Nome:</label>
        <input type="text" name="nome2" required><br>

        <label for="nome3">Nome:</label>
        <input type="text" name="nome3" required><br>
       
        <label for="nome4">Nome:</label>
        <input type="text" name="nome4" required><br>

        <input type="submit" value="Cadastrar">
    </form>
       

    <?php
        }
    ?>
    

        <br>
        <br>
        <br>

        <form action="clear-session.php" method="POST">
    <input type="submit" value="Deslogar" />
</form>


    
</body>


</html>
