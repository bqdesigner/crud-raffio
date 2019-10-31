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
                        $ideia = $array['ideia'];
                        $ref = $array['ref'];
                        $imagem = $array['upload'];
                        $consideracoes = $array['consideracao'];
                        $email_enviado = $array['finalizar_raff'];
                        $data_criacao_raff = new DateTime($array['data_criacao']);
                        $enviado = $array['finalizar_raff'];

                        ?>
                <div class="raff">
                    <a data-toggle="modal" data-target="#modalInfoRaff">
                        <h2> <?php echo $raff ?> </h2>
                    </a>
                    <!-- <ul>
                        <li> Categoria: <?php echo $categ ?> </li>
                        <li> Enviado para: <?php echo $enviado ?>  </li>
                    </ul> -->
                    <div class="links">
                        <a id="editar_raff" href="editar-raff.php?id=<?php echo $id_raff ?>"> <img src="assets/icones/icone_editar.png" alt="Editar"> Editar Raff </a>
                        
                        <a id="excluir_raff" class="excluir_raff" data-toggle="modal" data-target="#modalExcluir" data-id="<?php echo $id_raff ?>"> <img src="assets/icones/icone_adicionar.png" alt="Excluir" class="excluir"> Excluir Raff </a>
                    </div>
                </div>

                <!-- Modal detalhes raff -->
                <div class="modal modal-raff fade" id="modalInfoRaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> <img src="assets/icones/icone_form.png" class="mr-3 img-icone" alt="Raff <?php echo $raff ?>"> <span><?php echo $raff ?></span> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        Raff criado por <span><?php echo $_SESSION['nome'] ?></span> em <span><?php echo $data_criacao_raff->format('d/m/Y'); ?> </span>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                </div>
                            </div>
                            
                        </div>
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
        <aside>
          <!-- Modal excluir -->
          <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> <img src="assets/icones/icone_sair.png" class="mr-3 img-icone" alt="Sair"> Excluir Raff </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja excluir o Raff <span id="excluir_titulo"></span>?
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-cancelar" data-dismiss="modal"> Não </a>
                                <a class="btn btn-sair" href=""> Excluir </a>
                            </div>
                        </div>
                    </div>
                </div>
        </aside>
        <?php include "includes/footer-page.php" ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // Modal ao excluir Raff 
        $('.excluir_raff').click(function(){
            let titulo = $(this).parents().parents().children('a').children("h2").html().trim();
            let id = $(this).attr("data-id");
            let $modal_excluir = $('#modalExcluir');
            $modal_excluir.find("#excluir_titulo").html(titulo);
            $modal_excluir.find(".btn-sair").attr("href", 'actions/deletar-raff.php?id='+id);
        });

        // Modal ao Exibir o Raff
        

    </script>
    
</body>
</html>