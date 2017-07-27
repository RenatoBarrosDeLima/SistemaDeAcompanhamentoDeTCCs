<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Turma de TCC 2017.1</title>

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
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">TURMAS DE TCCs</h4>
                                    </div>
                                    <div class="content">
                                        <form class="form-signin" id="formulario" action= "turma_Participantes.php" method="post">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Periodo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        include '../../model/dao/Banco.php';

                                                        $conn = new Banco();
                                                        //$result = $conn->querySelect("SELECT a.matricula, a.nome, b.nome_curso, a.email FROM aluno_tcc as A INNER JOIN curso as B on a.codCurso = b.codCurso WHERE b.codCurso = '" . $_SESSION['CURSO_PROF_COORDENADOR'] . "'");
                                                        $result = $conn->querySelect("SELECT DISTINCT periodo FROM aluno_tcc");


                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo '<td>' . $row["periodo"] . '</td>';
                                                                echo '<td> <button value=' . $row['periodo'] . ' 
                                                                name="periodo" type="submit" >Visualizar</button> </td>';
                                                                echo '</tr>';
                                                            }
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
                <?php include './menu_rodape.php'; ?>
            </div>
        </div>
    </body>
</html>


