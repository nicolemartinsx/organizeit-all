

<!DOCTYPE html>
<html lang="pt">
<?php 
 session_start(); 


 $nomePerfil = $_SESSION['nome'];
 $nome = $_POST["nome"];
 $control = true;

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   
    $amigosSalvos = file_exists("amigos.txt") ? file("amigos.txt", FILE_IGNORE_NEW_LINES) : [];
    foreach ($amigosSalvos as $linha) {
     $dados = explode(",", $linha);
        if($dados[0]==$dados[1]){
           
           echo 'Você não pode ser amigo de vc mesmo';
           $control=false; 
           break;
        }else if($nomePerfil === $dados[0] && $nome===$dados[1]){
            echo 'Vocês já são amigos';
            $control=false;
            break;
        }

        if($control===true){
            $InfoAmigos = "$nomePerfil, $nome";
            file_put_contents("amigos.txt", $InfoAmigos . PHP_EOL, FILE_APPEND);
        }

    }

    
        



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
   
    <?php 
    ECHO '<p>Usuarios disponiveis: </p>';
    $i = 0;
    $usuarios = file_exists("usuarios.txt") ? file("usuarios.txt", FILE_IGNORE_NEW_LINES) : [];
     foreach ($usuarios as $linha) {
      $dados = explode(",", $linha);
      echo $dados[0];
      echo '<br>';
      $i++;
     }
    ?>
    <p>Digite o nome da pessoa que você deseja adicionar</p>
<form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <input type="submit" value="Adicionar">
    </form>



    
</body>


</html>
