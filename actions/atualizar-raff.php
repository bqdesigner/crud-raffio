<?php
session_start();
include_once('verifica-login.php');
include_once('connection.php');

// Pegando o ID do usuário
$id_usuario = $_SESSION['id_usuario'];
$info_usuario = "SELECT * FROM usuarios where id_usuario = '{$id_usuario}'";
$resultado_usuario = mysqli_query($conexao, $info_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

// Pegando o ID do raff
$id_raff = $_POST['id_raff'];

// Pegando os dados editados nos campos
$nome_raff = $_POST['nome_raff_proj'];
$categ_raff = $_POST['categ_proj'];
$desc_ideia = $_POST['desc_proj'];
$ref = $_POST['ref_proj'];
$upload = $_POST['upload_proj'];
$consideracao = $_POST['desc_consideracao_proj'];
$finalizar_raff = $_POST['email_proj'];

// Atualizando os valores
$sql = "UPDATE novo_raff SET nome_projeto = '{$nome_raff}', categ_projeto = '{$categ_raff}', ideia = '{$desc_ideia}', ref = '{$ref}', upload = '{$upload}', consideracao = '{$consideracao}', finalizar_raff = '{$finalizar_raff}'  where id_raff = '{$id_raff}'";

$atualizarRaff = mysqli_query($conexao, $sql);

header('Location: ../meus-raffs.php');
exit();

?>