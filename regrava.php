<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
$placa=			$_POST["placa"];
$veiculo=		$_POST["veiculo"];
$marca= 		$_POST["marca"];
$cor=			$_POST["cor"];
$ano=			$_POST["ano"];
$proprietario=	$_POST["proprietario"];
$fone=			$_POST["fone"];
$opcionais=		$_POST["opcionais"];

$bd = mysqli_connect("localhost","root","","detran") OR DIE ("Erro ao conectar!");
//conecta com o servidor mysql

$es=mysqli_query($bd,"update veiculos set veiculo='$veiculo', 
										  marca='$marca', 
										  cor='$cor', 
										  ano='$ano', 
										  proprietario='$proprietario', 
										  fone='$fone', 
										  opcionais='$opcionais' 
										  where placa='$placa'");
if ($es==1)
{
    echo "Placa: $placa<br>
		  Veiculo: $veiculo<br>
		  Marca: $marca<br>
		  Cor: $cor<br>
		  Ano: $ano<br>
		  Proprietario: $proprietario<br>
		  Fone: $fone<br>
		  Opcionais: $opcionais<br>
		  <hr>";
	echo "Obrigado por participar - Registro Alterado. <br><br>  ";
}
else
{
    echo "ERRO - Registro n�o Alterado. <br><br> ";
}
	echo "<a href=consultar.html>Voltar para nova Consulta";
?>
</body>
</html>
