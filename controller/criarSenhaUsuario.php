<?php

require_once("../model/Aluno.php");
require_once("../model/Professor.php");
require_once "../model/dao/Banco.php";

class UsuarioControler {

    private $cadastro;
    private $cadastro2;

    public function __construct() {
        $Funcao = $_POST['funcao'];

        if ($Funcao == 1) {
            $this->cadastro = new Aluno();
            $this->incluirAluno();
        } else if ($Funcao == 2) {
            $this->cadastro2 = new Professor();
            $this->incluirProfessor();
        }
    }

    private function incluirAluno() {
        $Funcao = $_POST['funcao'];

        $this->cadastro->setMatricula_Aluno($_POST['matricula']);
        $this->cadastro->setNome_Aluno($_POST['nome']);
        $this->cadastro->setEmail_Aluno($_POST['email']);
        $this->cadastro->setCurso_Aluno($_POST['curso']);
        $this->cadastro->setSenha_Aluno($_POST['senha']);
        $this->cadastro->setPeriodo_Aluno($_POST['periodo']);

        $result = $this->cadastro->incluir();

        echo "<script>alert('Registro Aluno incluído com sucesso!');
        document.location = '../index.php'</script>";
    }

    public function incluirProfessor() {
        $this->cadastro2->setMatricula_Professor($_POST['matricula']);
        $this->cadastro2->setNome_Professor($_POST['nome']);
        $this->cadastro2->setEmail_Professor($_POST['email']);
        $this->cadastro2->setCurso_Professor($_POST['curso']);
        $this->cadastro2->setSenha_Professor($_POST['senha']);
        $this->cadastro2->setFuncao_Professor($_POST['funcao']);

        $result = $this->cadastro2->incluir();

        echo "<script>alert('Registro Professor incluído com sucesso!');
        document.location = '../index.php'</script>";
    }

}

new UsuarioControler();
?>
