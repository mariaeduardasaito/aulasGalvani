<HTML>
<BODY>
<?php
$expressao=		$_POST["expressao"];
$bd=mysqli_connect("localhost","root","","empresa") or die ("erro!");


if (isset($_POST ["op"]))
{
	$op = $_POST ["op"];
	if ($op=="CPF")
		$consulta=mysqli_query($bd,"select * from usuarios where CPF='$expressao'");
	if ($op=="NOME")
		$consulta=mysqli_query($bd,"select * from usuarios where NOME like '%$expressao%'");
	if ($op=="CELULAR")
		$consulta=mysqli_query($bd,"select * from usuarios where CELULAR like '%$expressao%'");
	if ($op=="EMAIL")
		$consulta=mysqli_query($bd,"select * from usuarios where EMAIL like '%$expressao%'");	
} else
{
	echo "volte a página e escolha o campo que fará a pesquisa";
	exit;
}
$reg = mysqli_fetch_array($consulta);
if ($reg==0)
{
	echo "Não existem registros para a pesquisa!";
	exit;
}
while ($reg!=0)
{
	$CPF = $reg["CPF"];
	$NOME = $reg["NOME"];
	$NASCIMENTO = $reg["NASCIMENTO"];
	$ENDERECO = $reg["ENDERECO"];
	$BAIRRO = $reg["BAIRRO"];
	$CIDADE = $reg["CIDADE"];
	$UF = $reg["UF"];
	$CELULAR = $reg["CELULAR"];
	$EMAIL = $reg["EMAIL"];
	$USUARIO = $reg["USUARIO"];
	$SENHA = $reg["SENHA"];

	
	echo   "CPF: $CPF<br>
			NOME: $NOME<br>
			NASCIMENTO: $NASCIMENTO<br>
			ENDERECO: $ENDERECO<br>
			BAIRRO: $BAIRRO<br>
			CIDADE: $CIDADE<br>
			UF: $UF<br>
			CELULAR: $CELULAR<br>
            EMAIL: $EMAIL<br>
            USUARIO: $USUARIO<br>
            SENHA: $SENHA<br>";
			
	?>
	<a href="excluirEmpresa.php?pl=<?php echo $CPF;?>" onclick = "return confirm ('Exclui o registro?');">Excluir</a>
	
	<a href="alterar.Empresa?pl=<?php echo $CPF;?>">Alterar</a><hr>
	<?php
	$reg = mysqli_fetch_array($consulta);		
} 
?>
<br><a href="consultarEmpresa.html">Voltar</a><br>
</body>
</html>
