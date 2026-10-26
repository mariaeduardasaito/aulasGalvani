<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Incluir</TITLE>
</HEAD>
<BODY>
<?php
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

if ($titulo=="" || $tipo_imovel=="" || $finalidade=="" || $preco=="" || $endereco=="" || $cidade=="" || $area_m2=="")
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

$in = "insert into imoveis (titulo,tipo_imovel,finalidade,preco,endereco,cidade,quartos,banheiros,vagas_garagem,area_m2,descricao)
	   values ('$titulo','$tipo_imovel','$finalidade','$preco','$endereco','$cidade','$quartos','$banheiros','$vagas_garagem','$area_m2','$descricao')";
$incluir=mysqli_query($con,$in);
if ($incluir==1)
{
   echo "Título: $titulo<BR>
   Tipo: $tipo_imovel<BR>
   Finalidade: $finalidade<BR>
   Preço: $preco<BR>
   Endereço: $endereco<BR>
   Cidade: $cidade<hr>";
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
