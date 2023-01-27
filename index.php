<?php

include_once "conexao.php";
session_start();
ob_start();

$sqlListar = "SELECT * FROM t_tarefa;";
$result = $conn->query($sqlListar);
$flex_center = "d-flex justify-content-center align-items-center";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="<?php $flex_center ?>">
        <div class="my-3 w-100">
            <h1 class="text-center">To Do List PHP</h1>
            <form action="adicionar.php" method="post" id="formAddTarefa" class="row g-3 my-3 w-50 mx-auto">
                <div class="input-group">
                    <input class="form-control" type="text" name="tarefa" placeholder="Descreva a tarefa..."
                        aria-label="Campo para descrever nova tarefa">
                    <button class="btn btn-outline-primary" type="submit">Adicionar</button>
                </div>
            </form>

            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>

            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th class="col text-center">ID</th>
                        <th class="col text-center">Tarefa</th>
                        <th class="col text-center">Realizada</th>
                        <th class="col text-center">Ativa</th>
                        <th class="col text-center" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($tarefa_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='text-center'>" . $tarefa_data['id'] . "</td>";
                        echo "<td>" . $tarefa_data['dsc_tarefa'] . "</td>";
                        echo $tarefa_data['flg_resolvida'] == 1 ? "<td class='text-center'>Sim</td>" : "<td class='text-center'>Não</td>";
                        echo $tarefa_data['flg_ativa'] == 1 ? "<td class='text-center'>Sim</td>" : "<td class='text-center'>Não</td>";
                        echo "<td class='text-center'><a href='editar.php?id=" . $tarefa_data['id'] . "' class='btn btn-primary'>Editar</a></td>";
                        echo "<td class='text-center'><a href='excluir.php?id=" . $tarefa_data['id'] . "' class='btn btn-danger'>Excluir</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

</body>

</html>