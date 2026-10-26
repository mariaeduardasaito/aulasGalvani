<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Administração</TITLE>
 <link rel="stylesheet" href="estilo.css">
</HEAD>
<BODY>
<h1>Administração de Imóveis</h1>
<a href="index.php">Catálogo</a> | <a href="incluir.html">Cadastrar novo imóvel</a>
<br><br>
<?php
$bd=mysqli_connect("localhost","root","","lar_futuro") or die ("erro!");
mysqli_set_charset($bd,"utf8mb4");

$consulta=mysqli_query($bd,"select * from imoveis order by id desc");
$reg=mysqli_fetch_array($consulta);
if ($reg==0)
{
	echo "Não existem imóveis cadastrados!";
	exit;
}
?>
<table>
<tr><th>ID</th><th>Título</th><th>Tipo</th><th>Finalidade</th><th>Preço</th><th>Status</th><th>Ações</th></tr>
<?php
while ($reg!=0)
{
	$id = $reg["id"];
	?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $reg["titulo"]; ?></td>
		<td><?php echo $reg["tipo_imovel"]; ?></td>
		<td><?php echo $reg["finalidade"]; ?></td>
		<td>R$ <?php echo number_format($reg["preco"],2,",","."); ?></td>
		<td><?php echo $reg["status"]; ?></td>
		<td>
			<a href="alterar.php?id=<?php echo $id; ?>">Alterar</a>
			<a href="excluir.php?id=<?php echo $id; ?>" onclick = "return confirm ('Tem certeza que deseja remover este imóvel?');">Excluir</a>
		</td>
	</tr>
	<?php
	$reg=mysqli_fetch_array($consulta);
}
?>
</table>
</BODY>
</HTML>
