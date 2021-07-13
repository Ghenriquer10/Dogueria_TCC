<?php

include_once 'Codes/Cadastro_cliente.php';

session_start();
if(isset($_SESSION['senha'])){
    unset($_SESSION['senha']);
}
if (isset($_SESSION['admin'])) {
    echo 'Bem vindo ' . $_SESSION['admin'] . ' - Administração';
} else if (isset($_SESSION['normal'])) {
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}

if (isset($_POST['ja_cadastrado'])) {

    $cpf_cliente_cadastrado = $_POST['ja_cadastrado'];

    if ($conexao->query("select count(*) from tb_cliente where cpf_cliente = '{$cpf_cliente_cadastrado}'")->fetchColumn() <= 0) {

        echo "
        <script language='javascript'>

            alert('Ops! Você não possui conta!');
            
        </script>";

        /*
        
        $sttm = $conexao -> query('SELECT * FROM tb_cliente');
        $lista = $sttm -> fetchAll();

        echo "<pre>";
        print_r($lista);
        echo "</pre>";
        
        */
    } else {

        $cpf_cliente_cadastrado = $_POST['ja_cadastrado'];

        $listagem = $conexao->query("SELECT id FROM tb_cliente WHERE cpf_cliente = '{$cpf_cliente_cadastrado}'");

        $listagem->execute();
        $lista = $listagem->fetch(PDO::FETCH_ASSOC);
        print_r($lista['id']);
        $_SESSION['id_cliente'] = $lista['id'];

        header("Location: CarrinhoDeCompras.php");
        //Tratar o erro aqui        
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/cadastro_cliente.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Cadastro Cliente</title>
</head>

<body>
    <main>

        <div class="container mt-5 text-white">
            <div class="row text-center mt-5">
                <div class="cadastrar col-md-12">
                    <h1>Bem vindo a nossa Dogueria</h1>
                    <p>Caro cliente, caso ainda não tenha cadastro, cadastre-se aqui:</p>
                    <form action="CadastrarCliente.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputNome">Entre com seu nome:</label>
                            <input type="text" class="form-control" id="exampleInputNome" placeholder="Seu nome" name="nome_cliente" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCpf">Seu CPF:</label>
                            <input type="number" class="form-control" id="exampleInputCpf" placeholder="Apenas números" name="cpf_cliente" minlength="11" maxlength="11" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTelefone">Seu Telefone:</label>
                            <input type="number" class="form-control" id="exampleInputTelefone" placeholder="Apenas números" name="telefone_cliente" minlength="8" maxlength="12" required>
                        </div>
                        <button type="submit" class="btn btn-success mb-4">Cadastrar-se</button>
                    </form>
                </div>
            </div>
            <div class="row text-center mt-5 mb-5">
                <div class="cadastrado col-md-12 mt-4">
                    <p>Caso já tenha cadastro, apenas insira seu cpf:</p>
                    <form action="CadastrarCliente.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputCpf">Seu CPF:</label>
                            <input type="number" class="form-control" id="exampleInputCpf" placeholder="Apenas números" name="ja_cadastrado" minlength="11" maxlength="11" required>
                        </div>
                        <button type="submit" class="btn btn-success mb-4">Realizar pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>