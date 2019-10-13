<?php
session_start(); 

include('actions/verifica-login.php');
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
            <h1> Tudo sobre a sua conta! </h1>
        </main>
        <?php include "includes/footer-page.php" ?>
    </section>

    <!-- modal -->
    <!-- <section class="modal-container" data-modal="container">
        <div class="modal">
        <button data-modal="fechar" class="fechar"> X </button>
            <h2> Tem certeza que deseja sair? </h2>
            <a href="actions/logout.php"> <img src="assets/icones/icone_sair.png" alt="Finalizar sessão" class="mr-3 img-icone"> Sair</a>
        </div>
    </section> -->
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="js/modal.js"></script> -->
    <!-- <script src="js/ajax.js"></script> -->
</body>
</html>