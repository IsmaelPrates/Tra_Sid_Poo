<?php
require_once "TarefaDAO.php";

if ($_POST) {
    $tarefa = new Tarefa($_POST['tarefa'], $_POST['prioridade'], $_POST['prazo']);
    $dao = new TarefaDAO();
    $dao->cadastrar($tarefa);

    header("Location: listar.php");
    exit;
}
