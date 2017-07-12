<?php include 'conn.php'; ?>
<!doctype html>


<html lang="pt-BR">


    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script src="jquery-2.1.1.min.js" type="text/javascript"></script>

        <title>Universidade Estadual do Piauí</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="../css/estilo.css" rel="stylesheet" />

        <script src="funcoes.js" type="text/javascript"></script>


    </head>

    <body>

        <div class="pad">
    <!-- <img class="imgBack" src="imagens/backgroud.png" alt="Logo" width="170" height="100">-->

            <div class="card card-containerProfessor">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" id="formulario" action= "../../controller/cadastrarSenhaProfessor.php" method="post">

                    <input type="text" id="inputNome" name="matricula" class="form-control" placeholder="Matricula" required  autofocus>
                    <input type="text" id="inputEndereco" name="nome" class="form-control" placeholder="Nome">
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email">
                    <input type="password" id="inputSenha" name="senha" class="form-control" placeholder="Senha">

                    <select id="CbCampus" type="text" id="soflow" name="curso" required class="form-control">
                        <option value="">Curso</option>
                        <?php
                        foreach ($pdo->query('SELECT codCurso, nome_curso FROM curso order by nome_curso') as $row) {
                            echo '<option value="' . $row['codCurso'] . '">' . $row['nome_curso'] . '</option>';
                        }
                        ?>			   
                    </select>

                    <br><br>

                    <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin" >Salvar</button>


                </form><!-- /form -->


                <a href='../../model/Logout.php' class="forgot-password">
                    Sair ?
                </a>


            </div><!-- /card-container -->
        </div>
    </body>

</html>
