<?php

include "conexao.php";

$nome = $_POST["nome"];
$periodo = $_POST["periodo"];
$data = $_POST["data"];
$curso = $_POST["codCurso"];

$query = "INSERT INTO eventos (title, start, curso, periodo_evento) VALUES ('$nome', '$data', '$curso', '$periodo')";

$exec = $conexao->exec($query);

if ($exec) {
    echo "1";
} else {
    echo "0";
}
?>