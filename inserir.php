
<?php

include('server.php');

#executa conexão com o mysql
$link = mysqli_connect($hostname,$usuario,$senha,$bancodedados)
or die('Não e possivel conectar: '.mysqli_error($link));

#verefica se o arquivo foi chamado a partir do formulario 
if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "editar")
{
    $sql = "SELECT * FROM LIVROS WHERE ID = ".$_REQUEST['buscacodigo'];

    $result = mysqli_query($link, $sql);

    if($tbl = mysqli_fetch_array($result)){
        
        $Codigo  = $tbl["ID"];
        $Livro   = $tbl["LIVRO"];
        $Autor   = $tbl["AUTOR"];
        $DataCadastro = $tbl["DATA_CADASTRO"];
    }
    
    else 
    {echo "Registro não encontrado.";}
}

?>


<html>
    <head>
        <title>Gerenciando Registros</title>
    </head>
<h1>Administrador</h1>
<body>
    Preencha os campos abaixo:
<?php
 if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "editar")
 {$AcaoForm = "alterar";}
 {
     $AcaoForm     = "adicionar";
     $Codigo       = "";
     $Livro        = "";
     $Autor        = "";
     $DataCadastro = "";
 }
?>
    <form method="POST" action="gerencia-registro.php?acao=<?php echo $AcaoForm;?>">

    <input type="hidden" name="FormCodigoLivro" value ="<?php echo $Codigo;?>">
        <table>
            <tr>
                <td>Nome do Livro</td>
                <td>
                    <input name="FormNomeLivro" maxlength=64 value="<?php echo $Livro; ?>">
                </td>
            </tr>

            <tr>
                <td>Nome do Autor</td>
                <td>
                    <input name="FormNomeAutor" maxlength=32 value="<?php echo $Autor;?>">
                </td>
            </tr>

            <tr>
                <td>Data Cadastro</td>
                <td>
                    <input name="FormDataCadastro" maxlength=16 value="<?php echo $DataCadastro;?>">
                </td>
            </tr>

            <tr>
                <td colspan=2 align=right>
                    <input type="reset" value="limpar">

    <?php
       if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "editar")
       {$NomeBotao = "Alterar";}
       else
       {$NomeBotao = "Cadastrar";}

    ?>
        <input type="submit" value="<?php echo $NomeBotao;?>">         
            </td>
            </tr>
        </table>
    </form>
</body>
</html>

