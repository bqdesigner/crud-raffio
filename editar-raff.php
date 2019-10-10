<?php

session_start();
include_once('actions/verifica-login.php');
include_once('actions/connection.php');

// Pegando o ID do usuário
$nome = $_SESSION['nome'];
$info_usuario = "SELECT * FROM usuarios where nome = '{$nome}'";
$resultado_usuario = mysqli_query($conexao, $info_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$id_usuario = $row_usuario['id_usuario'];

// Pegando o ID passado via URL
$id_raff = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <title>Criando Raff</title>
</head>

<body>
    <section class="create-raff container-fluid m-0 p-0">
        <?php include "includes/header-page.php" ?>
        <div class="container">
            <form id="formCreateRaff" class="" method="POST" action="actions/atualizar-raff.php"> 
                <?php
                     $sql = "SELECT * FROM novo_raff where id_raff = '{$id_raff}' and id_usuario = '{$id_usuario}'";
                     $buscar = mysqli_query($conexao, $sql);
                     while ($editRaff = mysqli_fetch_object($buscar)) {
                        $id_busca_usuario = $editRaff->id_usuario;
                        $id_raff = $editRaff->id_raff;
                        $raff = $editRaff->nome_projeto;
                        $categ = $editRaff->categ_projeto;
                        $ideia = $editRaff->ideia;
                        $refs = $editRaff->ref;
                        $upload = $editRaff->upload;
                        $consideracao = $editRaff->consideracao;
                        $enviado = $editRaff->finalizar_raff;
                ?>
                <h2> 1 - Como você quer chamar o seu projeto? </h2>
                <input type="hidden" name="id_raff" id="id_raff" value="<?php echo $id_raff ?>">
                <div class="input-group">
                    <input type="text" id="nome_raff_proj" name="nome_raff_proj" value="<?php echo $raff?>">
                </div>
                <h2> 2 - Em qual categoria está o seu Raff? </h2>
                <div class="input-group">
                    <select class="categ" name="categ_proj" value="<?php echo $categ?>">
                        <option value=''>Escolha uma categoria</option>
                        <option value='Web Design'>Web Design</option>
                        <option value='Design Gráfico'>Design Gráfico</option>
                        <option value='Design de Produto'>Design de Produto</option>
                        <option value='Animação'>Animação</option>
                        <option value='Arquitetura'>Arquitetura</option>
                    </select>
                </div>
                <h2> 3 - Descreva a sua ideia </h2>
                <div class="input-group">
                    <textarea id="desc_proj" name="desc_proj"> <?php echo $ideia?> </textarea>
                </div>
                <h2> 4 - Referências </h2>
                <div class="input-group">
                    <input type="text" id="ref_proj" name="ref_proj" value="<?php echo $refs?>">
                </div>
                <h2> 5 - Uploads </h2>
                <div class="input-group">
                    <?php echo "<img src='uploads/".$upload."' alt='Foto de exibição' class='img-raff' />"; ?>
                    <input type="file" name="image"/>
                </div>
                <h2> 6 - Considerações </h2>
                <div class="input-group">
                    <textarea id="desc_consideracao_proj" name="desc_consideracao_proj"> <?php echo $consideracao?> </textarea>
                </div>
                <h2> 7 - Finalizando o seu Raff </h2>
                <div class="input-group">
                    <input type="email" id="email_proj" name="email_proj" value="<?php echo $enviado?>">
                </div>
                <div class="input-button">
                    <button id="enviar" type="submit" class="btn-create button-primary mt-5"> Atualizar </button>
                    <a id="cancelar" href="meus-raffs.php" class="btn-create-secundary button-primary mt-5"> Cancelar </a>
                </div>       
                <?php
                }
                ?>
            </form>
        </div>
        <?php include "includes/footer-page.php" ?>
    </section>
   
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <!-- <script src="js/ajax.js"></script> -->
</body>
</html>