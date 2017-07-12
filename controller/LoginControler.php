<?php

require_once("../model/Login.php");

class LoginControler {

    private $login;

    public function __construct() {
        $this->login = new Login();

        $this->teste();
    }

    public function teste() {

        $this->login->setMatricula($_POST['mat']);
        $this->login->setSenha($_POST['sen']);

        $result = $this->login->verificaProfessor();

        $this->login->verificaProfessor();

        // echo "<script>alert('Autenticado Com Sucesso!');document.location='../view/formProfessor.php'</script>";
    }

}

new LoginControler();
?>
