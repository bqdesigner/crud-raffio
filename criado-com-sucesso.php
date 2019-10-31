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
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <title>Meus Raffs | <?php echo $_SESSION['nome']; ?> </title>

</head>
<body>
    
    <section class="container">
        <div class="criado-com-sucesso">
            <img src="assets/svg/icone_conta_ativada.svg" alt="">

            <h2> O Raff, <span><!--<?php echo $_SESSION['raff-criado'] ?>--></span>, foi criado com sucesso! </h2>
            
            <p>Caso precise alterar informações ou adicionar pessoas,você pode clicar em Meus Raffs.</p>
        
            <div class="botoes">
                <a href="index.php" class="btn-meus-raffs-secundary"> Dashboard </a>
                <a href="meus-raffs.php" class="btn-meus-raffs"> Meus Raffs </a>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

<?php

unset($_SESSION['raff-criado']);

?>