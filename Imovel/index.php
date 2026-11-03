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
Busca: <input type="text" name="busca" size="40" placeholder="endereço, tipo, finalidade, cidade...">
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

// escapa todos os filtros para evitar SQL injection
$f_busca=		mysqli_real_escape_string($bd,trim($f_busca));
$f_finalidade=	mysqli_real_escape_string($bd,$f_finalidade);
$f_tipo=		mysqli_real_escape_string($bd,$f_tipo);
$f_preco=		mysqli_real_escape_string($bd,$f_preco);

$sql="select * from imoveis where status='Disponível'";
if ($f_finalidade!="")
	$sql=$sql." and finalidade='$f_finalidade'";
if ($f_tipo!="")
	$sql=$sql." and tipo_imovel='$f_tipo'";
if ($f_preco!="")
	$sql=$sql." and preco <= '$f_preco'";

if ($f_busca!="")
{
	$palavras=explode(" ",$f_busca);
	foreach ($palavras as $p)
	{
		if ($p!="")
		{
			$sql=$sql." and (endereco like '%$p%'
				or tipo_imovel like '%$p%'
				or finalidade like '%$p%'
				or titulo like '%$p%'
				or cidade like '%$p%')";
		}
	}
}

$consulta=mysqli_query($bd,$sql);
$reg=mysqli_fetch_array($consulta);
if (!$reg)
{
	echo "Não existem imóveis para a pesquisa!";
	exit;
}
while ($reg)
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