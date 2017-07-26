<!doctype html>

<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Pagina InicialCoordenador de Curso</title>

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
                            <a href="http://www.pi.gov.br">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Governo do Estado</h4>
                                            <p class="category">Faça-nos uma visita</p>
                                        </div>
                                        <div class="content">
                                            <img id="chartPreferences" class="ct-chart ct-perfect-fifth" src="../imagens/governo.jpg" title="Governo do Estado do Piauí"/>
                                            <div class="footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://www.uespi.br">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">UESPI</h4>
                                            <p class="category">Faça-nos uma visita</p>
                                        </div>
                                        <div class="content">
                                            <!--<div id="chartHours" class="ct-chart"></div>-->
                                            <img id="chartPreferences" class="ct-chart ct-perfect-fifth" src="../imagens/uespi.jpg" title="Universidade Estadual do Piauí"/>
                                            <div class="footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="#">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">COMP_UESPI</h4>
                                            <p class="category">Faça-nos uma visita</p>
                                        </div>
                                        <div class="content">
                                            <!--<div id="chartHours" class="ct-chart"></div>-->
                                            <img id="chartPreferences" class="ct-chart ct-perfect-fifth" src="../imagens/site.jpg" title="Portal do Curso de Ciência da Computação - UESPI"/>
                                            <div class="footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <?php include './menu_rodape.php'; ?>

            </div>
        </div>
    </body>
</html>