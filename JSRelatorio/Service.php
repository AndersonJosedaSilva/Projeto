<html>


<a href="../telarelatorio.html">Voltar</a>
<table border="1">
<TR>
        <TD>Nome</TD>
        <TD>sobrenome</TD>
        <TD>email</TD>
        <TD>data</TD>
        
    </TR>

<?php
require_once "Controle.php";         
$result = mysql_query($sql);
while($tbl = mysql_fetch_array($result))
{
    $nome = $tbl["nome"];
    $sobrenome = $tbl["sobrenome"];
    $email = $tbl["email"];
    $data = $tbl["dataNasc"];
    
    echo "<TR>";
    echo "<TD>$nome</TD>";
    echo "<TD>$sobrenome</TD>";
    echo "<TD>$email</TD>";
    echo "<TD>$data</TD>";
    echo "</TR>";
};
?>

    </table>
</html>
