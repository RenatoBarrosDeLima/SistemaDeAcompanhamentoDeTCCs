<!doctype html>
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
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Meus Projetos por Alunos</h4>
                                    </div>
                                    <div class="content">
                                        <form class="form-signin" id="formulario" action= "projeto_acompanhar.php" method="post">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Matricula - Aluno</th>
                                                        <th>Nome - Aluno</th>
                                                        <th>Email - Aluno</th>
                                                        <th>Período - Aluno</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include '../../model/dao/Banco.php';

                                                    $conn = new Banco();
                                                    $result = $conn->querySelect("SELECT al.matricula,  al.nome_Aluno, al.email, al.periodo FROM aluno_tcc al INNER JOIN projeto_tcc pj ON (al.matricula = pj.matricula_aluno) INNER JOIN professor_tcc pf ON (pf.matricula = pj.matricula_professor) WHERE al.codCurso = '" . $_SESSION['CURSO_PROF_ORIENTADOR'] . "' and al.periodo = '" . $_POST['periodo'] . "' AND pj.matricula_professor = '" . $_SESSION['MATRICULA_PROF_ORIENTADOR'] . "'");

                                                    //SELECT  pj.matricula_aluno,  al.nome_Aluno, pj.matricula_professor, pf.nome FROM aluno_tcc al INNER JOIN projeto_tcc pj ON (al.matricula = pj.matricula_aluno) INNER JOIN professor_tcc pf ON (pf.matricula = pj.matricula_professor) WHERE al.codCurso = 1 and al.periodo = 2017.1

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<td>' . $row["matricula"] . '</td>';
                                                            echo '<td>' . $row["nome_Aluno"] . '</td>';
                                                            echo '<td>' . $row["email"] . '</td>';
                                                            echo '<td>' . $row["periodo"] . '</td>';
                                                            echo '<td> <button class="btn btn-group btn-fill" value=' . str_replace(' ', '%', $row['nome_Aluno'])  . '  
                                                                name="nome_Aluno" type="submit" >Visualizar</button> </td>';
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


