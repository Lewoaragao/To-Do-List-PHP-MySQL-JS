<?php

include_once "../conexao.php";
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $flgAtivo = true;
}

$sql = "SELECT * FROM t_usuario WHERE dsc_usuario = '$usuario' and dsc_senha = '$senha'";

if ($conn->query($sql) == true) {
    $result = $conn->query($sql);
    
    $usuario_data = mysqli_fetch_assoc($result);
    $_SESSION['id_usuario_logado'] = $usuario_data['id'];
    $_SESSION['dsc_usuario_logado'] = $usuario_data['dsc_usuario'];
    
    if(empty($usuario_data['id'])) {
        $_SESSION['msg'] = "<p class='text-danger text-center'>Usuário ou senha incorretos.</p>";
        header("Location: login.php");
        die();
    }
    
    $_SESSION['msg'] = "<p class='text-success text-center'>Usuário logado com sucesso!</p>";
    header("Location: ../tarefa/tarefas.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->$error;
}

?>