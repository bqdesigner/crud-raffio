<?php 

session_start(); 

include_once('actions/verifica-login.php');
include_once('actions/connection.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Raff criado com sucesso! </title>
</head>
<body>
    
    <h2> O Raff, <?php echo $_SESSION['raff-criado'] ?>, foi criado com sucesso! </h2>
    <a href="index.php"> Dashboard </a>
    <a href="meus-raffs.php"> Meus Raffs </a>

</body>
</html>

<?php

unset($_SESSION['raff-criado']);

?>