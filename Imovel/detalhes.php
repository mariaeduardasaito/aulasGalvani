<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Detalhes</TITLE>
 <link rel="stylesheet" href="estilo.css">
</HEAD>
<BODY>
<?php
$id=$_GET["id"];
$bd=mysqli_connect("localhost","root","","lar_futuro") or die ("erro!");
mysqli_set_charset($bd,"utf8mb4");

$consulta=mysqli_query($bd,"select * from imoveis where id='$id'");
$reg=mysqli_fetch_array($consulta);
if ($reg==0)
{
	echo "Imóvel não existe!";
	exit;
}
if ($reg["finalidade"]=="Venda")
	$classe="venda";
else
	$classe="locacao";
?>
<span class="<?php echo $classe; ?>"><?php echo $reg["finalidade"]; ?></span>
<h1><?php echo $reg["titulo"]; ?></h1>
<h2>R$ <?php echo number_format($reg["preco"],2,",","."); ?></h2>
<?php
echo "Tipo: ".$reg["tipo_imovel"]."<br>
	  Endereço: ".$reg["endereco"]."<br>
	  Cidade: ".$reg["cidade"]."<br>
	  Quartos: ".$reg["quartos"]."<br>
	  Banheiros: ".$reg["banheiros"]."<br>
	  Vagas: ".$reg["vagas_garagem"]."<br>
	  Área: ".$reg["area_m2"]." m²<br>
	  Status: ".$reg["status"]."<br>
	  Descrição: ".$reg["descricao"]."<br>";
?>
<br><a href="index.php">Voltar</a>
</BODY>
</HTML>
