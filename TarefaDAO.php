<?php
require_once "Database.php";
require_once "Tarefa.php";

class TarefaDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function cadastrar(Tarefa $tarefa) {
        $sql = "INSERT INTO tarefas (tarefa, prioridade, prazo) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$tarefa->getTarefa(), $tarefa->getPrioridade(), $tarefa->getPrazo()]);
    }

    public function listar() {
        $sql = "SELECT * FROM tarefas";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tarefas WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar(Tarefa $tarefa) {
        $sql = "UPDATE tarefas SET tarefa = ?, prioridade = ?, prazo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $tarefa->getTarefa(),
            $tarefa->getPrioridade(),
            $tarefa->getPrazo(),
            $tarefa->getId()
        ]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM tarefas WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
