<HTML>
<BODY>
<?php
$placa=		$_GET["pl"];
$bd=mysqli_connect("localhost","root","","detran") or die ("erro!");
//mysql_select_db("detran");

$excluiu=mysqli_query($bd,"delete from veiculos where placa = '$placa'");

if ($excluiu == 1)
		echo "O registro foi excluído!!!";
	else
		echo "O registro NÃO foi excluído!!!";

?>
<br><a href="consultar.html">Voltar para nova Consulta</a><br>
</body>
</html>
