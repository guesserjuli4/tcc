<?php
include '../conexao.php'; // ajuste o caminho conforme sua estrutura

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nomepaciente = $conn->real_escape_string($_POST['nomepaciente']);
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $servico = $conn->real_escape_string($_POST['servico']);

    // Inserir no banco
    $sql = "INSERT INTO lista_espera (nomepaciente, telefone, servico) VALUES ('$nomepaciente', '$telefone', '$servico')";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para a lista de espera ou mostra mensagem de sucesso
        header("Location: ../listaespera.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

