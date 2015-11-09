<?php   
$host = "localhost";
$user = "root";
$pass = "";
$banco = "projeto";
$conexao = mysql_connect($host, $user, $pass) or die("nao foi possivel conectar!!!");
mysql_select_db($banco) or die(mysql_error());
$nome =$_POST['nome'];
$sobrenome =$_POST['sobrenome'];
$dataNasc =$_POST['data'];
$email =$_POST['email'];
$sql = mysql_query("INSERT INTO cadastro (nome,sobrenome,dataNasc,email)
VALUES ('$nome','$sobrenome','$dataNasc','$email')");

?>