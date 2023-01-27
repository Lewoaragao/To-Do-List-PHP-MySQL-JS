<?php

include_once "../conexao.php";
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $flg_ativo = true;
}

$sql = "INSERT INTO t_usuario (dsc_usuario, dsc_senha, flg_ativo) VALUES ('$usuario', '$senha', '$flg_ativo')";

if ($conn->query($sql) == true) {
    $_SESSION['msg'] = "<p class='text-success text-center'>Usuário cadastrado com sucesso!</p>";
    header("Location: cadastro.php");
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->$error;
}

?>