<?php
//Conectando ao banco de dados
include "conexao.php";

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['MATRICULA_PROF_COORDENADOR'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    echo "<script>alert('Registro Não Autenticado!');document.location='../../index.php'</script>";
    exit;
}

$consulta = $conexao->query("SELECT * FROM eventos where curso = '" . $_SESSION['CURSO_PROF_COORDENADOR'] . "'");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //echo "Nome: {$linha['nome']} - E-mail: {$linha['email']}<br />";
    $vetor[] = $linha;
}
//Passando vetor em forma de json
echo json_encode($vetor);
?>