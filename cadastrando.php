<?php

include('server.php');
session_start();

if($link===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$usuario=$_POST["usuario"];
	$senha=$_POST["senha"];


	$sql="select * from cadastro where usuario ='".$usuario."' AND senha ='".$senha."' ";

	$result=mysqli_query($link,$sql);

	$row=mysqli_fetch_array($result);

	if ($row["usuario"] == "usuario" && $row["senha"] == "123") 
	{	

		$_SESSION["usuario"]=$usuario;
        $_SESSION["senha"]=$senha;

		header('Location:usuario.php');
	}
	elseif($row["usuario"]=="admin")
	{

		$_SESSION["usuario"]=$usuario;
		
		header('Location: usuario.php');
	}

	else
	{
		echo "username or password incorrect";

		
	}

}




?>