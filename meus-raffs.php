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
    <section class="container-fluid m-0 p-0">
        <?php include "includes/header-page.php" ?>
        <main class="container mt-5 pt-5 meus-raffs">
            <h1> Meus Raffs </h1>
            <div class="row">
                <?php
                    $sql = "SELECT * FROM novo_raff where id_usuario = '{$id_usuario}'";
                    $buscaRaff = mysqli_query($conexao, $sql);
                    $row = mysqli_num_rows($buscaRaff);
                    if ($row != 0) {
                        while ($array = mysqli_fetch_array($buscaRaff)) {
                        $id_busca_usuario = $array['id_usuario'];
                        $id_raff = $array['id_raff'];
                        $raff = $array['nome_projeto'];
                        $categ = $array['categ_projeto'];
                        $enviado = $array['finalizar_raff'];                   

                ?>
                    <div class="raff">
                        <h2> <?php echo $raff ?> </h2>
                        <!-- <ul>
                            <li> Categoria: <?php echo $categ ?> </li>
                            <li> Enviado para: <?php echo $enviado ?>  </li>
                        </ul> -->
                        <div class="links">
                            <a id="editar_raff" href="editar-raff.php?id=<?php echo $id_raff ?>"> <img src="assets/icones/icone_editar.png" alt="Editar"> Editar Raff </a>
                            
                            <a id="excluir_raff" href="actions/deletar-raff.php?id=<?php echo $id_raff ?>"> <img src="assets/icones/icone_adicionar.png" alt="Excluir" class="excluir"> Excluir Raff </a>
                        </div>
                    </div>
                <?php
                    }
                } else { ?>
                    <div class="no-raff">
                        <p> Você não tem nenhum Raff criado. </p>
                        <img src="assets/svg/ilustra_meus_raffs.svg" alt="">
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="row cta-criar-raff my-5 py-5">
                <a href="create-raff.php" class="btn-criar-raff"> <img src="assets/icones/icone_adicionar_branco.png" alt="Novo Raff" class="mr-3 img-icone"> Criar raff</a>
            </div>
        </main>
        <?php include "includes/footer-page.php" ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        const idRaff = document.getElementById('excluir');
        console.log(idRaff);
    </script>
    
</body>
</html>