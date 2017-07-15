<?php

include "../FormularioProfCoordenador/conexao.php";

$nome = $_POST["nome"];
$data = $_POST["data"];
$curso = $_POST["codCurso"];

$query = "INSERT INTO eventos (title, start, curso) VALUES ('$nome', '$data', '$curso')";

$exec = $conexao->exec($query);

if ($exec) {
    echo "1";
} else {
    echo "0";
}
?>