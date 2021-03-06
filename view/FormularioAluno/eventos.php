<?php
//Conectando ao banco de dados
include "../FormularioProfCoordenador/conexao.php";

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['MATRICULA_ALUNO'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    echo "<script>alert('Registro Não Autenticado!');document.location='../../index.php'</script>";
    exit;
}

$consulta = $conexao->query("SELECT * FROM eventos ev INNER JOIN projeto_tcc pj ON (ev.professor = pj.matricula_professor OR ev.professor = 0) INNER JOIN aluno_tcc al ON ( al.matricula = pj.matricula_aluno) WHERE al.matricula = '" . $_SESSION['MATRICULA_ALUNO'] . "' AND ev.periodo_evento = '" . $_SESSION['PERIODO_ALUNO'] . "'");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //echo "Nome: {$linha['nome']} - E-mail: {$linha['email']}<br />";
    $vetor[] = $linha;
}
//Passando vetor em forma de json
echo json_encode($vetor);
?>