<?php

require_once 'dao/Banco.php';

class Aluno extends Banco {

    private $matricula_aluno;
    private $nome_aluno;
    private $curso_aluno;
    private $email_aluno;
    private $senha_aluno;

    public function setMatricula_Aluno($matricula_aluno) {
        $this->matricula_aluno = $matricula_aluno;
    }

    public function getMatricula_Aluno() {
        return $this->matricula_aluno;
    }

    public function setNome_Aluno($nome_aluno) {
        $this->nome_aluno = $nome_aluno;
    }

    public function getNome_Aluno() {
        return $this->nome_aluno;
    }

    public function setCurso_Aluno($curso_aluno) {
        $this->curso_aluno = $curso_aluno;
    }

    public function getCurso_Aluno() {
        return $this->curso_aluno;
    }

    public function setEmail_Aluno($email_aluno) {
        $this->email_aluno = $email_aluno;
    }

    public function getEmail_Aluno() {
        return $this->email_aluno;
    }

    public function setSenha_Aluno($senha_aluno) {
        $this->senha_aluno = $senha_aluno;
    }

    public function getSenha_Aluno() {
        return $this->senha_aluno;
    }

    function incluir() {
        $this->tabela = "aluno_tcc";
        $this->campos = array("matricula_aluno", "nome_aluno", "email_aluno", "codCurso", "senha");
        $this->valores = array($this->getMatricula_Aluno(), $this->getNome_Aluno(), $this->getEmail_Aluno(), $this->getCurso_Aluno(), $this->getSenha_Aluno());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
