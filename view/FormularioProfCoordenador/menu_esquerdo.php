<!doctype html>
<?php
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
?>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
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
                        <a href="inicioProfCoordenador.php">
                            <i class="pe-7s-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li>
                        <a href="grupoTCC.php">
                            <i class="pe-7s-study"></i>
                            <p>Grupos de TCC's</p>
                        </a>
                    </li>
                    <li>
                        <a href="alunosMatriculados.php">
                            <i class="pe-7s-users"></i>
                            <p>Turma de TCC 2017.1</p>
                        </a>
                    </li>
                    <li>
                        <a href="matricularAluno.php">
                            <i class="pe-7s-add-user"></i>
                            <p>Matricular Aluno</p>
                        </a>
                    </li>
                    <li>
                        <a href="calendario.php">
                            <i class="pe-7s-date"></i>
                            <p>Calendário de TCC</p>
                        </a>
                    </li>
                    <li>
                        <a href="xxxxxxxx.php">
                            <i class="pe-7s-attention"></i>
                            <p>Emitir Alerta</p>
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
    </body>
</html>


