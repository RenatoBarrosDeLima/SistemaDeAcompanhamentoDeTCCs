<?php

require_once("../model/Projeto.php");

class ProjetoControler {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new Projeto();
        $this->incluirProjeto();
    }

    private function incluirProjeto() {

        $this->cadastro->setAluno_Projeto($_POST['matricula_aluno']);
        $this->cadastro->setProfessor_Projeto($_POST['matricula_professor']);

        $result = $this->cadastro->incluir();

        echo "<script>alert('Projeto Criado com sucesso!');
        document.location = '../view/FormularioProfCoordenador/projetosTCC.php'</script>";
    }

}

new ProjetoControler;
?>
