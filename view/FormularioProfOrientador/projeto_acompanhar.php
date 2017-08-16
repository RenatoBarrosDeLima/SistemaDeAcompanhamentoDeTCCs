<!doctype html>

<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Elaborar Projeto de TCC</title>

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
                                <div align="center"> <h4 class="title">Definir Tema de TCC</h4> 
                                </div>
                                <div class="content">
                                    <form class="form-signin" id="formulario" >

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Aluno(a)</label>
                                                    <input type="text" class="form-control" value="<?php echo "" . str_replace('%', ' ', $_POST['nome_Aluno']) ?>" disabled="">
                                                </div>
                                            </div>
                                        </div>

                                        <input  type="hidden" value ="<?php echo "" . $_SESSION['MATRICULA_PROF_ORIENTADOR']; ?>" required name="matricula">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tema</label>
                                                    <input type="text" class="form-control" placeholder="Digite aqui o tema do trabalho" required name="tema" autofocus="">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-fill pull-right">Salvar</button>
                                        <a href="meusProjetos.php"<button class="btn btn-danger btn-fill pull-left">Voltar</button></a>

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

