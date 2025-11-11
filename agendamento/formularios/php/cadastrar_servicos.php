<?php
include 'conexao_banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idservicos = mysqli_real_escape_string($conexao, $_POST['idservicos']);
    $tipos = mysqli_real_escape_string($conexao, $_POST['tipos']);

    $sql = "INSERT INTO servicos (idservicos, tipos) VALUES ('$idservicos', '$tipos')";

    if ($conexao->query($sql) === TRUE) {
        echo "Serviços cadastrados com sucesso!";
    } else {
        echo "Erro ao cadastrar os serviços: " . $conexao->error;
    }

    $conexao->close();
}
?>
