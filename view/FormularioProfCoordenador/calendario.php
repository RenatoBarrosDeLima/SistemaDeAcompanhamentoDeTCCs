<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Calendário de TCC</title>

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
                <div class="content" >
                    <?php
                    include './menu_calendario.php';
                    ?>
                </div>
                <div class="container-fluid">
                    <div class="col-md-4">
                        <form id="novo_evento" action="" method="post">
                            Nome do Evento: <input type="text" name="nome" class="form-control" placeholder="Nome do Evento" required/>            
                            Data do Evento: <input type="date" name="data" class="form-control" required/>  
                            <input type="hidden" name="codCurso" value="<?php echo $_SESSION['CURSO_PROF_COORDENADOR']; ?>" required/>
                            <br>
                            <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin"> Salvar novo evento </button>
                        </form>
                    </div>
                </div>
                <?php include './menu_rodape.php'; ?>
            </div>
        </div>
    </body>
</html>


