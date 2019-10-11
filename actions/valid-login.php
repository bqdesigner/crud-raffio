<?php
session_start();
include_once('connection.php');

// Validando campo vazio
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: ../login.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));

$query = "select nome, id_usuario, first_login from usuarios where usuario = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $usuario_bd = mysqli_fetch_assoc($result);
    $_SESSION['nome'] = $usuario_bd['nome'];
    $_SESSION['id_usuario'] = $usuario_bd['id_usuario'];
    if ($usuario_bd['first_login'])
        echo json_encode(array('redirect' => './bem-vindo.php'));    
        //header('Location: ../bem-vindo.php');
    else 
        echo json_encode(array('redirect' => './index.php'));    
        //header('Location: ../index.php');
    exit();
} else {
    //$_SESSION['nao_autenticado'] = true;
    
    //header('Location: ../login.php');
    echo json_encode(array('error' => 'Usuário Inválido'));
    return;
}

