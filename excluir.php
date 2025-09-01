<?php
require_once "TarefaDAO.php";

$dao = new TarefaDAO();
$dao->excluir($_GET['id']);

header("Location: listar.php");
exit;
