<?php

require_once 'dao/Banco.php';

class Login extends Banco {

    public $matricula;
    public $senha;
    public $status;
    public $resultado;

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($mat) {
        $this->matricula = $mat;
    }

    public function getSenha() {
        return $this->matricula;
    }

    public function setSenha($sen) {
        $this->senha = $sen;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($stat) {
        $this->status = $stat;
    }

    public function verificaProfessor() {
        $this->sql = "SELECT matricula, senha, codCurso, nome, funcao FROM professor WHERE (matricula = '" . $this->matricula . "') AND (senha = '" . $this->senha . "')";
        $this->query = mysqli_query($this->conecta, $this->sql) or die(mysqli_error($this->conecta));
        $this->row = mysqli_num_rows($this->query);
        if ($this->row > 0) {
            //session_start();
            $this->resultado = mysqli_fetch_assoc($this->query);
            if (!isset($_SESSION))
                session_start();
            $_SESSION['funcao'] = $this->resultado['funcao'];

            if ($_SESSION['funcao'] == 0) {
                $_SESSION['MATRICULA_COORDENADOR_CURSO'] = $this->resultado['matricula'];
                $_SESSION['SENHA_COORDENADOR_CURSO'] = $this->resultado['senha'];
                $_SESSION['CURSO_COORDENADOR_CURSO'] = $this->resultado['codCurso'];
                $_SESSION['NOME_COORDENADOR_CURSO'] = $this->resultado['nome'];
                header("Location: ../view/FormularioCoordenadorCurso/inicioCoordenadorCurso.php");
                exit;
            } else if ($_SESSION['funcao'] == 1) {
                $_SESSION['MATRICULA_PROF_COORDENADOR'] = $this->resultado['matricula'];
                $_SESSION['SENHA_PROF_COORDENADOR'] = $this->resultado['senha'];
                $_SESSION['CURSO_PROF_COORDENADOR'] = $this->resultado['codCurso'];
                $_SESSION['NOME_PROF_COORDENADOR'] = $this->resultado['nome'];
                header("Location: ../view/FormularioProfCoordenador/inicioProfCoordenador.php");
                exit;
            } else if ($_SESSION['funcao'] == 2) {
                $_SESSION['MATRICULA_PROF_ORIENTADOR'] = $this->resultado['matricula'];
                $_SESSION['SENHA_PROF_ORIENTADOR'] = $this->resultado['senha'];
                $_SESSION['CURSO_PROF_ORIENTADOR'] = $this->resultado['codCurso'];
                $_SESSION['NOME_PROF_ORIENTADOR'] = $this->resultado['nome'];
                header("Location: ../view/FormularioProfOrientador/inicioProfOrientador.php");
                exit;
            }
        } else {
            $this->verificaAluno();
        }
    }

    public function verificaAluno() {
        $this->sql = "SELECT matricula, senha, codCurso, nome FROM aluno_tcc WHERE (matricula = '" . $this->matricula . "') AND (senha = '" . $this->senha . "')";
        $this->query = mysqli_query($this->conecta, $this->sql) or die(mysqli_error($this->conecta));
        $this->row = mysqli_num_rows($this->query);
        if ($this->row > 0) {
            //session_start();
            $this->resultado = mysqli_fetch_assoc($this->query);
            if (!isset($_SESSION))
                session_start();
            $_SESSION['MATRICULA_ALUNO'] = $this->resultado['matricula'];
            $_SESSION['SENHA_ALUNO'] = $this->resultado['senha'];
            $_SESSION['CURSO_ALUNO'] = $this->resultado['codCurso'];
            $_SESSION['NOME_ALUNO'] = $this->resultado['nome'];

            header("Location: ../view/FormularioAluno/inicioAluno.php");
            exit;
        } else {
            echo "<script>alert('Registro Não Autenticado!');document.location='../index.php'</script>";
        }
    }

}
