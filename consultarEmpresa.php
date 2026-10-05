<?php

$bd = mysqli_connect("localhost", "root", "", "detran");

if (!$bd) {
    die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
}

if (!isset($_POST["expressao"]) || !isset($_POST["op"])) {
    die("Volte à página e escolha o campo que fará a pesquisa.");
}

$expressao = mysqli_real_escape_string($bd, $_POST["expressao"]);
$op = $_POST["op"];

switch ($op) {

    case "CPF":
        $consulta = mysqli_query(
            $bd,
            "SELECT * FROM veiculos WHERE CPF = '$expressao'"
        );
        break;

    case "NOME":
        $consulta = mysqli_query(
            $bd,
            "SELECT * FROM veiculos WHERE NOME LIKE '%$expressao%'"
        );
        break;

    case "CELULAR":
        $consulta = mysqli_query(
            $bd,
            "SELECT * FROM veiculos WHERE CELULAR LIKE '%$expressao%'"
        );
        break;

    case "EMAIL":
        $consulta = mysqli_query(
            $bd,
            "SELECT * FROM veiculos WHERE EMAIL = '$expressao'"
        );
        break;

    default:
        die("Opção de pesquisa inválida.");
}

if (!$consulta) {
    die("Erro na consulta: " . mysqli_error($bd));
}

if (mysqli_num_rows($consulta) == 0) {
    echo "Não existem registros para a pesquisa!";
    echo "<br><br>";
    echo '<a href="consultarEmpresa.html">Voltar</a>';
    exit;
}

while ($reg = mysqli_fetch_assoc($consulta)) {

    $CPF = htmlspecialchars($reg["CPF"]);
    $NOME = htmlspecialchars($reg["NOME"]);
    $NASCIMENTO = htmlspecialchars($reg["NASCIMENTO"]);
    $ENDERECO = htmlspecialchars($reg["ENDERECO"]);
    $BAIRRO = htmlspecialchars($reg["BAIRRO"]);
    $CIDADE = htmlspecialchars($reg["CIDADE"]);
    $UF = htmlspecialchars($reg["UF"]);
    $CELULAR = htmlspecialchars($reg["CELULAR"]);
    $EMAIL = htmlspecialchars($reg["EMAIL"]);

    echo "
        CPF: $CPF<br>
        NOME: $NOME<br>
        NASCIMENTO: $NASCIMENTO<br>
        ENDERECO: $ENDERECO<br>
        BAIRRO: $BAIRRO<br>
        CIDADE: $CIDADE<br>
        UF: $UF<br>
        CELULAR: $CELULAR<br>
        EMAIL: $EMAIL<br>
        <hr>
    ";

    echo '
        <a href="excluirEmpresa.php?pl=' . urlencode($CPF) . '"
           onclick="return confirm(\'Excluir o registro?\');">
           Excluir
        </a>
        &nbsp;&nbsp;
    ';

    echo '
        <a href="alterarEmpresa.php?pl=' . urlencode($CPF) . '">
           Alterar
        </a>
        <hr>
    ';
}

mysqli_close($bd);

?>

<a href="consultarEmpresa.html">Voltar</a>
