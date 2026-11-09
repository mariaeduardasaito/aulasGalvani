<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <TITLE>Alterar</TITLE>
 <link rel="stylesheet" href="estilo.css">
</HEAD>
<BODY>
<?php
$id=			$_POST["id"];
$titulo=		$_POST["titulo"];
$tipo_imovel=	$_POST["tipo_imovel"];
$finalidade=	$_POST["finalidade"];
$preco=			$_POST["preco"];
$endereco=		$_POST["endereco"];
$quartos=		$_POST["quartos"];
$banheiros=		$_POST["banheiros"];
$vagas_garagem=	$_POST["vagas_garagem"];
$area_m2=		$_POST["area_m2"];
$descricao=		$_POST["descricao"];
$status=		$_POST["status"];

if ($titulo=="" || $preco=="" || $endereco=="" || $area_m2=="")
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

$id=			mysqli_real_escape_string($bd,$id);
$titulo=		mysqli_real_escape_string($bd,$titulo);
$tipo_imovel=	mysqli_real_escape_string($bd,$tipo_imovel);
$finalidade=	mysqli_real_escape_string($bd,$finalidade);
$preco=			mysqli_real_escape_string($bd,$preco);
$endereco=		mysqli_real_escape_string($bd,$endereco);
$quartos=		mysqli_real_escape_string($bd,$quartos);
$banheiros=		mysqli_real_escape_string($bd,$banheiros);
$vagas_garagem=	mysqli_real_escape_string($bd,$vagas_garagem);
$area_m2=		mysqli_real_escape_string($bd,$area_m2);
$descricao=		mysqli_real_escape_string($bd,$descricao);
$status=		mysqli_real_escape_string($bd,$status);

$es=mysqli_query($bd,"update imoveis set titulo='$titulo',
										 tipo_imovel='$tipo_imovel',
										 finalidade='$finalidade',
										 preco='$preco',
										 endereco='$endereco',
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