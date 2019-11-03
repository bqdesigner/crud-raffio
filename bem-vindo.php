<?php

        session_start();

        include_once('actions/verifica-login.php');
        include_once('actions/connection.php');

        // Pegando o ID do usuário
        $id_usuario = $_SESSION['id_usuario'];
        $info_usuario = "SELECT * FROM usuarios where id_usuario = '{$id_usuario}'";
        $resultado_usuario = mysqli_query($conexao, $info_usuario);
        $row_usuario = mysqli_fetch_assoc($resultado_usuario);
        $id_usuario = $row_usuario['id_usuario'];
        $first_login = $row_usuario['first_login'];

        if ($first_login) {
            $sql = "UPDATE usuarios SET first_login = false  where id_usuario = '{$id_usuario}'";
            $atualizarRaff = mysqli_query($conexao, $sql);
        }


        ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <title> Bem-vindo, <?php echo $_SESSION['nome']; ?>, </title>
</head>

<body>

    <section class="container">
        <div class="bem-vindo">

            <img src="assets/img/logo.png" alt="Raffio" class="logo">

            <h1> Bem-vindo ao Raffio, <span><?php echo $_SESSION['nome']; ?></span>, sua conta foi criada com sucesso! </h1>

            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="assets/svg/ilustra_walk_1.svg" alt="">
                        <div class="info-walk">
                            <h2> Organize suas ideias em Raffs </h2>
                            <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, similique fuga ab inventore nesciunt doloribus autem repellat possimus.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/svg/ilustra_walk_2.svg" alt="">
                        <div class="info-walk">
                            <h2> Organize suas ideias em Raffs </h2>
                            <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, similique fuga ab inventore nesciunt doloribus autem repellat possimus.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/svg/ilustra_walk_3.svg" alt="">
                        <div class="info-walk">
                            <h2> Organize suas ideias em Raffs </h2>
                            <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, similique fuga ab inventore nesciunt doloribus autem repellat possimus.</p>
                        </div>
                    </div>
                </div>
                <!-- Paginação -->
                <div class="swiper-pagination"></div>
            </div>

            <a href="index.php" class="btn-pular"> Ir para Dashboard </a>
        </div>
    </section>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
            },
            autoplay: {
                delay: 3000,
            },
        });
    </script>

</body>

</html>