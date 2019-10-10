<?php
    $usuario = (isset($_POST['user'])) ? $_POST['user'] : '' ;
    $senha = (isset($_POST['pass'])) ? $_POST['pass'] : '' ;

    if ($usuario == 'bqdesigner' && $senha == '12345' ) {
        echo (1);
     } else {
        echo (0);    
    }
?>