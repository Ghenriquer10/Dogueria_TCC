<?php
session_start();
unset($_SESSION['id_cliente']);
unset($_SESSION['dados']);
unset($_SESSION['cart']);
if (isset($_SESSION['admin'])) {
    echo 'Bem vindo ' . $_SESSION['admin'] . ' - Administração';
} else if (isset($_SESSION['normal'])) {
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}
include_once 'Codes/CadastroProduto.php';
if (isset($_SESSION['senha'])) {
    $senha = $_SESSION['senha'];
} else {
    echo '<script type="text/javascript">window.location = "CadastrarCliente.php"</script>';
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/PedidoRealizado.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Sucesso</title>
    <script>
        function voltaMenu() {
            setTimeout(function() {
                window.location = "http://localhost/Sistema%20Dogueria/CadastrarCliente.php"
            }, 5000);
        }
    </script>
</head>

<body onload="voltaMenu()">>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-3 text-center text-success">Pedido realizado com sucesso!</h1>
                <p>Realize o pagamento no caixa para confirmar seu pedido</p>

                <h1 class="display-1 text-success text-center">Senha: <?php echo $senha ?></h1>

            </div>
        </div>
    </div>
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