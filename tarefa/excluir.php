<?php

include_once "../conexao.php";
session_start();
ob_start();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM t_tarefa WHERE ID = $id";

if(empty($id)) {
    $_SESSION['msg'] = "<p class='text-danger'>Tarefa não encontrado!</pc>";
}

if ($conn->query($sql) == true) {
    $_SESSION['msg'] = "<p class='text-danger text-center'>Tarefa excluída!</pc>";
    header("Location: tarefas.php");
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->$error;
}

?>