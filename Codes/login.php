<?php

session_start();

$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';

try {

   // CRIANDO CONEXÃO NO MYSQL
   $conexao = new PDO($dsn, $usuario, $senhaMysql);

   if (isset($_POST['login']) && isset($_POST['senha'])) {
      $login = $_POST['login'];
      $senha = $_POST['senha'];

      $query = "SELECT * FROM tb_funcionario WHERE login_funcionario='" . $login . "' AND senha_funcionario='" . $senha . "'";

      //Com o query realizamos consultas

      $stmt = $conexao->query($query);
      //Com esse comando temos uma melhor view do select*from
      $resultado = $stmt->rowCount();



      if ($resultado == 1) {

         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $adm = $row['tipo_funcionario'];
            $nome = $row['nome_funcionario'];

            session_start();

            if ($adm == "admin") {

               $_SESSION['admin'] = $nome;
               echo $nome;
               header("Location: ../TelaAdmin.php");
               
            } else {
               
               $_SESSION['normal'] = $nome;
               echo $nome;
               header("Location: ../TelaFuncionario.php");
               

            }


         }
      } else if ($resultado == 0) {
         $_SESSION['invalido'] = "<h3 style='color: red; text-align: center;'>Usuário não encontrado</h3>";
         header("Location: ../index.php");
      }
   };
} catch (PDOException $e) {
   echo '<pre>';
   print_r($e);
   echo '</pre>';
}
