<?php

include_once "../conexao.php";
session_start();
ob_start();

$id_usuario_logado = $_SESSION['id_usuario_logado'];
$dsc_usuario_logado = $_SESSION['dsc_usuario_logado'];

$sqlListarTodas = "SELECT * FROM t_tarefa WHERE id_usuario = '$id_usuario_logado'";
$result = $conn->query($sqlListarTodas);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <div class="my-3 col-md-6 mx-auto">
        <?php
        if (isset($_SESSION['dsc_usuario_logado'])) {
            echo "<div class='my-3 text-end'>Olá <strong>" . $dsc_usuario_logado . "</strong>. <a href='../usuario/logout.php' class='btn btn-outline-danger btn-sm'>Sair</a></div>";
        }
        ?>
        <h1 class="text-center">To do list PHP</h1>
        <form action="adicionar.php" method="post" id="formAddTarefa" class="row g-3 my-3 mx-auto">
            <div class="input-group">
                <input type="text" class="form-control" name="tarefa" placeholder="Descrição da tarefa...">
                <button class="btn btn-success" type="submit">Adicionar</button>
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
                        echo $tarefa_data['flg_resolvido'] == 1 ? "<td class='text-center align-middle'><a href='alterar_resolvido.php?id=" . $tarefa_data['id'] . "'><i class='fa-solid fa-check text-success'></i></a></td>" : "<td class='text-center align-middle'><a href='alterar_resolvido.php?id=" . $tarefa_data['id'] . "'><i class='fa-solid fa-xmark text-danger'></i></a></td>";
                        echo $tarefa_data['flg_ativo'] == 1 ? "<td class='text-center align-middle'><a href='alterar_ativo.php?id=" . $tarefa_data['id'] . "'><i class='fa-solid fa-check text-success'></i></a></td>" : "<td class='text-center align-middle'><a href='alterar_ativo.php?id=" . $tarefa_data['id'] . "'><i class='fa-solid fa-xmark text-danger'></i></a></td>";
                        echo "<td class='text-center align-middle'><button disabled='disabled' href='editar.php?id=" . $tarefa_data['id'] . "' class='btn btn-sm btn-outline-primary'><i class='fa-sharp fa-solid fa-pen-to-square'></i></button></td>";
                        echo "<td class='text-center align-middle'><a href='excluir.php?id=" . $tarefa_data['id'] . "' class='btn btn-sm btn-outline-danger align-middle'><i class='fa-solid fa-trash'></i></a></td>";
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