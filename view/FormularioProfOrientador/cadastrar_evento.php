<?php

include "../FormularioProfCoordenador/conexao.php";

$nome = $_POST["nome"];
$periodo = $_POST["periodo"];
$data = $_POST["data"];
$curso = $_POST["codCurso"];
$prof = $_POST["professor"];

$query = "INSERT INTO eventos (title, start, curso, periodo_evento, professor) VALUES ('$nome', '$data', '$curso', '$periodo', '$prof')";

$exec = $conexao->exec($query);

if ($exec) {
    echo "1";
} else {
    echo "0";
}
?>