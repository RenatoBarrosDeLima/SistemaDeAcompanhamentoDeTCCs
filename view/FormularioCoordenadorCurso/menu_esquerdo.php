<!doctype html>
<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['MATRICULA_COORDENADOR_CURSO'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    echo "<script>alert('Registro Não Autenticado!');document.location='../../index.php'</script>";
    exit;
}
?>

<div class="sidebar" data-color="azure" data-image="../imagens/logo.png">
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.uespi.br/site" target="_blank" class="simple-text">
                Site Da Instituição
            </a>
        </div>
        <ul class="nav">
            <li>
                <a href="inicioCoordenadorCurso.php">
                    <i class="pe-7s-home"></i>
                    <p>Inicio</p>
                </a>
            </li>
            <li>
                <a href="alunosMatriculados.php">
                    <i class="pe-7s-users"></i>
                    <p>Turma de TCC 2017.1</p>
                </a>
            </li>
            <li>
                <a href="calendario.php">
                    <i class="pe-7s-date"></i>
                    <p>Calendário de TCC</p>
                </a>
            </li>
            <li class="active-pro">
                <a href="http://www.uespi.br/site/" target="_blank" class="simple-text">
                    <i class="pe-7s-rocket"></i>
                    <p>Site Da Instituição</p>
                </a>
            </li>
        </ul>
    </div>
</div>
