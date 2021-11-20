<?php
if ($_REQUEST["action"]=="login") {
    if($_POST['usuario'] == "admin" && $_POST['senha'] == "123456")
    {
        session_start();
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["autenticado"] = TRUE;
        header('Location: inserir.php');
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">
    <title>Teste Techlead</title>
</head>
<body>
   

   <form action="login.php?action=login" method="POST">
       <input type="text" name="usuario" placeholder="">
       <input type="password" name="senha" placeholder="">
       <input type="submit" id="submit" value="autenticar">


   </form>
   

    <!--linha-->
        <div class="justify-center">
            <hr>
        </div>
    <!--Bloco de cadastra-se--> 
        <p>
            <a href="cadastro.php">Cadastra-se</a>
            
        </p>
    <!--Bloco esqueci minha senha-->
        <p>
            <a href="recuperarsenha.php">Esqueci minha senha</a>
        </p>

           </div>
        </div>
    </div>
</body>
</html>

