<?php
// Conexão com o banco
$conn = new mysqli("localhost", "root", "", "agendamentoonline");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Se tiver pesquisa
$busca = isset($_GET['busca']) ? $_GET['busca'] : "";
$sql = "SELECT * FROM paciente WHERE nome_paciente LIKE '%$busca%' OR cpf_paciente LIKE '%$busca%' ORDER BY nome_paciente ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Selecionar Paciente - SIGE</title>
    <link rel="stylesheet" href="selecionarpaciente.css">
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <h2>AGENDAMENTO ONLINE</h2>
        <ul>
            <li><a href="agendas.php">Agendas</a></li>
            <li><a href="lista_espera.php">Lista de Espera</a></li>
        </ul>
        <button class="btn-liberar">Liberar Acesso</button>
    </nav>

    <!-- Conteúdo principal -->
    <main class="main-content">
        <header class="topbar">
            <h1>Selecionar Paciente</h1>
            <div class="user-info">
                <p>Professor</p>
                <img src="img/prof.png" alt="Usuário">
            </div>
        </header>

        <!-- Barra de busca -->
        <section class="search-bar">
            <form method="GET">
                <input type="text" name="busca" placeholder="Buscar por nome ou CPF..." value="<?php echo $busca; ?>">
                <button type="submit">Buscar</button>
            </form>
        </section>

        <!-- Lista de pacientes -->
        <section class="pacientes-container">
            <h2>Pacientes Cadastrados</h2>

            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['nome_paciente']; ?></td>
                                <td><?php echo $row['cpf_paciente']; ?></td>
                                <td><?php echo $row['telefone_paciente']; ?></td>
                                <td><?php echo $row['gmail_paciente']; ?></td>
                                <td>
                                    <a href="agendar_paciente.php?id=<?php echo $row['id_paciente']; ?>" class="btn-selecionar">Selecionar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="5">Nenhum paciente encontrado.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <!-- Botão flutuante para adicionar novo paciente -->
        <a href="formularios/php/form_paciente.html" class="btn-add">+</a>
    </main>

</body>
</html>

<?php $conn->close(); ?>
