<?php

include_once "../conexao.php";
session_start();
ob_start();
header("Location: ../index.php");
die();

?>