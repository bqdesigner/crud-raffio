<header class="header-page">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <span> <img src="assets/icones/icone_perfil.png" alt="Perfil" class="mr-3 img-icone"> Olá, <?php echo $_SESSION['nome']; ?>!</span>
            </div>
            <div class="col-md-7" class="mt-0 pt-0">
                <nav>
                    <ul>
                        <li> <a href="index.php"> Início </a> </li>
                        <li> <a href="dashboard.php"> Dashboard </a> </li>
                        <li> <a href="meus-raffs.php"> Meus Raffs </a> </li>
                        <li> <a href="perfil.php"> Perfil </a> </li>
                        <li> <a href="javascript:;" id="report"> Reportar </a> </li>
                        <div id="report-space">
                          <form id="formReport" action="actions/report.php" onsubmit="return validaReport()" method="POST">
                            <h2> Informe o erro: </h2>
                            <textarea name="infoReport" id="infoReport" cols="20" rows="7"></textarea>
                            <button id="enviar" name="enviarReport" type="submit" class="btn-report button-primary"> Enviar </button>
                          </form>
                        </div>
                    </ul>
                </nav> 
            </div>
            <div class="col-md-2">
                <span class="logout">
                  <a data-toggle="modal" data-target="#modalSair"> 
                    <img src="assets/icones/icone_sair.png" alt="Finalizar sessão" class="mr-3 img-icone"> 
                    Sair
                  </a>
                </span>
                <!-- <span class="report">
                  <img src="assets/icones/icone_report.png" alt="Reportar erro"> 
                  Reportar erro 
                </span> -->
            </div>
        </div>
    </div>
</header>



<!-- Modal -->
<div class="modal fade" id="modalSair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <img src="assets/icones/icone_sair.png" class="mr-3 img-icone" alt="Sair"> Finalizar sessão </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span><?php echo $_SESSION['nome']; ?></span>, deseja finalizar sua sessão?
      </div>
      <div class="modal-footer">
        <a class="btn btn-cancelar" data-dismiss="modal"> Não </a>
        <a class="btn btn-sair" href="actions/logout.php"> Finalizar </a>
      </div>
    </div>
  </div>
</div>

<script src="js/report.js"></script>

