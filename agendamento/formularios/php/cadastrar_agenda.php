
<?php
include 'conexao_banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idagenda = mysqli_real_escape_string($conexao, $_POST['idagenda']);
    $nome_agenda = mysqli_real_escape_string($conexao, $_POST['nome_agenda']);
    $diasemana = mysqli_real_escape_string($conexao, $_POST['diasemana']);
    $hora = mysqli_real_escape_string($conexao, $_POST['hora']);
    $disciplina = mysqli_real_escape_string($conexao, $_POST['disciplina']);
    $professor_responsavel = mysqli_real_escape_string($conexao, $_POST['professor_responsavel']);
    $paciente_agendado = mysqli_real_escape_string($conexao, $_POST['paciente_agendado']);
    $telefone_paciente = mysqli_real_escape_string($conexao, $_POST['telefone_paciente']);

    $sql = "INSERT INTO agenda (idagenda, nome_agenda, diasemana, hora, disciplina, professor_responsavel, paciente_agendado, telefone_paciente) VALUES ('$idagenda', '$nome_agenda', '$diasemana', '$hora', '$disciplina', '$professor_responsavel', '$paciente_agendado', '$telefone_paciente')";

    if ($conexao->query($sql) === TRUE) {
        echo "Agendamento cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o agendamento: " . $conexao->error;
    }

    $conexao->close();
}
?>
