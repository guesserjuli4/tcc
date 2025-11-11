<?php
include 'conexao_banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $iddisciplina = mysqli_real_escape_string($conexao, $_POST['iddisciplina']);
    $disciplina = mysqli_real_escape_string($conexao, $_POST['disciplina']);
    $professores = mysqli_real_escape_string($conexao, $_POST['professores']);

    $sql = "INSERT INTO disciplina (iddisciplina, disciplina, professores) VALUES ('$iddisciplina', '$disciplina', '$professores')";

    if ($conexao->query($sql) === TRUE) {
        echo "Disciplina cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar a disciplina: " . $conexao->error;
    }

    $conexao->close();
}
?>
