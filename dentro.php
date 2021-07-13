<?php

session_start();

if(isset($_SESSION['admin'])){
    echo 'Bem vindo '.$_SESSION['admin']. ' - Administração';
} else if (isset($_SESSION['normal'])) {
    echo 'Bem vindo '.$_SESSION['normal']. '';
}else {
    echo '<script type="text/javascript">window.location = "index.php"';
}

?>
