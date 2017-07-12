<?php

require_once("../model/Aluno.php");

class ProfessorControler {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new Aluno();
        $this->incluir();
    }

    private function incluir() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "tcc";
        $conn = new mysqli($host, $user, $pass, $banco);

        $this->cadastro->setMatricula_Aluno($_POST['matricula_aluno']);

        $sql = "select * FROM aluno WHERE matricula_aluno = '" . $_POST['matricula_aluno'] . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->cadastro->setNome_Aluno($row["nome_aluno"]);
                $this->cadastro->setEmail_Aluno($row["email_aluno"]);
                $this->cadastro->setCurso_Aluno($row["codCurso"]);
            }
        }

        $result = $this->cadastro->incluir();
        echo "<script>alert('Registro incluído com sucesso!');document.location='../view/FormularioCoordenadorCurso/inicioCoordenadorCurso.php'</script>";
    }

}

new ProfessorControler();
?>
