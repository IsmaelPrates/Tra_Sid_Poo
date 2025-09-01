<?php
class Tarefa {
    private $id;
    private $tarefa;
    private $prioridade;
    private $prazo;

    public function __construct($tarefa, $prioridade, $prazo, $id = null) {
        $this->id = $id;
        $this->tarefa = $tarefa;
        $this->prioridade = $prioridade;
        $this->prazo = $prazo;
    }

    public function getId() {
        return $this->id;
    }
    public function getTarefa() {
        return $this->tarefa;
    }
    public function getPrioridade() {
        return $this->prioridade;
    }
    public function getPrazo() {
        return $this->prazo;
    }
}
