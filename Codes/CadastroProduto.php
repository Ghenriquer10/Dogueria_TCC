<?php
$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';

try {

    // CRIANDO CONEXÃO NO MYSQL
    $conexao = new PDO($dsn, $usuario, $senhaMysql);

    try {

        
        
        if(isset($_POST['env']) && $_POST['env'] == "cadastro"){

            $cadastro = array($_POST['nome_produto'], $_POST['preco_produto'], $_POST['tipo_produto'], $_POST['foto_produto']);

            $sttm = $conexao -> prepare('INSERT INTO tb_produto (nome_produto, valor_produto, tipo_produto, foto_produto) VALUES (:nome_produto , :preco_produto, :tipo_produto, :foto_produto)');
                
                $sttm -> execute(array(':nome_produto' => $cadastro[0], ':preco_produto' => $cadastro[1], ':tipo_produto' => $cadastro[2], ':foto_produto' => $cadastro[3]));
                $_SESSION['cadastroproduto'] = "Sucesso";

                
            
        } else {
            
        }
        
    } catch (PDOException $e) {
        echo 'Erro: '  . $e -> getCode(). '  Mensagem  ' .$e ->getMessage();
    }
    

    
} catch (PDOException $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
}
