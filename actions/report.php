<?php
    session_start();
    include_once('connection.php');

    // Pegando o ID do usuário
    $id_usuario = $_SESSION['id_usuario'];
    $info_usuario = "SELECT * FROM usuarios where id_usuario = '{$id_usuario}'";
    $resultado_usuario = mysqli_query($conexao, $info_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);

   
    $infoReport = mysqli_real_escape_string($conexao, $_POST['infoReport']);

    // Inserindo Raff no BD
    $sql = "INSERT INTO report (id_usuario, report) VALUES ('$id_usuario', '$infoReport')";

    $inserirReport = mysqli_query($conexao, $sql);
    header('Location: ../index.php');
    exit();