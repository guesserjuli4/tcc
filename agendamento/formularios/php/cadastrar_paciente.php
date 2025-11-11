<?php
include 'formularios/php/conexao_banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf_paciente']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome_paciente']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone_paciente']);
    $nascimento = mysqli_real_escape_string($conexao, $_POST['datanasc_paciente']);
    $email = mysqli_real_escape_string($conexao, $_POST['gmail_paciente']);

    $sql = "INSERT INTO paciente 
            (cpf_paciente, nome_paciente, telefone_paciente, datanasc_paciente, gmail_paciente)
            VALUES ('$cpf', '$nome', '$telefone', '$nascimento', '$email')";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>
                alert('✅ Paciente cadastrado com sucesso!');
                window.location.href = 'selecionarpaciente.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Erro ao cadastrar o paciente: " . $conexao->error . "');
                window.history.back();
              </script>";
    }
}

$conexao->close();
?>
