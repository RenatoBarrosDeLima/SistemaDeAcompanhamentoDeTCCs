<?php

require_once 'dao/Banco.php';

class Projeto extends Banco {

    private $id_projeto;
    private $aluno;
    private $professor;
    private $tema_projeto;

    public function setId_Projeto($id) {
        $this->id_projeto = $id;
    }

    public function getId_Projeto() {
        return $this->id_projeto;
    }

    public function setAluno_Projeto($matAluno) {
        $this->aluno = $matAluno;
    }

    public function getAluno_Projeto() {
        return $this->aluno;
    }

    public function setProfessor_Projeto($matProfessor) {
        $this->professor = $matProfessor;
    }

    public function getProfessor_Projeto() {
        return $this->professor;
    }

    public function setTema_Projeto($tema) {
        $this->tema_projeto = $tema;
    }

    public function getTema_Projeto() {
        return $this->tema_projeto;
    }

    function incluir() {
        $this->tabela = "projeto_tcc";
        $this->campos = array("matricula_aluno", "matricula_professor", "tema");
        $this->valores = array($this->getAluno_Projeto(), $this->getProfessor_Projeto(), $this->getTema_Projeto());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
