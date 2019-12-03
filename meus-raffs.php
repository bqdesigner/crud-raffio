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
            <div class="row" id="raffs">
                
                <div class="raff" style="display: none" id="template-raff">
                    <a data-toggle="modal" data-target="#modalInfoRaff">
                        <h2> titulo </h2>
                    </a>
                    <div class="links">
                        <a id="editar_raff" href="editar-raff.php?id=xx"> <img src="assets/icones/icone_editar.png" alt="Editar"> Editar Raff </a>
                        
                        <a id="excluir_raff" class="excluir_raff" data-toggle="modal" data-target="#modalExcluir" data-id="1"> <img src="assets/icones/icone_adicionar.png" alt="Excluir" class="excluir"> Excluir Raff </a>
                    </div>
                </div>

                <!-- Modal detalhes raff -->
                <div class="modal modal-raff fade" id="modalInfoRaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> <img src="assets/icones/icone_form.png" class="mr-3 img-icone" alt="Raff 1"> <span>nome</span> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        Raff criado por <span>usuario</span> em <span>data</span>.
                                    </div>
                                </div>
                                <div class="row">
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="no-raff" style="display: none">
                    <p> Você não tem nenhum Raff criado. </p>
                    <img src="assets/svg/ilustra_meus_raffs.svg" alt="">
               </div>
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
    <script>
    function createRaff() {
        //event.preventDefault();
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                let data = JSON.parse(ajax.responseText);
                if (data.length == 0) {
                    document.querySelector('.no-raff').style.display = "flex";
                } else {

                    for(index in data){

                        let nome_projeto = data[index].nome_projeto;
                        let id = data[index].id_raff;
                        
                        let template = document.querySelector('#template-raff')
                        
                        let new_raff = template.cloneNode(true);
                        new_raff.style.display = "flex";
                        new_raff.id = "raff_"+id;
                        document.getElementById("raffs").appendChild(new_raff);
                        new_raff.children[0].children[0].innerHTML = nome_projeto;
                        new_raff.children[1].children[0].href = "editar-raff.php?id="+id;
                                                                     

                    }
                }
            }
        }
        ajax.open("POST", "./actions/raff.php", true);
        ajax.setRequestHeader("Content-type", "application/json");
        ajax.send(JSON.stringify(""));
        return false;
    }
    createRaff();
    </script>
    
</body>
</html>