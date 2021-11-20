<?php

session_start();


if(!isset($_SESSION["usuario"]))
{
	header('Location:login.php');
}

 include('server.php');

 $link = mysqli_connect($hostname,$usuario,$senha,$bancodedados)
or die('Não e possivel conectar: '.mysqli_error($link));

if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "adicionar") {
    #cria a expressão sql de inserção
$sql = "INSERT INTO cadastro (nome, usuario, senha) VALUES (";
$sql .= "'".$_POST['FormNome']."' ,";
$sql .= "'".$_POST['FormUsuario']."', ";
$sql .= "'".$_POST['FormSenha']."' ";
$sql .= ")";

#executa a expressâo sql no servidor, e armazena o resultado
$result = mysqli_query($link, $sql);

#verifica o sucesso da operação
if(!$result)
{die('erro: '.mysqli_error($link));}

#se a opreção foi reliazada com sucesso, informar na tela
else
 {echo 'A opreção foi realizada com sucesso.';}
 

}

 ?>
 <html>
    <head>
        <title>Cadastro</title>
    </head>
    <body>
        Preecha os campos abaixo:
       <form method="POST" action="cadastrar.php?acao=adicionar">
           <table>
               <tr>
                   <td>Nome</td>
                   <td>
                       <input name="FormNome" maxlength="64">
                   </td>
               </tr>

               <tr>
                   <td>usuario</td>
                   <td>
                       <input name="FormUsuario" maxlength="32">
                   </td>
               </tr>

               <tr>
                   <td>senha</td>
                   <td>
                       <input name="FormSenha" type="password" maxlength="16">
                   </td>
               </tr>
               <td colspan=2 align=right>
                   <input type="submit" value="Cadastrar">
               </td>
           </table>
       </form>
    </body>
</html>