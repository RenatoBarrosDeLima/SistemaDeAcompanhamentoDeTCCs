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

<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Cadastrar Turma</title>

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


        <div class="wrapper">
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
                                <i class="pe-7s-graph"></i>
                                <p>Inicio</p>
                            </a>
                        </li>

                        <li>
                            <a href="alunosMatriculados.php">
                                <i class="pe-7s-users"></i>
                                <p>Turma de TCC 2017.1</p>
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

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>

                                </li>
                                <li class="dropdown">

                                </li>
                                <li>

                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li>

                                    <a href="formEditarProfessor.php">
                                        <?php echo "" . $_SESSION['NOME_COORDENADOR_CURSO']; ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="formEditarProfessor.php">
                                        Conta
                                    </a>
                                </li>
                                <li class="dropdown">

                                    <a href="../../index.php">
                                        Sair
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">ALUNOS</h4>
                                    </div>
                                    <div class="content">
                                        <form class="form-signin" id="formulario" action= "../../controller/AlunoControler.php" method="post">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Matricula</th>
                                                        <th>Nome</th>
                                                        <th>email</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <?php
                                                        $host = "localhost";
                                                        $user = "root";
                                                        $pass = "";
                                                        $banco = "tcc";
                                                        $conn = new mysqli($host, $user, $pass, $banco);

                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        }

                                                        //$sql = "SELECT a.matricula_aluno, a.nome_aluno, b.nome_curso, a.email_aluno FROM aluno as A INNER JOIN curso as B on a.codCurso = b.codCurso WHERE b.codCurso = '" . $_SESSION['CURSO_COORDENADOR_CURSO'] . "'";
                                                        $sql = "SELECT * FROM aluno a WHERE a.matricula_aluno NOT IN (SELECT matricula_aluno FROM aluno_tcc) AND a.codCurso = '" . $_SESSION['CURSO_COORDENADOR_CURSO'] . "'";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo '<td>' . $row["matricula_aluno"] . '</td>';
                                                                echo '<td>' . $row["nome_aluno"] . '</td>';
                                                                echo '<td>' . $row["email_aluno"] . '</td>';
                                                                echo '<td> <button value=' . $row['matricula_aluno'] . ' 
                                                                name="matricula_aluno" type="submit" >Matricular</button> </td>';
                                                                echo '</tr>';
                                                            }
                                                        } else {
                                                            echo "";
                                                        }

                                                        $conn->close();
                                                        ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                                </form><!-- /form -->
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

</body>

</html>


