<?php

class AtualizarAluno {

    public function __construct() {
        $this->editar();
    }

    private function editar() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "tcc";
        $conn = new mysqli($host, $user, $pass, $banco);

        $sqlTesteMatricula = "select * FROM aluno_tcc WHERE matricula = '" . $_POST['matricula'] . "'";
        $resultTest = $conn->query($sqlTesteMatricula);

        if ($resultTest->num_rows == 0) {
            echo "<script>alert('Matricula Não autorizada à Acessar o Sistema. Entre em Contato com o seu coordenador!');document.location='../index.php'</script>";
        } else {

            $testeMatricula = $_POST['matricula'];
            $testeNome = $_POST['nome'];
            $testeEmail = $_POST['email'];
            $testeCurso = $_POST['curso'];
            $criaSenha = $_POST['senha'];

            $sqlTesteDados = "select * FROM aluno_tcc WHERE nome = '" . $testeNome . "' and email = '" . $testeEmail . "' and codCurso = '" . $testeCurso . "' ";
            $resultTestDados = $conn->query($sqlTesteDados);

            if ($resultTestDados->num_rows == 0) {
                echo "<script>alert(' Um ou outro Dados Não Confere Com os Dados da Matricula. Tente de Novo ou Entre em Contato com o seu coordenador!');document.location='../index.php'</script>";
            } else {

                $sqlAtualizaSenha = "update aluno_tcc set senha = '" . $criaSenha . "' where matricula = '" . $testeMatricula . "' ";
                $resultUpdate = $conn->query($sqlAtualizaSenha);
                echo "<script>alert('Senha Criada com sucesso. Agora digite matricula e Senha para ter acesso ao Sistema!');document.location='../index.php'</script>";
            }
        }
    }

}

new AtualizarAluno();
?>
