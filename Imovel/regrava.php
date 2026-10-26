<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Alterar</TITLE>
</HEAD>
<BODY>
<?php
$id=			$_POST["id"];
$titulo=		$_POST["titulo"];
$tipo_imovel=	$_POST["tipo_imovel"];
$finalidade=	$_POST["finalidade"];
$preco=			$_POST["preco"];
$endereco=		$_POST["endereco"];
$cidade=		$_POST["cidade"];
$quartos=		$_POST["quartos"];
$banheiros=		$_POST["banheiros"];
$vagas_garagem=	$_POST["vagas_garagem"];
$area_m2=		$_POST["area_m2"];
$descricao=		$_POST["descricao"];
$status=		$_POST["status"];

if ($titulo=="" || $preco=="" || $endereco=="" || $cidade=="" || $area_m2=="")
{
	echo "Preencha todos os campos obrigatórios!<br>";
	echo "<a href='admin.php'>Voltar</a>";
	exit;
}
if ($preco<0 || $quartos<0 || $banheiros<0 || $vagas_garagem<0 || $area_m2<=0)
{
	echo "Valores negativos não são permitidos!<br>";
	echo "<a href='admin.php'>Voltar</a>";
	exit;
}

$bd = mysqli_connect("localhost","root","","lar_futuro") OR DIE ("Erro ao conectar!");
mysqli_set_charset($bd,"utf8mb4");

$es=mysqli_query($bd,"update imoveis set titulo='$titulo',
										 tipo_imovel='$tipo_imovel',
										 finalidade='$finalidade',
										 preco='$preco',
										 endereco='$endereco',
										 cidade='$cidade',
										 quartos='$quartos',
										 banheiros='$banheiros',
										 vagas_garagem='$vagas_garagem',
										 area_m2='$area_m2',
										 descricao='$descricao',
										 status='$status'
										 where id='$id'");
if ($es==1)
	echo "Imóvel alterado com sucesso! <br><br>";
else
	echo "ERRO - Imóvel não alterado. <br><br>";

echo "<a href='admin.php'>Voltar</a>";
?>
</BODY>
</HTML>
