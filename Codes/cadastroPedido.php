<?php

$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';



// CRIANDO CONEXÃO NO MYSQL
$conexao = new PDO($dsn, $usuario, $senhaMysql);

?>