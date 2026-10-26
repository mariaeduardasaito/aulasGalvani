<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Excluir</TITLE>
</HEAD>
<BODY>
<?php
$id=$_GET["id"];
$bd=mysqli_connect("localhost","root","","lar_futuro") or die ("erro!");

$ex=mysqli_query($bd,"delete from imoveis where id='$id'");
if ($ex==1)
	echo "Imóvel removido com sucesso!<br><br>";
else
	echo "ERRO - Imóvel não removido.<br><br>";
?>
<a href="admin.php">Voltar</a>
</BODY>
</HTML>
