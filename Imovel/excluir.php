<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <TITLE>Excluir</TITLE>
 <link rel="stylesheet" href="estilo.css">
</HEAD>
<BODY>
<?php
$id=$_GET["id"];
$bd=mysqli_connect("localhost","root","","lar_futuro") or die ("erro!");
$id=mysqli_real_escape_string($bd,$id);

$ex=mysqli_query($bd,"delete from imoveis where id='$id'");
if ($ex==1)
	echo "Imóvel removido com sucesso!<br><br>";
else
	echo "ERRO - Imóvel não removido.<br><br>";
?>
<a href="admin.php">Voltar</a>
</BODY>
</HTML>