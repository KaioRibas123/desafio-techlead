<?php

include('server.php');

#executa conexão com o mysql
$link = mysqli_connect($hostname,$usuario,$senha,$bancodedados)
or die('Não e possivel conectar:'.mysqli_error($link));

#verefica se o arquivo foi chamado a partir do formulario 
if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "adicionar")
{
#cria a expressão sql de inserção
$sql = "INSERT INTO LIVROS (LIVRO, AUTOR, DATA_CADASTRO) VALUES (";
$sql .= "'".$_POST['FormNomeLivro']."' ,";
$sql .= "'".$_POST['FormNomeAutor']."', ";
$sql .= "'".$_POST['FormDataCadastro']."' ";
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
else if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "alterar")
{
#cria a expressão sql de alteração 
$sql = "UPDATE LIVROS SET";
$sql .= "LIVRO = '".$_POST['FormNomeLivro']. "', ";
$sql .= "AUTOR = '".$_POST['FormNomeAutor']. "', ";
$sql .= "DATA_CADASTRO = '".$_POST['FormDataCadastro']."'";
$sql .= "WHERE ID = ".$_POST['FormCodigoLivro'];

$result = mysqli_query($link, $sql);

if(!$result)
{die('erro: '.mysqli_error($link));}

else 
{echo 'a operação foi realizada com sucesso.';}

}
elseif(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "excluir")
{
   $sql = "DELETE FROM LIVROS WHERE ID = ".$_REQUEST['buscacodigo'];

   $result = mysqli_query($link, $sql);

   if(!$result)
   {die('erro: '. mysqli_error($link));}

   else {echo 'A operação foi realizada com sucesso.';}
}


?>

<br><A href="inserir.php">Clique aqui para inserir um novo registro.</A>
<br><A href="lista.php">Clique aqui para visualizar os registro.</A>