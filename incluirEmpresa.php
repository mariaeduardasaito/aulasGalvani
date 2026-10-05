<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Incluir</TITLE>
</HEAD>
<BODY>
<?php
$CPF=			$_POST["CPF"];
$NOME=		$_POST["NOME"];
$NASCIMENTO= 		$_POST["NASCIMENTO"];
$ENDERECO=			$_POST["ENDERECO"];
$BAIRRO=			$_POST["BAIRRO"];
$CIDADE=	$_POST["CIDADE"];
$UF=			$_POST["UF"];
$CELULAR=		$_POST["CELULAR"];
$EMAIL=		$_POST["EMAIL"];
$USUARIO=		$_POST["USUARIO"];
$SENHA=		$_POST["SENHA"];
$con=mysqli_connect("localhost","root","","detran") or die ("erro!");

$in = "insert into veiculos values ('$CPF',
									'$NOME',
									'$NASCIMENTO',
									'$ENDERECO',
									'$BAIRRO',
									'$CIDADE', 
									'$UF', 
									'$CELULAR',
                                    '$EMAIL',
                                    '$USUARIO',
                                    '$SENHA')";
$incluir=mysqli_query($con,$in);
if ($incluir==1)
{
   echo "
   CPF:		$CPF<BR>
   NOME:		$NOME<BR>
   NASCIMENTO:		    $NASCIMENTO<BR>
   ENDERECO:			    $ENDERECO<BR>
   BAIRRO:			        $BAIRRO<BR>
   CIDADE:              $CIDADE<BR>
   UF:		            $UF<BR>
   CELULAR:             $CELULAR<BR>
   EMAIL:		        $EMAIL<BR>
   USUARIO:		        $USUARIO<BR>
   SENHA:		        $SENHA<BR>";
   
   echo "Registro incluído com sucesso!<BR>";
}
else
{
   echo "Registro NÃO incluído!<BR>";
}
echo "<a href='incluirEmpresa.html'>Voltar</a><BR>";
?>
</BODY>
</HTML>

