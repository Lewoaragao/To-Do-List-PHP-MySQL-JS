<?php

include_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarefa = $_POST["tarefa"];
    $flgRealizada = false;
    $flgAtivo = false;
}

$sql = "INSERT INTO to_do_list_php (dsc_tarefa, flg_realizada, flg_ativo) VALUES('$tarefa', '$flgRealizada', '$flgAtivo');";

if ($conn-> query($sql) === true) {
    $sqlListar = "SELECT * FROM to_do_list_php;";
    $conn->query($sqlListar);
    echo "Tarefa adicionada com sucesso!";
} else {
    echo "Error: " . $sql . "<br>" . $conn -> error;
}

?>