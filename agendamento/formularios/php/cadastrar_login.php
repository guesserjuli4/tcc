<?php
include 'conexao_banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idlogin = mysqli_real_escape_string($conexao, $_POST['idlogin']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = "INSERT INTO login (idlogin, email, senha) VALUES ('$idlogin', '$email', '$senha')";

    if ($conexao->query($sql) === TRUE) {
        echo "Login cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o login: " . $conexao->error;
    }

    $conexao->close();
}
?>