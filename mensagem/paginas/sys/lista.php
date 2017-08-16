<?php
session_start();
include_once("../../settings/settings.php");
$id_de = $usuarioAtual;
$id_para = $_SESSION['id_para'];

$emotions = array(":angry:", ":angry1:", ":bored:", ":bored1:", ":bored2:", ":confused:", ":confused1:", ":crying:", ":crying1:", ":embarrassed:", ":emoticons:", ":happy:", ":happy1:", ":happy2:", ":happy3:", ":happy4:", ":ill:", ":inlove:", ":kissing:", ":mad:", ":nerd:", ":ninja:", ":quiet:", ":sad:", ":secret:", ":smart:", ":smyle:", ":smiling:", ":surprised:", ":surprised1:", ":suspicious:", ":suspiciou1:", ":tongueout:", ":tongueout1:", ":unhappy:", ":wink:");
$images = array("<img src=\"imagens/emoticons/angry.png\" class=\"emoticons-size\" title=\":angry:\">",
    "<img src=\"imagens/emoticons/angry-1.png\" class=\"emoticons-size\" title=\":angry1:\">",
    "<img src=\"imagens/emoticons/bored.png\" class=\"emoticons-size\" title=\":bored:\">",
    "<img src=\"imagens/emoticons/bored-1.png\" class=\"emoticons-size\" title=\":bored1:\">",
    "<img src=\"imagens/emoticons/bored-2.png\" class=\"emoticons-size\" title=\":bored2:\">",
    "<img src=\"imagens/emoticons/confused.png\" class=\"emoticons-size\" title=\":confused:\">",
    "<img src=\"imagens/emoticons/confused-1.png\" class=\"emoticons-size\" title=\":confused1:\">",
    "<img src=\"imagens/emoticons/crying.png\" class=\"emoticons-size\" title=\":crying:\">",
    "<img src=\"imagens/emoticons/crying-1.png\" class=\"emoticons-size\" title=\":crying1:\">",
    "<img src=\"imagens/emoticons/embarrassed.png\" class=\"emoticons-size\" title=\":embarrassed:\">",
    "<img src=\"imagens/emoticons/emoticons.png\" class=\"emoticons-size\" title=\":emoticons:\">",
    "<img src=\"imagens/emoticons/happy.png\" class=\"emoticons-size\" title=\":happy:\">",
    "<img src=\"imagens/emoticons/happy-1.png\" class=\"emoticons-size\" title=\":happy1:\">",
    "<img src=\"imagens/emoticons/happy-2.png\" class=\"emoticons-size\" title=\":happy2:\">",
    "<img src=\"imagens/emoticons/happy-3.png\" class=\"emoticons-size\" title=\":happy3:\">",
    "<img src=\"imagens/emoticons/happy-4.png\" class=\"emoticons-size\" title=\":happy4:\">",
    "<img src=\"imagens/emoticons/ill.png\" class=\"emoticons-size\" title=\":ill:\">",
    "<img src=\"imagens/emoticons/in-love.png\" class=\"emoticons-size\" title=\":inlove:\">",
    "<img src=\"imagens/emoticons/kissing.png\" class=\"emoticons-size\" title=\":kissing:\">",
    "<img src=\"imagens/emoticons/mad.png\" class=\"emoticons-size\" title=\":mad:\">",
    "<img src=\"imagens/emoticons/nerd.png\" class=\"emoticons-size\" title=\":nerd:\">",
    "<img src=\"imagens/emoticons/ninja.png\" class=\"emoticons-size\" title=\":minja:\">",
    "<img src=\"imagens/emoticons/quiet.png\" class=\"emoticons-size\" title=\":quiet:\">",
    "<img src=\"imagens/emoticons/sad.png\" class=\"emoticons-size\" title=\":sad:\">",
    "<img src=\"imagens/emoticons/secret.png\" class=\"emoticons-size\" title=\":secret:\">",
    "<img src=\"imagens/emoticons/smart.png\" class=\"emoticons-size\" title=\":smart:\">",
    "<img src=\"imagens/emoticons/smile.png\" class=\"emoticons-size\" title=\":smile:\">",
    "<img src=\"imagens/emoticons/smiling.png\" class=\"emoticons-size\" title=\":smiling:\">",
    "<img src=\"imagens/emoticons/surprised.png\" class=\"emoticons-size\" title=\":surprised:\">",
    "<img src=\"imagens/emoticons/surprised-1.png\" class=\"emoticons-size\" title=\":surprised1:\">",
    "<img src=\"imagens/emoticons/suspicious.png\" class=\"emoticons-size\" title=\":suspicious:\">",
    "<img src=\"imagens/emoticons/suspicious-1.png\" class=\"emoticons-size\" title=\":suspicious1:\">",
    "<img src=\"imagens/emoticons/tongue-out.png\" class=\"emoticons-size\" title=\":tongueout:\">",
    "<img src=\"imagens/emoticons/tongue-out-1.png\" class=\"emoticons-size\" title=\":tongueout1:\">",
    "<img src=\"imagens/emoticons/unhappy.png\" class=\"emoticons-size\" title=\":unhappy:\">",
    "<img src=\"imagens/emoticons/wink.png\" class=\"emoticons-size\" title=\":wink:\">");

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "tcc";

//Iniciando a conexão
$conecta = mysqli_connect($host, $usuario, $senha, $banco) OR print(mysql_error());

$sql = "SELECT * FROM (SELECT * FROM mensagens WHERE (id_de = '$id_de' AND id_para = '$id_para') OR (id_de = '$id_para' AND id_para = '$id_de') ORDER BY id DESC LIMIT 10) sub ORDER BY id ASC";

$resultado = mysqli_query($conecta, $sql);
$conta = mysqli_num_rows($resultado);

if ($conta <= 0) {
    echo "<code>A conversa não vai se inicair sozinha... porque não começa dizendo um OI?</code>";
} else {
    while ($row = mysqli_fetch_array($resultado)) {
        $row['mensagem'] = str_replace($emotions, $images, $row['mensagem']);
        ?>


        <?php if ($row['id_de'] == $id_de) { ?>
            <div align="right"><p class="chat-i"><?php echo $row['mensagem']; ?></p></div>
            <?php
        } else if ($row['id_de'] != $id_de) {
            ?>
            <div align="left"><p class="chat-you"><?php echo $row['mensagem']; ?></p></div>
            <?php
        }
    }
}
?>