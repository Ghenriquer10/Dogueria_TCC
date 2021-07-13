<?php

$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';



// CRIANDO CONEXÃO NO MYSQL
$conexao = new PDO($dsn, $usuario, $senhaMysql);

try {
    if (isset($_POST['editar_cliente'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome_cliente = $_POST['nome_cliente'];
        $cpf_cliente = $_POST['cpf_cliente'];
        $telefone_cliente = $_POST['telefone_cliente'];
        $sttm = $conexao->prepare(" UPDATE tb_cliente SET nome_cliente=:nome_cliente, cpf_cliente=:cpf_cliente, telefone_cliente=:telefone_cliente WHERE id like $id");
        $sttm->bindParam(':nome_cliente', $nome_cliente);
        $sttm->bindParam(':cpf_cliente', $cpf_cliente);
        $sttm->bindParam(':telefone_cliente', $telefone_cliente);

      
        
        if ($sttm->execute()) {
            echo "
            <script language='javascript'>
                window.alert('Cliente editado com sucesso!');
            </script>";

            header ('Location: ../ListarCliente.php');
        


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
