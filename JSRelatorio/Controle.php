<?PHP
require_once "Service.php";

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'projeto';

$link = mysql_connect($servidor,$usuario,$senha) or die("Nao foi possivel conectar!!!");

$select = mysql_select_db($banco);
$sql = "SELECT * FROM cadastro";   

?>