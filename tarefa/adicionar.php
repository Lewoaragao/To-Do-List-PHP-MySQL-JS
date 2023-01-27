<?php

include_once "../conexao.php";
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarefa = $_POST["tarefa"];
    $flg_resolvido = false;
    $flg_ativo = true;
    $id_usuario_logado = $_SESSION['id_usuario_logado'];
}

$sql = "INSERT INTO t_tarefa (dsc_tarefa, flg_resolvido, flg_ativo, id_usuario) VALUES('$tarefa', '$flg_resolvido', '$flg_ativo', '$id_usuario_logado')";

if ($conn->query($sql) === true) {
    $_SESSION['msg'] = "<p class='text-success text-center'>Tarefa adicionada com sucesso!</p>";
    header("Location: tarefas.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->$error;
}

?>