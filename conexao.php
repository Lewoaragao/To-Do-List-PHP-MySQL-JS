<?php

$hostname = 'localhost';
$database = 'teste'; 
$db_user = 'root'; 
$db_pass = ''; 

$conn = mysqli_connect("$hostname" , "$db_user" , "$db_pass", "$database");;

if (!$conn) {
    die("Não foi possível se conectar ao banco de dados.");
}

?>