<?php

$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';



// CRIANDO CONEXÃO NO MYSQL
$conexao = new PDO($dsn, $usuario, $senhaMysql);

try {
    if (isset($_POST['editar_funcionario'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome_funcionario = $_POST['nome_funcionario'];
        $telefone_funcionario = $_POST['telefone_funcionario'];
        $endereco_funcionario = $_POST['endereco_funcionario'];
        $funcao_funcionario = $_POST['funcao_funcionario'];
        $sttm = $conexao->prepare(" UPDATE tb_funcionario SET nome_funcionario=:nome_funcionario, telefone_funcionario=:telefone_funcionario, endereco_funcionario=:endereco_funcionario, funcao_funcionario=:funcao_funcionario WHERE id like $id");
        $sttm->bindParam(':nome_funcionario', $nome_funcionario);
        $sttm->bindParam(':telefone_funcionario', $telefone_funcionario);
        $sttm->bindParam(':endereco_funcionario', $endereco_funcionario);
        $sttm->bindParam(':funcao_funcionario', $funcao_funcionario);
        
      
        

        
        
        if ($sttm->execute()) {
            echo "
            <script language='javascript'>
                window.alert('Cliente editado com sucesso!');
            </script>";

            header ('Location: ../ListarFuncionario.php');
   
        
        


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
