<header class="header-page">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <span> <img src="assets/icones/icone_perfil.png" alt="Perfil" class="mr-3 img-icone"> Olá, <?php echo $_SESSION['nome']; ?>!</span>
            </div>
            <div class="col-md-7" class="mt-0 pt-0">
                <nav>
                    <ul>
                        <li> <a href="index.php"> Dashboard </a> </li>
                        <li> <a href="meus-raffs.php"> Meus Raffs </a> </li>
                        <li> <a href="profile.php"> Perfil </a> </li>
                    </ul>
                </nav> 
            </div>
            <div class="col-md-2">
                <span class="logout"><a href="actions/logout.php"> <img src="assets/icones/icone_sair.png" alt="Finalizar sessão" class="mr-3 img-icone"> Sair</a></span>
            </div>
        </div>
    </div>
</header>