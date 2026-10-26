<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Alteração</TITLE>
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
	 echo "ERRO - Registro não Existe.  ";
	 exit;
}
$titulo = $reg["titulo"];
$tipo_imovel = $reg["tipo_imovel"];
$finalidade = $reg["finalidade"];
$preco = $reg["preco"];
$endereco = $reg["endereco"];
$cidade = $reg["cidade"];
$quartos = $reg["quartos"];
$banheiros = $reg["banheiros"];
$vagas_garagem = $reg["vagas_garagem"];
$area_m2 = $reg["area_m2"];
$descricao = $reg["descricao"];
$status = $reg["status"];
?>
<center><h2>Alterar Imóvel</h2></center>
<form method="POST" action="regrava.php">
	<input type="hidden" name="id" value='<?php echo $id; ?>'>
	<p>Título: <input type="text" size="50" name="titulo" value='<?php echo $titulo; ?>'></p>
	<p>Tipo:
	<select name="tipo_imovel">
		<option value="Apartamento" <?php if ($tipo_imovel=="Apartamento") echo "selected"; ?>>Apartamento</option>
		<option value="Casa" <?php if ($tipo_imovel=="Casa") echo "selected"; ?>>Casa</option>
		<option value="Terreno" <?php if ($tipo_imovel=="Terreno") echo "selected"; ?>>Terreno</option>
		<option value="Comercial" <?php if ($tipo_imovel=="Comercial") echo "selected"; ?>>Comercial</option>
	</select></p>
	<p>Finalidade:
	<select name="finalidade">
		<option value="Venda" <?php if ($finalidade=="Venda") echo "selected"; ?>>Venda</option>
		<option value="Locação" <?php if ($finalidade=="Locação") echo "selected"; ?>>Locação</option>
	</select></p>
	<p>Preço: <input type="number" name="preco" min="0" step="0.01" value='<?php echo $preco; ?>'></p>
	<p>Endereço: <input type="text" size="50" name="endereco" value='<?php echo $endereco; ?>'></p>
	<p>Cidade: <input type="text" name="cidade" value='<?php echo $cidade; ?>'></p>
	<p>Quartos: <input type="number" name="quartos" min="0" value='<?php echo $quartos; ?>'></p>
	<p>Banheiros: <input type="number" name="banheiros" min="0" value='<?php echo $banheiros; ?>'></p>
	<p>Vagas: <input type="number" name="vagas_garagem" min="0" value='<?php echo $vagas_garagem; ?>'></p>
	<p>Área (m²): <input type="number" name="area_m2" min="0" step="0.01" value='<?php echo $area_m2; ?>'></p>
	<p>Descrição: <textarea rows="5" cols="60" name="descricao"><?php echo $descricao; ?></textarea></p>
	<p>Status:
	<select name="status">
		<option value="Disponível" <?php if ($status=="Disponível") echo "selected"; ?>>Disponível</option>
		<option value="Reservado" <?php if ($status=="Reservado") echo "selected"; ?>>Reservado</option>
		<option value="Vendido" <?php if ($status=="Vendido") echo "selected"; ?>>Vendido</option>
		<option value="Locado" <?php if ($status=="Locado") echo "selected"; ?>>Locado</option>
	</select></p>
	<input type="submit" value="Alterar">
</form>
<br><a href="admin.php">Voltar</a>
</BODY>
</HTML>
