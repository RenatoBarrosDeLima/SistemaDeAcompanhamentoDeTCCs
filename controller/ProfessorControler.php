<?php

require_once("../model/Professor.php");
require_once "../model/dao/Banco.php";

class ProfessorControler {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new Professor();
        $this->incluir();
    }

    private function incluir() {
        $conn = new Banco();
        $result = $conn->querySelect("select * FROM professor WHERE matricula = '" . $_POST['matricula'] . "'");
        $this->cadastro->setMatricula_Professor($_POST['matricula']);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->cadastro->setNome_Professor($row["nome"]);
                $this->cadastro->setEmail_Professor($row["email"]);
                $this->cadastro->setCurso_Professor($row["codCurso"]);
                $this->cadastro->setSenha_Professor($row["senha"]);
                $this->cadastro->setFuncao_Professor($row["funcao"]);
            }
        }
        $result = $this->cadastro->incluir_Professor_Tcc();
        echo "<script>alert('Registro incluído com sucesso!');
        document.location = '../view/FormularioProfCoordenador/inicioProfCoordenador.php'</script>";
    }

}

new ProfessorControler();
?>
