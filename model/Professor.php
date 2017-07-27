<?php

require_once 'dao/Banco.php';

class Professor extends Banco {

    private $matricula;
    private $nome;
    private $email;
    private $curso;
    private $senha;
    private $funcao;

    public function setMatricula_Professor($matricula) {
        $this->matricula = $matricula;
    }

    public function getMatricula_Professor() {
        return $this->matricula;
    }

    public function setNome_Professor($nome) {
        $this->nome = $nome;
    }

    public function getNome_Professor() {
        return $this->nome;
    }

    public function setCurso_Professor($curso) {
        $this->curso = $curso;
    }

    public function getCurso_Professor() {
        return $this->curso;
    }

    public function setEmail_Professor($email) {
        $this->email = $email;
    }

    public function getEmail_Professor() {
        return $this->email;
    }

    public function setSenha_Professor($senha) {
        $this->senha = $senha;
    }

    public function getSenha_Professor() {
        return $this->senha;
    }

    public function setFuncao_Professor($funcao) {
        $this->funcao = $funcao;
    }

    public function getFuncao_Professor() {
        return $this->funcao;
    }

    function incluir() {
        $this->tabela = "professor";
        $this->campos = array("matricula", "nome", "email", "funcao", "senha", "codCurso");
        $this->valores = array($this->getMatricula_Professor(), $this->getNome_Professor(), $this->getEmail_Professor(), $this->getFuncao_Professor(), $this->getSenha_Professor(), $this->getCurso_Professor());
        $result = $this->inserirRegistro();

        return $result;
    }

    function incluir_Professor_Tcc() {
        $this->tabela = "professor_tcc";
        $this->campos = array("matricula", "nome", "email", "codCurso", "senha", "funcao");
        $this->valores = array($this->getMatricula_Professor(), $this->getNome_Professor(), $this->getEmail_Professor(), $this->getCurso_Professor(), $this->getSenha_Professor(), $this->getFuncao_Professor());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
