<?php
include 'conexao_banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $matricula = mysqli_real_escape_string($conexao, $_POST['matricula']);
    $nome_colaborador = mysqli_real_escape_string($conexao, $_POST['nome_colaborador']);
    $gmail_colaborador = mysqli_real_escape_string($conexao, $_POST['gmail_colaborador']);
    $datanasc_colaborador = mysqli_real_escape_string($conexao, $_POST['datanasc_colaborador']);


    $sql = "INSERT INTO colaboradoradmin (matricula, nome_colaborador, gmail_colaborador, datanasc_colaborador) VALUES ('$matricula', '$nome_colaborador', '$gmail_colaborador', '$datanasc_colaborador')";

    if ($conexao->query($sql) === TRUE) {
        echo "Colaboradoradmin cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o colaborador: " . $conexao->error;
    }

    $conexao->close();
}
?>
