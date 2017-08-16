<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['MATRICULA_PROF_ORIENTADOR'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    echo "<script>alert('Registro Não Autenticado!');document.location='../../index.php'</script>";
    exit;
}

require_once "../model/dao/Banco.php";

$tema = $_POST['tema'];
$result = $conn->querySelect("UPDATE projeto_tcc SET tema='$tema' WHERE matricula_professor= '" . $_SESSION['Matricula'] . "'");
?>