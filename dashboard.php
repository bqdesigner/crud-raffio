<?php
session_start();

include('actions/verifica-login.php');
include_once('actions/connection.php');

// Pegando o ID do usuário
$id_usuario = $_SESSION['id_usuario'];
$info_usuario = "SELECT * FROM usuarios where id_usuario = '{$id_usuario}'";
$resultado_usuario = mysqli_query($conexao, $info_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$id_usuario = $row_usuario ['id_usuario'];

// Infos da conta
//$arrayDados = mysqli_fetch_array($resultado_usuario);
$data_criacao_conta = new DateTime($row_usuario['data_cadastro']);

// Infos do Raff
$sql = "SELECT count(*) as count_raff from novo_raff where id_usuario = '{$id_usuario}'";
$buscar = mysqli_query($conexao, $sql);
$infoRaff = mysqli_fetch_object($buscar); 
$totalRaff = $infoRaff->count_raff;


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <title> Dashboard </title>
</head>

<body>
    <section class="container-fluid m-0 p-0">
        <?php include "includes/header-page.php" ?>
        <main class="dashboard container mt-5 pt-5">
            <h1> Dados da sua conta </h1>
            <div class="row">
                <div class="col-12 col-md-6 col-info-dash">
                    <h3> Conta criada em </h3>            
                    <p> <?php echo $data_criacao_conta->format("d/m/Y"); ?> </p>
                </div>
                <div class="col-12 col-md-6 col-info-dash">
                    <h3> Total de Raffs criados </h3>
                    <p> <?php echo $totalRaff ?> </p>
                </div>
            </div>
        </main>
        <?php include "includes/footer-page.php" ?>
    </section>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="js/modal.js"></script> -->
    <!-- <script src="js/ajax.js"></script> -->
</body>

</html>