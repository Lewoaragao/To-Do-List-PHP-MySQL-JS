<?php

// DESENVOLVIMENTO
$hostname = 'localhost';
$database = 'test'; 
$db_user = 'root'; 
$db_pass = ''; 

// PRODUÇÃO
// $hostname = 'localhost';
// $database = 'u882876507_to_do_list_php'; 
// $db_user = 'u882876507_root'; 
// $db_pass = 'Senha@teste1'; 

$conn = mysqli_connect("$hostname" , "$db_user" , "$db_pass", "$database");

if (!$conn) {
    die("Não foi possível se conectar ao banco de dados.");
}

?>
