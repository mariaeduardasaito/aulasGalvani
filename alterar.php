<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Alteração</TITLE>
</HEAD>
<?php

$placa=trim($_GET["pl"]);

$bd=mysqli_connect("localhost","root","","detran") or die ("erro!");


$sql="select * from veiculos where placa = '$placa'"; //consulta sql

$consulta=mysqli_query($bd, $sql); //faz a consulta de todos os registros
$reg=mysqli_fetch_array($consulta); // cria uma matriz com todos os campos e registros

if ($reg==0)
{
	 echo "ERRO - Registro não Existe.  ";
	 exit;
}
else
{
	$placa = $reg["placa"];
	$veiculo = $reg["veiculo"];
	$marca = $reg["marca"];
	$cor = $reg["cor"];
	$ano = $reg["ano"];
	$proprietario = $reg["proprietario"];
	$fone = $reg["fone"];
	$opcionais = $reg["opcionais"];
}
?>
<center><h2>Alterar Registros</center>
	<?php echo "Placa: $placa<br><br>" ?>
	<form method="POST" action="regrava.php">
		<p> 			<input type="hidden" size="10" name="placa" 		value ='<?php echo "$placa"; ?>'>
		<p>Veiculo: 	<input type="text" size="40"   name="veiculo" 		value ='<?php echo "$veiculo"; ?>'></p>
		<p>Marca: 		<input type="text" size="50"   name="marca" 		value ='<?php echo "$marca"; ?>'></p>
		<p>Cor: 		<input type="text" size="20"   name="cor" 			value ='<?php echo "$cor"; ?>'></p>
		<p>Ano: 		<input type="text" size="20"   name="ano" 			value ='<?php echo "$ano"; ?>'></p>
		<p>Proprietario:<input type="text" size="20"   name="proprietario" 	value ='<?php echo "$proprietario"; ?>'></p>
		<p>Fone: 		<input type="text" size="20"   name="fone" 			value ='<?php echo "$fone"; ?>'></p>
		<p>Opcionais: 	<input type="text" size="20"   name="opcionais" 	value ='<?php echo "$opcionais"; ?>'></p>
		<input type="submit" name="B1" value="Alterar"></p>
 	</form>	
	
</body>
</html>
