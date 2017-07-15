<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Matricular Alunos em TCC</title>

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
            <?php
            include 'menu_esquerdo.php';
            ?>

            <div class="main-panel">
                <?php
                include 'menu_superior.php';
                ?>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">ALUNOS DO CURSO DE CIÊNCIA DA COMPUTAÇÃO</h4>
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
                                                    <?php
                                                    include '../../model/dao/Banco.php';

                                                    $conn = new Banco();
                                                    $result = $conn->querySelect("SELECT * FROM aluno_computacao a WHERE a.matricula NOT IN (SELECT matricula FROM aluno_tcc) AND a.codCurso = '" . $_SESSION['CURSO_PROF_COORDENADOR'] . "'");

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<td>' . $row["matricula"] . '</td>';
                                                            echo '<td>' . $row["nome"] . '</td>';
                                                            echo '<td>' . $row["email"] . '</td>';
                                                            echo '<td> <button value=' . $row['matricula'] . ' 
                                                                name="matricula" type="submit" >Matricular</button> </td>';
                                                            echo '</tr>';
                                                        }
                                                    } else {
                                                        echo "";
                                                    }
                                                    $conn->disconnect();
                                                    ?>
                                                </tbody>
                                            </table>
                                        </form>
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


