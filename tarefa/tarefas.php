<?php

include_once "../conexao.php";
session_start();
ob_start();

$id_usuario_logado = $_SESSION['id_usuario_logado'];
$dsc_usuario_logado = $_SESSION['dsc_usuario_logado'];

$sqlListar = "SELECT * FROM t_tarefa WHERE id_usuario = '$id_usuario_logado';";
$result = $conn->query($sqlListar);

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
    <div class="my-3 col-md-6 mx-auto">
        <?php
        if (isset($_SESSION['dsc_usuario_logado'])) {
            echo "<div class='my-3 text-end'>Olá <strong>" . $dsc_usuario_logado . "</strong>. <a href='../usuario/logout.php' class='btn btn-outline-danger btn-sm'>Sair</a></div>";
        }
        ?>
        <h1 class="text-center">To Do List PHP</h1>
        <form action="adicionar.php" method="post" id="formAddTarefa" class="row g-3 my-3 col-md-6 mx-auto">
            <div class="input-group">
                <div class="form-floating">
                    <input type="text" class="form-control" id="tarefa" name="tarefa"
                        placeholder="nao pode deixar em branco para floating funcionar">
                    <label for="tarefa">Descrição da tarefa</label>
                </div>
                <button class="btn btn-outline-success" type="submit">Adicionar</button>
            </div>
        </form>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

        <div class="table-responsive">
            <table class="table">
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
                        echo "<td class='text-center align-middle'>" . $tarefa_data['id'] . "</td>";
                        echo "<td class='align-middle'>" . $tarefa_data['dsc_tarefa'] . "</td>";
                        echo $tarefa_data['flg_resolvido'] == 1 ? "<td class='text-center align-middle'>Sim</td>" : "<td class='text-center align-middle'>Não</td>";
                        echo $tarefa_data['flg_ativo'] == 1 ? "<td class='text-center align-middle'>Sim</td>" : "<td class='text-center align-middle'>Não</td>";
                        echo "<td class='text-center align-middle'><a href='editar.php?id=" . $tarefa_data['id'] . "' class='btn btn-primary'>Editar</a></td>";
                        echo "<td class='text-center align-middle'><a href='excluir.php?id=" . $tarefa_data['id'] . "' class='btn btn-danger align-middle'>Excluir</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
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
