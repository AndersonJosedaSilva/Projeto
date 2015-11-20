<?php

$conn = @mysql_connect('192.168.0.0','root','');
if (!$conn) {
	die('Não foi possível Conectar: ' . mysql_error());
}
mysql_select_db('cadastroclientes', $conn);

?>