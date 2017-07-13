<?php

require_once 'dao/Banco.php';

class Aluno extends Banco {

    private $matricula;
    private $nome;
    private $curso_aluno;
    private $email;
    private $senha;

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

    function incluir() {
        $this->tabela = "aluno_tcc";
        $this->campos = array("matricula", "nome", "email", "codCurso", "senha");
        $this->valores = array($this->getMatricula_Aluno(), $this->getNome_Aluno(), $this->getEmail_Aluno(), $this->getCurso_Aluno(), $this->getSenha_Aluno());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
