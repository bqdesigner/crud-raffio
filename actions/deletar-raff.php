<?php
session_start();
include_once('verifica-login.php');
include_once('connection.php');

// Pegando o ID do usuário
$id_usuario = $_SESSION['id_usuario'];

// Pegando o ID do raff via GET
$id_raff = $_GET['id'];

//Selecionando o Raff
$info_raff = "SELECT * FROM novo_raff where id_raff = '{$id_raff}'";
$resultado_raff = mysqli_query($conexao, $info_raff);
$row_raff = mysqli_fetch_assoc($resultado_raff);


// Excluindo o Raff
$sql = "DELETE FROM novo_raff WHERE id_raff = '{$id_raff}'";
$deletar = mysqli_query($conexao, $sql); 
unlink("../uploads/".$row_raff['upload']);

header('Location: ../meus-raffs.php');

?>
