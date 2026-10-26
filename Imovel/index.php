<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <TITLE>Lar & Futuro</TITLE>
 <link rel="stylesheet" href="estilo.css">
</HEAD>
<BODY>
<h1>Lar & Futuro - Imóveis</h1>
<a href="index.php">Catálogo</a> | <a href="admin.php">Administração</a>
<hr>

<form method="get" action="index.php">
Busca: <input type="text" name="busca">
Finalidade:
<select name="finalidade">
	<option value="">Todos</option>
	<option value="Venda">Venda</option>
	<option value="Locação">Locação</option>
</select>
Tipo:
<select name="tipo">
	<option value="">Todos</option>
	<option value="Apartamento">Apartamento</option>
	<option value="Casa">Casa</option>
	<option value="Terreno">Terreno</option>
	<option value="Comercial">Comercial</option>
</select>
Preço máximo: <input type="number" name="preco_max" min="0">
<input type="submit" value="Filtrar">
</form>
<br>

<?php
$bd=mysqli_connect("localhost","root","","lar_futuro") or die ("erro!");
mysqli_set_charset($bd,"utf8mb4");

$f_busca=		$_GET["busca"] ?? "";
$f_finalidade=	$_GET["finalidade"] ?? "";
$f_tipo=		$_GET["tipo"] ?? "";
$f_preco=		$_GET["preco_max"] ?? "";

$sql="select * from imoveis where status='Disponível'";
if ($f_finalidade!="")
	$sql=$sql." and finalidade='$f_finalidade'";
if ($f_tipo!="")
	$sql=$sql." and tipo_imovel='$f_tipo'";
if ($f_preco!="")
	$sql=$sql." and preco <= '$f_preco'";
if ($f_busca!="")
	$sql=$sql." and (titulo like '%$f_busca%' or cidade like '%$f_busca%')";

$consulta=mysqli_query($bd,$sql);
$reg=mysqli_fetch_array($consulta);
if ($reg==0)
{
	echo "Não existem imóveis para a pesquisa!";
	exit;
}
while ($reg!=0)
{
	$id = $reg["id"];
	$titulo = $reg["titulo"];
	$tipo = $reg["tipo_imovel"];
	$finalidade = $reg["finalidade"];
	$preco = number_format($reg["preco"],2,",",".");
	$cidade = $reg["cidade"];
	$quartos = $reg["quartos"];
	$area = $reg["area_m2"];

	if ($finalidade=="Venda")
		$classe="venda";
	else
		$classe="locacao";
	?>
	<div class="card">
		<div class="foto"><?php echo $tipo; ?></div>
		<span class="<?php echo $classe; ?>"><?php echo $finalidade; ?></span>
		<h3><?php echo $titulo; ?></h3>
		<b>R$ <?php echo $preco; ?></b><br>
		<?php echo $cidade; ?><br>
		<?php echo "$quartos quartos - $area m²"; ?><br><br>
		<a href="detalhes.php?id=<?php echo $id; ?>">Ver detalhes</a>
	</div>
	<?php
	$reg=mysqli_fetch_array($consulta);
}
?>
</BODY>
</HTML>
