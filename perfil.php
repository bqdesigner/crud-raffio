<?php
session_start(); 
include_once('actions/verifica-login.php');
include_once('actions/connection.php');

// Montando a consulta dos dados
$id_usuario = $_SESSION['id_usuario'];
$info_usuario = "SELECT * FROM usuarios where id_usuario = '{$id_usuario}'";
$resultado_usuario = mysqli_query($conexao, $info_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

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
    <title>Perfil | <?php echo $_SESSION['nome']; ?> </title>
</head>
<body>
    <section class="container-fluid m-0 p-0">
        <?php include "includes/header-page.php" ?>
        <main class="container mt-5 pt-5 perfil">
            <div class="row info-perfil">
                <div class="col-12 col-md-4">
                    <div class="photo-profile">
                        <img src="assets/icones/icone_perfil.png" alt="Alterar foto de perfil">
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <h2> Perfil </h2>
                    <form method="POST" action="actions/editar-usuario.php"> 
                        <label for="nome"> Nome </label>
                        <input type="text" name="nome" id="nome" value="<?php echo $row_usuario['nome'] ?>" autocomplete="off" disabled>
                        <label for="usuario"> Usuário </label>
                        <input type="text" name="usuario" id="usuario" value="<?php echo $row_usuario['usuario'] ?>" autocomplete="off" disabled>
                        <label for="email"> E-mail </label>
                        <input type="text" name="email" id="email" value="<?php echo $row_usuario['email'] ?>" autocomplete="off" disabled>
                        <!-- <label for="usuario"> Nova senha </label>
                        <input type="password" name="senha" id="senha"> -->
                        <a id="cancelar" class="btn-create-secundary button-primary mr-5"> Editar </a>
                        <input type="submit" value="Salvar">
                    </form>
                </div>
            </div>
            <div class="row info-conta">
                <div class="col-12 col-md-4">
                    
                </div>
                <div class="col-12 col-md-8"> 
                    <h2> Conta </h2>
                </div>
            </div>
        </main>
        <?php include "includes/footer-page.php" ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>

        const cancelar = document.getElementById('cancelar');
        cancelar.addEventListener('click', function(){
            const inputs = document.querySelectorAll('input[type=text]');
            for (var i = 0; i < inputs.length; i += 1) {
                inputs[i].removeAttribute('disabled');
            }
            cancelar.innerText = "Cancelar";
            cancelar.id = "editar";
        });

        // function editarPerfil() {
        //     const cancelar = document.getElementById('cancelar');
        //     const inputs = document.querySelectorAll('input[type=text]');
        //     for (var i = 0; i < inputs.length; i += 1) {
        //         inputs[i].removeAttribute('disabled');
        //     };
        //     cancelar.innerText = "Cancelar";
        //     cancelar.id = "editar";
        //     return;
        // }

        // function cancelarEdicao() {
        //     const editar = document.getElementById('editar');
        //     const inputs = document.querySelectorAll('input[type=text]');
        //     for (var i = 0; i < inputs.length; i += 1) {
        //         inputs[i].setAttribute('disabled', "");
        //     };
        //     cancelar.innerText = "Editar";
        //     cancelar.id = "cancelar";
        // }

        // const cancelar = document.getElementById('cancelar');
        // cancelar.addEventListener('click', editarPerfil);

        // const editar = document.getElementById('editar');
        // editar.addEventListener('click', cancelarEdicao);


    </script>
</body>
</html>