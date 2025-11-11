<?php
include 'formularios/php/conexao_banco.php';

// Deletar paciente
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM pacientes WHERE id=$id");
    header("Location: listaespera.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Espera - SIGE</title>
    <link rel="stylesheet" href="listaespera.css">
</head>
<body>
    <nav class="sidebar">
        <h2>AGENDAMENTO ONLINE</h2>
        <ul> 
            <li><a href="agenda.html">Agenda</a></li>
            <li><a class="active" href="listaespera.php">Lista de Espera</a></li>
        </ul>
    </nav>

    <main class="main-content">
        <header class="topbar">
            <div class="user-info">
                <p>Professor</p>
                <img src="img/prof.png" alt="Usuário">
            </div>
        </header>

        <section class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>ÚLTIMA ATUALIZAÇÃO</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nome']) ?></td>
                            <td><?= $row['ultima_atualizacao'] ?></td>
                            <td>
                                <a href="form_listaspera.php?id=<?= $row['id'] ?>">Editar</a> |
                                <a href="listaespera.php?delete=<?= $row['id'] ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="3">Nenhum paciente cadastrado</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <a href="formularios/php/form_listaespera.html" class="add-button">+</a>
    </main>
</body>
</html>

