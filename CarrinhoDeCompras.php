<?php

session_start();

if (isset($_SESSION['admin'])) {
    
} else if (isset($_SESSION['normal'])) {
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}



$dsn = 'mysql:host=localhost;port=3307;dbname=db_dogueria';
$usuario = 'root';
$senhaMysql = 'root';
$conexao = new PDO($dsn, $usuario, $senhaMysql);

if (isset($_POST['add_to_cart'])) {

    if (isset($_SESSION['cart'])) {

        $session_array_id = array_column($_SESSION['cart'], "id");

        if (!in_array($_GET['id'], $session_array_id)) {

            $session_array = array(
                'id' => $_GET['id'],
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity']
            );

            $_SESSION['cart'][] = $session_array;
        }
    } else {
        $session_array = array(
            'id' => $_GET['id'],
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "quantity" => $_POST['quantity']
        );

        $_SESSION['cart'][] = $session_array;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/CarrinhoDeCompras.css">
    <title>Carrinho</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    <?php

        if(isset($_SESSION['id_cliente'])){
            $id_cliente = $_SESSION['id_cliente'];
            
        } else {
            echo '<script type="text/javascript">window.location = "CadastrarCliente.php"</script>';
        }
    

    ?>
    <div class="container-fluid text-white p-5" style="margin-top: 0px;">
        <div class="display-1 text-center text-white col-md-12" style="border-radius: 10px; font-weight: 900; border: solid 1px red; background-color: darkorange;">Seu Pedido</div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <h1 class="display-5 text-white text-center mt-3 col-md-12">Produtos</h1>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" style="font-size: 2em; color: red;" id="lanches-tab" data-toggle="tab" href="#lanches" role="tab" aria-controls="lanches" aria-selected="true">Lanches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 2em; color: red;" id="bebidas-tab" data-toggle="tab" href="#bebidas" role="tab" aria-controls="bebidas" aria-selected="false">Bebidas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 2em; color: red;" id="doces-tab" data-toggle="tab" href="#doces" role="tab" aria-controls="doces" aria-selected="false">Doces</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="lanches" role="tabpanel" aria-labelledby="lanches-tab">
                            <ul style="color: white; margin-left: 50px; margin-top: 30px;">

                                <?php
                                $listagem = $conexao->prepare("SELECT * FROM tb_produto WHERE tipo_produto like 'Lanches'");
                                $listagem->execute();
                                while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <li style="display: block; float: left;">
                                        <div class="col-md-12">
                                            <form method="post" action="CarrinhoDeCompras.php?id=<?= $lista['id'] ?>">
                                                <img src="<?php echo $lista['foto_produto'] ?>" alt="" height="150px" width="200px" style="border-radius: 10px; border: 1px solid white;"> 
                                                <h5 class="text-center"><?= $lista['nome_produto'] ?></h5>
                                                <h5 class="text-center"><?= number_format($lista['valor_produto'], 2) ?></h5>
                                                <input type="hidden" name="name" value="<?= $lista['nome_produto'] ?>">
                                                <input type="hidden" name="price" value="<?= $lista['valor_produto'] ?>">
                                                <input type="number" name="quantity" value="1" class="form-control">
                                                <input type="submit" name="add_to_cart" class="btn btn-warning text-white btn-block my-2" value="Adcionar ao carrinho">
                                            </form>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="bebidas" role="tabpanel" aria-labelledby="bebidas-tab">
                            <ul style="color: white; margin-left: 50px; margin-top: 30px;">
                            <?php
                                $listagem = $conexao->prepare("SELECT * FROM tb_produto WHERE tipo_produto like 'Bebidas'");
                                $listagem->execute();
                                while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <li style="display: block; float: left;">
                                        <div class="col-md-12">
                                            <form method="post" action="CarrinhoDeCompras.php?id=<?= $lista['id'] ?>">
                                                <img src="<?php echo $lista['foto_produto'] ?>" alt="" height="150px" width="200px"> 
                                                <h5 class="text-center"><?= $lista['nome_produto'] ?></h5>
                                                <h5 class="text-center"><?= number_format($lista['valor_produto'], 2) ?></h5>
                                                <input type="hidden" name="name" value="<?= $lista['nome_produto'] ?>">
                                                <input type="hidden" name="price" value="<?= $lista['valor_produto'] ?>">
                                                <input type="number" name="quantity" value="1" class="form-control">
                                                <input type="submit" name="add_to_cart" class="btn btn-warning text-white btn-block my-2" value="Adcionar ao carrinho">
                                            </form>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>

                        </div>
                        <div class="tab-pane fade" id="doces" role="tabpanel" aria-labelledby="doces-tab">
                            <ul style="color: white; margin-left: 50px; margin-top: 30px;">
                            <?php
                                $listagem = $conexao->prepare("SELECT * FROM tb_produto WHERE tipo_produto like 'Doces'");
                                $listagem->execute();
                                while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <li style="display: block; float: left;">
                                        <div class="col-md-12">
                                            <form method="post" action="CarrinhoDeCompras.php?id=<?= $lista['id'] ?>">
                                                <img src="<?php echo $lista['foto_produto'] ?>" alt="" height="150px" width="200px"> 
                                                <h5 class="text-center"><?= $lista['nome_produto'] ?></h5>
                                                <h5 class="text-center"><?= number_format($lista['valor_produto'], 2) ?></h5>
                                                <input type="hidden" name="name" value="<?= $lista['nome_produto'] ?>">
                                                <input type="hidden" name="price" value="<?= $lista['valor_produto'] ?>">
                                                <input type="number" name="quantity" value="1" class="form-control">
                                                <input type="submit" name="add_to_cart" class="btn btn-warning text-white btn-block my-2" value="Adcionar ao carrinho">
                                            </form>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Itens selecionados</h2>
                <?php

                $total = 0;

                $output = "";
                $output .= "
                            <table class='table table-bordered table-striped'>
                                <tr>
                                    <th class= 'text-white text-center'>ID</th>
                                    <th class= 'text-white text-center'>Nome</th>
                                    <th class= 'text-white text-center'>Preço</th>
                                    <th class= 'text-white text-center'>Quantidade</th>
                                    <th class= 'text-white text-center'>Preço total</th>
                                    <th class= 'text-white text-center'>Ações</th>
                                </tr>
                        ";

                if (!empty($_SESSION['cart'])) {
                    $_SESSION['dados'] = array();
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $output .= "
                                    <tr>
                                        <td class= 'text-white text-center'>" . $value['id'] . "</td>
                                        <td class= 'text-white text-center'>" . $value['name'] . "</td>
                                        <td class= 'text-white text-center'>" . $value['price'] . "</td>
                                        <td class= 'text-white text-center'>" . $value['quantity'] . "</td>
                                        <td class= 'text-white text-center'>R$ " . number_format($value['price'] * $value['quantity'], 2) . "</td>
                                        <td class= 'text-white text-center'>
                                            <a href='CarrinhoDeCompras.php?action=remove&id=" . $value['id'] . "'>
                                            <button class='btn btn-danger btn-block'>Remover</button>
                                            </a>

                                        </td>
                                ";

                        $total =  $total + ($value['quantity'] * $value['price']);
                        array_push(
                            $_SESSION['dados'],
                            array(
                                'id_pedido' => $value['id'],
                                'quantidade_produto' => $value['quantity'],
                                'id_cliente' => $id_cliente,
                                'valor_produto' => $value['price'],
                                'total_produto' => $value['price'] * $value['quantity']
                            )
                        );
                    }
                    $output .= "
                                <tr>
                                <td colspan='3'></td>
                                <td class= 'text-white text-center'><b>Valor total do pedido</b></td>
                                <td class= 'text-white text-center'>" . number_format($total, 2) . "</td>
                                <td>
                                <a href='CarrinhoDeCompras.php?action=clearall'>
                                <button class='btn btn-warning btn-block'>Limpar Tudo</button>
                                </a>
                                </td>
                                </tr>
                                <tr>
                                <a href='Codes/FinalizarPedido.php' style='text-decoration:none;'>
                                <button style='font-size: 3em;' class='btn btn-success btn-block'>Finalizar</button>
                                </a>
                                </tr>
                                
                                ";
                }
                echo $output;
                ?>
                
            </div>
        </div>

    </div>

    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "clearall") {
            unset($_SESSION['cart']);
            unset($_SESSION['dados']);
        }

        if ($_GET['action'] == 'remove') {


            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    unset($_SESSION['dados']);
                }
            }
        }
    }

    ?>




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