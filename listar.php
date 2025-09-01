<?php
require_once "TarefaDAO.php";

$dao = new TarefaDAO();
$tarefas = $dao->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Tarefas</title>
</head>
<body>

  <h2>Lista de Tarefas</h2>
  <table border="1" cellpadding="8">
    <tr>
      <th>ID</th>
      <th>Tarefa</th>
      <th>Prioridade</th>
      <th>Prazo</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($tarefas as $t): ?>
    <tr>
      <td><?= $t['id'] ?></td>
      <td><?= htmlspecialchars($t['tarefa']) ?></td>
      <td><?= $t['prioridade'] ?></td>
      <td><?= $t['prazo'] ?></td>
      <td>
        <a href="editar.php?id=<?= $t['id'] ?>">Editar</a> |
        <a href="excluir.php?id=<?= $t['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

  <br>
  <button onclick="window.location.href='index.html'">Voltar</button>

</body>
</html>
