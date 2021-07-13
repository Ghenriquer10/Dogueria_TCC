<?php

session_start();

if(isset($_SESSION['cadastrofunc'])){
    unset($_SESSION['cadastrofunc']);
}

if (isset($_SESSION['admin'])) {

    echo 'Bem vindo ' . $_SESSION['admin'] . ' - Administração';
} else if (isset($_SESSION['normal'])) {
    header("Location: TelaFuncionario.php");;
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/admin.css">
    <title>Administrador</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="admin col-md-12 text-center mt-5">
                <?php
                
                echo '<h3 style="color: white; text-align: center; margin-top: 20px;">Bem Vindo '.$_SESSION['admin'] .' - Administração </h3>;';
                
                ?>
                    <h1 class="display-4 text-white">Administração</h1>
                    <a class="btn btn-primary btn-lg btn-block mt-5" href="CadastrarFuncionario.php" role="button">Funcionários</a>
                    <a class="btn btn-primary btn-lg btn-block mt-5" href="CadastrarProduto.php" role="button">Cadastrar/Adcionar/Alterar/Excluir produtos</a>
                    <a class="btn btn-primary btn-lg btn-block mt-5" href="ListarCliente.php" role="button">Lista de clientes</a>
                    <a class="btn btn-primary btn-lg btn-block mt-5" href="ListarPedidos.php" role="button">Listar Pedidos</a>
                    <a class="btn btn-primary text-white btn-lg btn-block mt-5" onclick=" window.open('CadastrarCliente.php','_blank')" role="button">Abrir tela de vendas</a>
                    <button type="button" class="btn btn-danger m-5"><a href="sair.php" style="color: white;">Sair do sistema</a></button>
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