<!doctype html>

<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Criar Novo Projeto de TCC</title>

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
                <div class="content" >
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <div align="center"> <h4 class="title">Criar novo projeto de TCC</h4> 
                                </div>
                                <div class="content">
                                    <form class="form-signin" id="formulario" action= "../../controller/projetoControler.php" method="post">

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Aluno</label>
                                                    <select class="form-control" placeholder="Aluno" name="matricula_aluno" required >
                                                        <option value="">Aluno</option>

                                                        <?php
                                                        include '../../model/dao/Banco.php';
                                                        $conn = new Banco();
                                                        foreach ($conn->querySelect("SELECT * FROM aluno_tcc a WHERE a.matricula NOT IN (SELECT matricula_aluno FROM projeto_tcc) AND a.codCurso = '" . $_SESSION['CURSO_PROF_COORDENADOR'] . "'") as $row) {
                                                            echo '<option value="' . $row['matricula'] . '">' . $row['nome_Aluno'] . '</option>';
                                                        }
                                                        $conn->disconnect();
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Professor Orientador</label>
                                                    <select class="form-control" placeholder="Aluno" name="matricula_professor" required >
                                                        <option value="">Professor</option>

                                                        <?php
                                                        $conn = new Banco();
                                                        foreach ($conn->querySelect("SELECT * FROM professor_tcc where funcao = 2 AND codCurso = '" . $_SESSION['CURSO_PROF_COORDENADOR'] . "'") as $row) {
                                                            echo '<option value="' . $row['matricula'] . '">' . $row['nome'] . '</option>';
                                                        }
                                                        $conn->disconnect();
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-fill pull-right">Salvar</button>
                                        <a href="../../index.php"<button class="btn btn-danger btn-fill pull-left">Sair</button></a>

                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'menu_rodape.php'; ?>
            </div>
        </div>
    </body>
</html>

