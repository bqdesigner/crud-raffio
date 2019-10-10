<?php
    session_start();
    include_once('verifica-login.php');
    include_once('connection.php');
    
    // Pegando o ID do usuário
    $id_usuario = $_SESSION['id_usuario'];

    // Pegando os dados do profile
    $novoNome = $_POST['nome'];
    $novoUsuario = $_POST['usuario'];

    // Atualizando os dados do usuário
    $sql = "UPDATE usuarios SET nome = '{$novoNome}', usuario = '{$novoUsuario}', data_modificado = NOW() WHERE id_usuario = '{$id_usuario }'";
    $att_usuario = mysqli_query($conexao, $sql);

    $_SESSION['nome'] = $novoNome;
    
    header('Location: ../index.php');
    
    ?>
