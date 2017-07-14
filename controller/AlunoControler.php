<?php

require_once("../model/Aluno.php");
require_once "../model/dao/Banco.php";

class ProfessorControler {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new Aluno();
        $this->incluir();
    }

    private function incluir() {
        $conn = new Banco();
        $result = $conn->querySelect("select * FROM aluno_computacao WHERE matricula = '" . $_POST['matricula'] . "'");

        $this->cadastro->setMatricula_Aluno($_POST['matricula']);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->cadastro->setNome_Aluno($row["nome"]);
                $this->cadastro->setEmail_Aluno($row["email"]);
                $this->cadastro->setCurso_Aluno($row["codCurso"]);
            }
        }

        $result = $this->cadastro->incluir();
        echo "<script>alert('Registro incluído com sucesso!');
        document.location = '../view/FormularioProfCoordenador/inicioProfCoordenador.php'</script>";
    }

}

new ProfessorControler();
?>
