<?php
    session_start();
    include_once('verifica-login.php');
    include_once('connection.php');
    
    // Pegando o ID do usuário
    $id_usuario = $_SESSION['id_usuario'];

    //Selecionando o Raff
    $sql = "SELECT * FROM novo_raff where id_usuario = '{$id_usuario}'";
    $buscaRaff = mysqli_query($conexao, $sql);
    $num_row = mysqli_num_rows($buscaRaff);
    $table = Array();
    if ($num_row != 0) {
        while ($row = mysqli_fetch_object($buscaRaff)) {
            $table[] = $row;
        }
    }
    
    echo json_encode($table);

?>