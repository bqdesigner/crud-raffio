<?php

define('HOST', '127.0.0.1');
define('USUARIO','root');
define('SENHA', '');
define('DB', 'db_pi');
define('PORTA', 3306);
// define('PORTA', 3307);

$conexao = mysqli_connect(HOST.":".PORTA, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

// $db_host = 'localhost';
// $db_user = 'root';
// $db_pass = '';
// $db_dtb = 'db_pi';

// try {
//     $conn = new PDO("mysql:host=$db_host;dbname=$db_dtb", $db_user, $db_pass);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
//     }
// catch(PDOException $e)
//     {
//     echo "Connection failed: " . $e->getMessage();
//     }