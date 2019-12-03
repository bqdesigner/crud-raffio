<?php
    session_start();
    include_once('connection.php');

    $json = file_get_contents('php://input');
    $user = json_decode($json);

     $nome = $user->nome;
     $usuario = $user->usuario;
     $email = $user->email;
     $senha = $user->senha;

//     // if (!isset($nome)) {
//     //     $nome = '';
//     // }
    
//     // if (!isset($usuario)) {
//     //     $usuario = '';
//     // }

//     // if (!isset($email)) {
//     //     $email = '';
//     // }

//     // if (!isset($senha)) {
//     //     $senha = '';
//     // }

   // Pega os dados e guarda em variáveis
   $nome = mysqli_real_escape_string($conexao, trim($nome));
   $usuario = mysqli_real_escape_string($conexao, trim($usuario));
   $email = mysqli_real_escape_string($conexao, trim($email));
   $senha = mysqli_real_escape_string($conexao, trim(md5($senha)));

   // Preparando a Query
   $prep = mysqli_prepare ($conexao, 'select usuario, email from usuarios where usuario = ? or email = ?');
   mysqli_stmt_bind_param($prep, 'ss', $usuario, $email);
   mysqli_stmt_execute($prep);
   $result = mysqli_stmt_get_result($prep);
   $row = $result->fetch_assoc();

   // Verificando se o usuário já existe no momento do cadastro, redirecionando ele para o login
   if($row['usuario'] == $usuario || $row['email'] == $email) {
       $_SESSION['usuario_existe'] = true;
       echo json_encode(array('error' => 'Usuário ou email já existe'));
       return;
   }

   // Caso não existe, salva o usuário no banco
   date_default_timezone_set('America/Sao_Paulo');
   $date = date("Y-m-d H:i:s");
   $stateLogin = true;
   $createUser = mysqli_prepare ($conexao, 'INSERT INTO usuarios (nome, usuario, email, senha, data_cadastro, first_login) VALUES (?, ?, ?, ?, ?, ?)');
   mysqli_stmt_bind_param($createUser, 'sssssi', $nome, $usuario, $email, $senha, $date, $stateLogin);
   if (mysqli_stmt_execute($createUser)) {
       $_SESSION['usuario_novo'] = true;
       echo json_encode(array('sucess' => 'Usuário ' . $usuario . ' cadastrado'));
       //header('Location: ../login.php');
   };

?>