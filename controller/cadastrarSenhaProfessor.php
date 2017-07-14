<?php

require_once "../model/dao/Banco.php";

class AtualizarProfessor {

    public function __construct() {
        $this->editar();
    }

    private function editar() {
        $conn = new Banco();
        $result = $conn->querySelect("select * FROM professor WHERE matricula = '" . $_POST['matricula'] . "'");

        if ($result->num_rows == 0) {
            echo "<script>alert('Matricula Não autorizada à Acessar o Sistema. Entre em Contato com o coordenador do Curso!');document.location='../index.php'</script>";
        } else {

            $testeMatricula = $_POST['matricula'];
            $testeNome = $_POST['nome'];
            $testeEmail = $_POST['email'];
            $testeCurso = $_POST['curso'];
            $criaSenha = $_POST['senha'];

            $resultTestDados = $conn->querySelect("select * FROM professor WHERE nome = '" . $testeNome . "' and email = '" . $testeEmail . "' and codCurso = '" . $testeCurso . "'");

            if ($resultTestDados->num_rows == 0) {
                echo "<script>alert(' Um ou outro Dados Não Confere Com os Dados da Matricula. Tente de Novo ou Entre em Contato com o coordenador do Curso!');document.location='../index.php'</script>";
            } else {

                $resultUpdate = $conn->querySelect("update professor set senha = '" . $criaSenha . "' where matricula = '" . $testeMatricula . "'");

                echo "<script>alert('Senha Criada com sucesso. Agora digite matricula e Senha para ter acesso ao Sistema!');document.location='../index.php'</script>";
            }
        }
    }

}

new AtualizarProfessor();
?>
