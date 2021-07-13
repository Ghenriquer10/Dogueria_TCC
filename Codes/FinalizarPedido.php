<?php
$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';



// CRIANDO CONEXÃO NO MYSQL
$conexao = new PDO($dsn, $usuario, $senhaMysql);
session_start();
    foreach($_SESSION['dados'] as $produto){

        $sttm = $conexao -> prepare('INSERT INTO tb_pedido (data_pedido, hora_pedido, quantidade_produto, valor_produto, id_cliente, id_produto, total_produto) 
        VALUES (NOW() , NOW(), :quantidade_produto, :valor_produto, :id_cliente, :id_produto, :total_produto)');
            $sttm -> bindParam(':quantidade_produto', $produto['quantidade_produto']);
            $sttm -> bindParam(':valor_produto', $produto['valor_produto']);
            $sttm -> bindParam(':id_cliente', $produto['id_cliente']);
            $sttm -> bindParam(':id_produto', $produto['id_pedido']);
            $sttm -> bindParam(':total_produto', $produto['total_produto']);

            if($sttm -> execute()){
                
                header("Location: ../PedidoFinalizado.php");
            }
    }
    $sttm = $conexao->lastInsertId();
                $_SESSION['senha'] = $sttm;
?>