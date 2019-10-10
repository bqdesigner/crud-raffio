<?php
    session_start();
    include_once('connection.php');

    // Pega os dados e guarda em variáveis
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['novo-usuario']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['nova-senha'])));

    // Preparando a Query
    $prep = mysqli_prepare ($conexao, 'select usuario from usuarios where usuario = ?');
    mysqli_stmt_bind_param($prep, 's', $usuario);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $row = $result->fetch_assoc();

    // Verificando se o usuário já existe no momento do cadastro, redirecionando ele para o login
    if($row['usuario'] == $usuario) {
        $_SESSION['usuario_existe'] = true;
        header('Location: ../login.php');
        exit;
    }

    // Caso não existe, salva o usuário no banco
    date_default_timezone_set('America/Sao_Paulo');
    $date = date("Y-m-d H:i:s");
    $createUser = mysqli_prepare ($conexao, 'INSERT INTO usuarios (nome, usuario, senha, data_cadastro) VALUES (?, ?, ?, ?)');
    mysqli_stmt_bind_param($createUser, 'ssss', $nome, $usuario, $senha, $date);
    if (mysqli_stmt_execute($createUser)) {
        $_SESSION['usuario_novo'] = true;
        header('Location: ../login.php');
        exit;
    };

?>