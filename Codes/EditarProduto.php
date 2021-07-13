<?php

$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';



// CRIANDO CONEXÃO NO MYSQL
$conexao = new PDO($dsn, $usuario, $senhaMysql);

try {
    if (isset($_POST['editar_produto'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome_produto = $_POST['nome_produto'];
        $valor_produto = $_POST['valor_produto'];
        $tipo_produto = $_POST['tipo_produto'];
        $foto_produto = $_POST['foto_produto'];
        $sttm = $conexao->prepare(" UPDATE tb_produto SET nome_produto=:nome_produto, valor_produto=:valor_produto, tipo_produto=:tipo_produto, foto_produto=:foto_produto WHERE id like $id");
        $sttm->bindParam(':nome_produto', $nome_produto);
        $sttm->bindParam(':valor_produto', $valor_produto);
        $sttm->bindParam(':tipo_produto', $tipo_produto);
        $sttm->bindParam(':foto_produto', $foto_produto);

      
        
        if ($sttm->execute()) {
            echo "
            <script language='javascript'>
                window.alert('Cliente editado com sucesso!');
            </script>";

            header ('Location: ../CadastrarProduto.php');
        


        } else {

            echo "
            <script language='javascript'>
            window.alert('Ocorreu um erro!');
            </script>";
        }

        /*
            
            $sttm = $conexao -> query('SELECT * FROM tb_cliente');
            $lista = $sttm -> fetchAll();
    
            echo "<pre>";
            print_r($lista);
            echo "</pre>";
            
            */
        }
} catch (PDOException $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
}
