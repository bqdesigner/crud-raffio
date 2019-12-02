<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <title>Raff.io</title>
</head>
<body>
    <div class="lado-esq">
        <img src="assets/svg/ilustra_entrada.svg" alt="Raff.io">
    </div>
    <div class="lado-dir">
        <header class="header">
            <img src="assets/img/logo.png" alt="Raff.io" class="logo-lg">
        </header>
        <!-- Tab entrar -->
        <div class="login-entrar" data-group="entrar">
            <div class="row my-5 tab-menu ml-0">
                <a href="#entrar" id="entrar-btn"> Acesse sua conta Raff.io </a>
                <a href="#criar"> Não possui conta? </a>
            </div>
            <div class="item" id="entrar" data-target="entrar">
                <form id="formContatoLogin"  method="POST" onsubmit="return validForm()" action="actions/valid-login.php">
                    <div class="input-group">
                        <input type="text" id="usuario" name="usuario" autocomplete="off" required>
                        <span class="placeholder">Nome de usuário</span>
                    </div>
                    <div class="input-group">
                        <input type="password" id="senha" name="senha" required>
                        <span class="placeholder">Senha</span>
                        <a href="javascript:;" id="view-pass">
                            <img src="assets/icones/icone_show.png" alt="Exibir Senha">
                        </a>
                    </div>
                    <span class="msg-success" style="display: none;"> Usuário cadastrado </span>
                    <span class="msg-danger" style="display: none;"> Usuário ou senha inválidos</span>
                    <!-- <div class="checkbox-group">
                        <input type="checkbox" name="checkbox-style-1" id="checkbox-style-1" class="checkbox-style-1">
                        <label for="checkbox-style-1"> Mantenha logado </label>
                    </div> -->
                    <div class="esqueceu-senha">
                         <a href="esqueceu-senha.php"> Esqueceu sua senha? </a> 
                    </div>
                    <button id="enviar" type="submit" class="btn-login button-primary mt-5"> Entrar </button>
                </form>
            </div>
        </div>
        <!-- Tab criar conta -->        
        <div class="login-criar" data-group="criar">
            <div class="item" id="criar" data-target="criar">
                <p id="texto-login-criar"> Para usar o Raff.io crie a sua conta preenchendo os campos abaixo: </p>
                <form id="formContatoCadastrar" method="POST" onsubmit="return submitForm()" action="actions/cadastrar.php">
                    <div class="input-group">
                        <input type="text" id="nome" name="novo_nome" required autocomplete="off"> 
                        <span class="placeholder">Seu nome</span>
                    </div>
                    <div id="msgErro"></div>
                    <div class="input-group">
                        <input type="text" id="novo-usuario" name="novo_usuario" required autocomplete="off">
                        <span class="placeholder">Usuário</span>
                    </div>
                    <div id="msgErro"></div>
                    <div class="input-group">
                        <input type="text" id="novo-email" name="novo_email" required autocomplete="off">
                        <span class="placeholder">E-mail</span>
                    </div>
                    <div id="msgErro"></div>
                    <div class="input-group">
                        <input type="password" id="nova-senha" name="nova_senha" required>
                        <span class="placeholder">Senha</span>
                    </div>
                    <div id="msgErro"></div>
                    <!-- <div class="input-group">
                        <input type="password" id="pass-confirm" name="pass-confirm" required>
                        <span class="placeholder">Confirmar senha</span>
                    </div> -->
                    
                    
                    <span class="msg-attention" style="display: none;"> ERRO: Usuário ou E-mail já existe. </span>

                    <button id="cadastrar" type="submit" class="btn-login mt-5"> Criar </button>
                </form>
            </div>
        </div>
        <!-- <footer class="footer-login mx-0">
            <span> <img src="assets/icones/icone_politica_privacidade.png" alt="Política de Privacidade"> Políticas de Privacidade </span>
            <span> <img src="assets/icones/icone_faq.png" alt="FAQ"> Consulte nosso FAQ </span>
        </footer> -->
    </div>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/tab.js"></script>
    <script src="js/showPass.js"></script>
    <script src="js/login.js"></script>
</body>
</html>