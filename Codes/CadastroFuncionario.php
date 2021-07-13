<?php

$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';



// CRIANDO CONEXÃO NO MYSQL
$conexao = new PDO($dsn, $usuario, $senhaMysql);

try {
    if (isset($_POST['nome_funcionario']) && isset($_POST['login_funcionario']) && isset($_POST['senha_funcionario']) && isset($_POST['telefone_funcionario']) && isset($_POST['endereco_funcionario']) && isset($_POST['funcao_funcionario']) && isset($_POST['tipo_funcionario'])) {
        $nome_funcionario = $_POST['nome_funcionario'];
        $senha_funcionario = $_POST['senha_funcionario'];
        $login_funcionario = $_POST['login_funcionario'];

        if ($conexao->query("select count(*) from tb_funcionario where login_funcionario = '{$login_funcionario}'")->fetchColumn() <= 0) {
            
            $telefone_funcionario = $_POST['telefone_funcionario'];
            $endereco_funcionario = $_POST['endereco_funcionario'];
            $funcao_funcionario = $_POST['funcao_funcionario'];
            $tipo_funcionario = $_POST['tipo_funcionario'];

            $sttm = $conexao->prepare('INSERT INTO tb_funcionario (nome_funcionario, login_funcionario, senha_funcionario, telefone_funcionario, endereco_funcionario, funcao_funcionario, tipo_funcionario) VALUES (:nome_funcionario , :login_funcionario, :senha_funcionario, :telefone_funcionario, :endereco_funcionario, :funcao_funcionario, :tipo_funcionario)');
            $sttm->bindParam(':nome_funcionario', $nome_funcionario);
            $sttm->bindParam(':login_funcionario', $login_funcionario);
            $sttm->bindParam(':senha_funcionario', $senha_funcionario);
            $sttm->bindParam(':telefone_funcionario', $telefone_funcionario);
            $sttm->bindParam(':endereco_funcionario', $endereco_funcionario);
            $sttm->bindParam(':funcao_funcionario', $funcao_funcionario);
            $sttm->bindParam(':tipo_funcionario', $tipo_funcionario);
            $sttm->execute();
            echo "Sucesso";
            $_SESSION['cadastrofunc'] = "Sucesso";
            header('Location: CadastrarFuncionario.php');
        } else {
            echo "
            <script language='javascript'>
                window.alert('Ops! Funcionário já existe!');
            </script>";
        }
    }
} catch (PDOException $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
}
