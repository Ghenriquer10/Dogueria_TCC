<?php

$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';



// CRIANDO CONEXÃO NO MYSQL
$conexao = new PDO($dsn, $usuario, $senhaMysql);

try {
    if (isset($_POST['nome_cliente']) && isset($_POST['cpf_cliente']) && isset($_POST['telefone_cliente'])) {

        $nome_cliente = $_POST['nome_cliente'];
        $cpf_cliente = $_POST['cpf_cliente'];

        if ($conexao->query("select count(*) from tb_cliente where cpf_cliente = '{$cpf_cliente}'")->fetchColumn() <= 0) {

            echo "
            <script language='javascript'>
                window.alert('Cliente cadastrado com sucesso!');
            </script>";
            $telefone_cliente = $_POST['telefone_cliente'];
            $sttm = $conexao->prepare('INSERT INTO tb_cliente (nome_cliente, cpf_cliente, telefone_cliente) VALUES (:nome_cliente , :cpf_cliente, :telefone_cliente)');
            $sttm->bindParam(':nome_cliente', $nome_cliente);
            $sttm->bindParam(':cpf_cliente', $cpf_cliente);




            $sttm->bindParam(':telefone_cliente', $telefone_cliente);
            $sttm->execute();

            /*
            
            $sttm = $conexao -> query('SELECT * FROM tb_cliente');
            $lista = $sttm -> fetchAll();
    
            echo "<pre>";
            print_r($lista);
            echo "</pre>";
            
            */
        } else {
            echo "
            <script language='javascript'>
                window.alert('Ops! Cliente já existe ou CPF inválido!');
            </script>";
            //Tratar o erro aqui        
        }
    }
} catch (PDOException $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
}

