<div id="content">
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Usuário</label>
        <p><input type="text" name="usuario" id="usuario" placeholder="Usuário" class="form-control" /></p>

        <label>Senha</label>
        <p><input type="password" name="senha" id="senha" placeholder="************" class="form-control"></p>

        <p><input type="submit" name="Entrar" class="btn btn-primary btn-lg btn-block"></p>
        <input type="hidden" name="env" value="login">
    </form>
    <?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "tcc";

//Iniciando a conexão
    $conecta = mysqli_connect($host, $usuario, $senha, $banco) OR print(mysql_error());
    
    if (isset($_POST['env']) && $_POST['env'] == "login") {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if (empty($usuario) || empty($senha)) {
            echo "<code>Preencha todos os campos</code>";
        } else {
            $query = "SELECT *  FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
            $result = mysqli_query($conecta,$query);
            $busca = mysqli_num_rows($result);
            $linha = mysqli_fetch_assoc($result);

            if ($busca > 0) {
                $_SESSION['nome'] = $linha['nome'];
                $_SESSION['usuario'] = $linha['usuario'];
                echo '<meta http-equiv="Refresh" content="1; url=?pagina=usuarios">';
            } else {
                echo "<code>Usuário ou senha inválidos.</code>";
            }
        }
    }
    ?>
</div