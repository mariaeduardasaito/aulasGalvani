<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <TITLE>Incluir</TITLE>
 <link rel="stylesheet" href="estilo.css">
</HEAD>
<BODY>
<?php
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

if ($titulo=="" || $tipo_imovel=="" || $finalidade=="" || $preco=="" || $endereco=="" || $area_m2=="")
{
	echo "Preencha todos os campos obrigatórios!<br>";
	echo "<a href='incluir.html'>Voltar</a>";
	exit;
}
if ($preco<0 || $quartos<0 || $banheiros<0 || $vagas_garagem<0 || $area_m2<=0)
{
	echo "Preço, quartos, banheiros, vagas e área não podem ser negativos!<br>";
	echo "<a href='incluir.html'>Voltar</a>";
	exit;
}

$con=mysqli_connect("localhost","root","","lar_futuro") or die ("erro!");
mysqli_set_charset($con,"utf8mb4");

$titulo=		mysqli_real_escape_string($con,$titulo);
$tipo_imovel=	mysqli_real_escape_string($con,$tipo_imovel);
$finalidade=	mysqli_real_escape_string($con,$finalidade);
$preco=			mysqli_real_escape_string($con,$preco);
$endereco=		mysqli_real_escape_string($con,$endereco);
$quartos=		mysqli_real_escape_string($con,$quartos);
$banheiros=		mysqli_real_escape_string($con,$banheiros);
$vagas_garagem=	mysqli_real_escape_string($con,$vagas_garagem);
$area_m2=		mysqli_real_escape_string($con,$area_m2);
$descricao=		mysqli_real_escape_string($con,$descricao);

$in = "insert into imoveis (titulo,tipo_imovel,finalidade,preco,endereco,quartos,banheiros,vagas_garagem,area_m2,descricao)
	   values ('$titulo','$tipo_imovel','$finalidade','$preco','$endereco','$quartos','$banheiros','$vagas_garagem','$area_m2','$descricao')";
$incluir=mysqli_query($con,$in);
if ($incluir==1)
{
   echo "Título: $titulo<BR>
   Tipo: $tipo_imovel<BR>
   Finalidade: $finalidade<BR>
   Preço: $preco<BR>
   Endereço: $endereco<hr>";
   echo "Imóvel incluído com sucesso!<BR>";
}
else
{
   echo "Imóvel NÃO incluído!<BR>";
}
echo "<a href='incluir.html'>Cadastrar outro</a> | <a href='admin.php'>Administração</a><BR>";
?>
</BODY>
</HTML>