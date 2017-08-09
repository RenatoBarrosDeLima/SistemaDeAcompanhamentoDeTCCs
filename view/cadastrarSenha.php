<!doctype html>

<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Criar Conta</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="./assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="./assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="./assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="./assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

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
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <div align="center"> <h4 class="title">Cadastro para a Disciplina de TCC</h4> 

                                </div>
                                <div class="content">
                                    <form class="form-signin" id="formulario" action= "../controller/criarSenhaUsuario.php" method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Matricula</label>
                                                    <input type="text" class="form-control" placeholder="Matrícula" required  autofocus name="matricula">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" class="form-control" placeholder="Nome" required name="nome">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Curso</label>
                                                    <select class="form-control" placeholder="Escolha o seu Curso" name="curso" required >
                                                        <option value="">Escolha o Seu Curso</option>

                                                        <?php
                                                        include '../model/dao/Banco.php';
                                                        $conn = new Banco();
                                                        foreach ($conn->querySelect('SELECT codCurso, nome_curso FROM curso order by nome_curso') as $row) {
                                                            echo '<option value="' . $row['codCurso'] . '">' . $row['nome_curso'] . '</option>';
                                                        }
                                                        $conn->disconnect();
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Perfil de Usuário</label>
                                                    <select class="form-control" placeholder="Escolha o seu Curso" name="funcao" required >
                                                        <option value="">Escolha o Perfil de Usuário</option>
                                                        <option value="1">ALUNO</option>'; 
                                                        <option value="2">PROFESSOR ORIENTADOR</option>'; 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Período Atual</label>
                                                    <input type="text" class="form-control" placeholder="Ex: 2017.1" required name="periodo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Senha</label>
                                                    <input type="password" class="form-control" placeholder="Informe a Senha Desejada" required name="senha">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirmação de Senha</label>
                                                    <input type="password" class="form-control" placeholder="Repita Novamente" required name="confirmacao_senha">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-fill pull-right">Salvar</button>
                                        <a href="../index.php"<button class="btn btn-toolbar btn-fill pull-left">Voltar</button></a>

                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include './FormularioAluno/menu_rodape.php'; ?>
            </div>
        </div>
    </body>
</html>