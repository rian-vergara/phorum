<?php
session_start();
	$servidor='localhost';
	$user='root';
	$pass='220117Banco@123';
	$dbname='phorumbd';
	$conexao=mysqli_connect($servidor, $user, $pass, $dbname) or die ("Não foi possível conectar ao servidor do banco de dados.");
?>