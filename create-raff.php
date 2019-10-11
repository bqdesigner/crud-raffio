<?php
session_start(); 

include('actions/verifica-login.php');
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
            <form id="formCreateRaff" class="" method="POST" action="actions/new-raff.php" enctype="multipart/form-data"> 
                <h2> 1 - Como você quer chamar o seu projeto? </h2>
                <div class="input-group">
                    <input type="text" id="nome_raff_proj" name="nome_raff_proj" required autocomplete="off">
                    <span class="placeholder">Ex: Criação logo</span>
                </div>
                <h2> 2 - Em qual categoria está o seu Raff? </h2>
                <div class="input-group">
                <select class="categ" name="categ_proj">
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
                    <textarea id="desc_proj" name="desc_proj" required></textarea>
                    <span class="placeholder-textarea">Descreva o que você imagina! </span>
                    <span id="msg-erro"> </span>
                </div>
                <h2> 4 - Referências </h2>
                <div class="input-group">
                    <input type="text" id="ref_proj" name="ref_proj" required autocomplete="off">
                    <span class="placeholder">Links de referência</span>
                </div>
                <h2> 5 - Uploads </h2>
                <div class="input-group">
                <input type="file" name="imagem_proj" id="imagem_proj" />
                <label for="imagem_proj">Carregue uma imagem</label>
                <span class="nome-imagem"> </span>
                </div>
                <h2> 6 - Considerações </h2>
                <div class="input-group">
                    <textarea id="desc_consideracao_proj" name="desc_consideracao_proj" required></textarea>
                    <span class="placeholder-textarea">Dicas e o que você espera </span>
                </div>
                <h2> 7 - Finalizando o seu Raff </h2>
                <div class="input-group">
                    <input type="email" id="email_proj" name="email_proj" required autocomplete="off">
                    <span class="placeholder">E-mail para quem deseja enviar</span>
                </div>
                <div class="input-button">
                    <button id="enviar" type="submit" name="enviar" class="btn-create button-primary mt-5"> Criar </button>
                    <a id="cancelar" href="index.php" class="btn-create-secundary button-primary mt-5"> Cancelar </a>
                </div>
            </form>
        </div>
        <?php include "includes/footer-page.php" ?>
    </section>
   
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/validaRaff.js"></script>
</body>
</html>