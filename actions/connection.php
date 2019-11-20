<?php

define('HOST', '127.0.0.1');
define('USUARIO','root');
define('SENHA', '');
define('DB', 'db_pi');
//define('PORTA', 3306);
 define('PORTA', 3307);

$conexao = mysqli_connect(HOST.":".PORTA, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
