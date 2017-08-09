<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Universidade Estadual do Piauí</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="view/css/estilo.css" rel="stylesheet" />
    </head>
    <body>
        <div class="pad">
            <div class="card card-container">
                <h5 class="title">SISTEMA DE ACOMPANHAMENTO DE TCCS - SA_TCC</h5>
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="view/imagens/logo.png" />
                <p id="profile-name" class="profile-name-card"></p>

                <form class="form-signin" action="controller/LoginControler.php" method="post">

                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="text" id="inputMatricula" class="form-control" name="mat" placeholder="Matricula" required autofocus>
                    <input type="password" id="inputSenha" class="form-control" name="sen" placeholder="Senha" required>
                    <br>

                    <button class="btn btn-signin btn-signin" type="submit">Entrar</button>

                </form>
                <div align="center"> <p>Não tem Acesso? Cadastre uma Senha abaixo!</p>
                    <a href='view/cadastrarSenha.php' class="forgot-password">
                        <div align="center">Cadastrar Uma Senha</div>
                    </a>

                    <a href="#" class="forgot-password">
                        <div align="center"> Recuperar senha</div>
                    </a>
                </div>
            </div>
        </div>
    </body>
    <?php
    session_start();
    session_destroy();
    exit;
    ?>
</html>


