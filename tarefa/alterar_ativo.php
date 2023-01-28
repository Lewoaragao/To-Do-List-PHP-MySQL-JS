<?php

include_once "../conexao.php";
session_start();
ob_start();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(empty($id)) {
    $_SESSION['msg'] = "<p class='text-danger'>Tarefa não encontrado!</pc>";
}

$sql = "SELECT * FROM t_tarefa WHERE ID = $id";

if ($conn->query($sql) == true) {
    $result = mysqli_fetch_assoc($conn->query($sql));
    
    if($result['flg_ativo'] == 1) {
        $sqlInativar = "UPDATE t_tarefa SET flg_ativo = false WHERE ID = $id";
        $conn->query($sqlInativar);
        $_SESSION['msg'] = "<p class='text-danger text-center'>Tarefa inativada.</pc>";
    } else {
        $sqlAtivar = "UPDATE t_tarefa SET flg_ativo = true WHERE ID = $id";
        $conn->query($sqlAtivar);
        $_SESSION['msg'] = "<p class='text-success text-center'>Tarefa ativada.</pc>";
    }

    header("Location: tarefas.php");
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->$error;
}

?>