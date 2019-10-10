<?php 

session_start(); 

include_once('actions/verifica-login.php');
include_once('actions/connection.php');

// Pegando o ID do usuário
$id_usuario = $_SESSION['id_usuario'];
$info_usuario = "SELECT * FROM usuarios where id_usuario = '{$id_usuario}'";
$resultado_usuario = mysqli_query($conexao, $info_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$id_usuario = $row_usuario['id_usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Bem-vindo, <?php echo $_SESSION['nome']; ?>, </title>
</head>
<body>

    <h2> Bem-vindo ao Raffio, <?php echo $_SESSION['nome']; ?>, sua conta foi criada com sucesso! </h2>
    <a href="index.php"> Ir para Dashboard </a>
    
</body>
</html>