<?php
    session_start();
    include_once('connection.php');

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['novo-usuario']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['nova-senha'])));

    // Query que seleciona todos os usuários do banco de dados
    $sql = "select count(*) as total from usuarios where usuario = '$usuario'";

    $result = mysqli_query($conexao, $sql);

    $row = mysqli_fetch_assoc($result);

    // Verificando se o usuário já existe no momento do cadastro, redirecionando ele para o login
    if($row['total'] == 1) {
        $_SESSION['usuario_existe'] = true;
        header('Location: ../login.php');
        exit;
    }
    // Montando o insert no BD
    $sql = "INSERT INTO usuarios (nome, usuario, senha, data_cadastro) VALUES ('$nome','$usuario', '$senha', NOW())";

    if ($conexao->query($sql) === true) {
        $_SESSION['usuario_novo'] = true;
    }
    $conexao->close();

    header('Location: ../login.php');
    exit;
?>