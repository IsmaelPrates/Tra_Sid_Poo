<?php
require_once "TarefaDAO.php";

$dao = new TarefaDAO();

if ($_POST) {
    $tarefa = new Tarefa($_POST['tarefa'], $_POST['prioridade'], $_POST['prazo'], $_POST['id']);
    $dao->editar($tarefa);
    header("Location: listar.php");
    exit;
}

$t = $dao->buscarPorId($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Tarefa</title>
</head>
<body>

  <h2>Editar Tarefa</h2>
  <form method="post">
    <input type="hidden" name="id" value="<?= $t['id'] ?>">

    Tarefa: <input type="text" name="tarefa" value="<?= htmlspecialchars($t['tarefa']) ?>" required><br><br>

    Prioridade:
    <select name="prioridade">
      <option value="alta" <?= $t['prioridade']=='alta'?'selected':'' ?>>Alta</option>
      <option value="media" <?= $t['prioridade']=='media'?'selected':'' ?>>Média</option>
      <option value="baixa" <?= $t['prioridade']=='baixa'?'selected':'' ?>>Baixa</option>
    </select><br><br>

    Prazo: <input type="date" name="prazo" value="<?= $t['prazo'] ?>" required><br><br>

    <button type="submit">Salvar</button>
  </form>

  <br>
  <button onclick="window.location.href='listar.php'">Cancelar</button>

</body>
</html>
