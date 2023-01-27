<?php

include_once "conexao.php";
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarefa = $_POST["tarefa"];
    $flgResolvida = false;
    $flgAtiva = false;
}

$sql = "INSERT INTO t_tarefa (dsc_tarefa, flg_resolvida, flg_ativa) VALUES('$tarefa', '$flgResolvida', '$flgAtiva');";

if ($conn->query($sql) === true) {
    $_SESSION['msg'] = "<p class='text-success text-center'>Tarefa adicionada com sucesso!</p>";
    header("Location: index.php");
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>