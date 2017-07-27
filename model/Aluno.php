<?php

require_once 'dao/Banco.php';

class Aluno extends Banco {

    private $matricula;
    private $nome;
    private $email;
    private $curso_aluno;
    private $senha;
    private $periodo;

    public function setMatricula_Aluno($matricula) {
        $this->matricula = $matricula;
    }

    public function getMatricula_Aluno() {
        return $this->matricula;
    }

    public function setNome_Aluno($nome) {
        $this->nome = $nome;
    }

    public function getNome_Aluno() {
        return $this->nome;
    }

    public function setCurso_Aluno($curso_aluno) {
        $this->curso_aluno = $curso_aluno;
    }

    public function getCurso_Aluno() {
        return $this->curso_aluno;
    }

    public function setEmail_Aluno($email) {
        $this->email = $email;
    }

    public function getEmail_Aluno() {
        return $this->email;
    }

    public function setSenha_Aluno($senha) {
        $this->senha = $senha;
    }

    public function getSenha_Aluno() {
        return $this->senha;
    }

    public function setPeriodo_Aluno($periodo) {
        $this->periodo = $periodo;
    }

    public function getPeriodo_Aluno() {
        return $this->periodo;
    }

    function incluir() {
        $this->tabela = "aluno_computacao";
        $this->campos = array("matricula", "nome", "email", "codCurso", "senha", "periodo");
        $this->valores = array($this->getMatricula_Aluno(), $this->getNome_Aluno(), $this->getEmail_Aluno(), $this->getCurso_Aluno(), $this->getSenha_Aluno(), $this->getPeriodo_Aluno());
        $result = $this->inserirRegistro();

        return $result;
    }

    function incluir_Aluno_Tcc() {
        $this->tabela = "aluno_tcc";
        $this->campos = array("matricula", "nome", "email", "codCurso", "senha", "periodo");
        $this->valores = array($this->getMatricula_Aluno(), $this->getNome_Aluno(), $this->getEmail_Aluno(), $this->getCurso_Aluno(), $this->getSenha_Aluno(), $this->getPeriodo_Aluno());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
