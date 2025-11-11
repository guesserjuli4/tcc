<?php
include 'conexao_banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $RA = mysqli_real_escape_string($conexao, $_POST['RA']);
    $nome_aluno = mysqli_real_escape_string($conexao, $_POST['nome_aluno']);
    $gmail_aluno = mysqli_real_escape_string($conexao, $_POST['gmail_aluno']);
    $datanasc_aluno = mysqli_real_escape_string($conexao, $_POST['datanasc_aluno']);
    $inicio_graduacao = mysqli_real_escape_string($conexao, $_POST['inicio_graduacao']);
    $alunocel = mysqli_real_escape_string($conexao, $_POST['alunocel']);

    $sql = "INSERT INTO aluno (RA, nome_aluno, gmail_aluno, datanasc_aluno, inicio_graduacao, alunocel) VALUES ('$RA', '$nome_aluno', '$gmail_aluno', '$datanasc_aluno', '$inicio_graduacao', '$alunocel')";

    if ($conexao->query($sql) === TRUE) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o aluno: " . $conexao->error;
    }

    $conexao->close();
}
?>

