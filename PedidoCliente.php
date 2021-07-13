<?php 

session_start();

include_once 'Codes/CadastroProduto.php';

if (isset($_SESSION['admin'])) {

    echo 'Bem vindo ' . $_SESSION['admin'] . ' - Administração';
} else if (isset($_SESSION['normal'])) {
    header("Location: TelaFuncionario.php");
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}

$id = filter_input(INPUT_GET, 'id',   FILTER_SANITIZE_NUMBER_INT);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/PedidoCliente.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Pedidos</title>
</head>

<body>
    <header>

    </header>

    <main class="principal">
        <section>
            <div class="carrinho container float-left col-md-4 mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4 text-white text-center mt-3">Seu carrinho de compras</h1>
                        <form action="">

                        <ul style="color: white; margin-left: 50px; margin-top: 30px;">
                                <?php
                                $listagem = $conexao->prepare("SELECT * FROM tb_produto WHERE tipo_produto = 'Lanches'");
                                $listagem->execute();
                                while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) :
                                    ?>
                                    <li style="margin-top: 30px;">
                                    
                                            <?php echo $lista['id'] ?> - <span>Nome:</span> <?php echo $lista['nome_produto'] ?> - 
                                            <span>Valor: R$:</span> <?php echo $lista['valor_produto'] ?> - 
                                            <span>Tipo: </span> <?php echo $lista['tipo_produto'] ?><a class="ml-5 btn btn-primary" href='PedidoCliente.php?id="<?php echo $lista['id'] ?>"' role="button"><i class="fas fa-pencil-alt"></i> Adicionar</a> 
                                    </li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                            <div class="total input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-info" id="inputGroup-sizing-lg">Total:</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="row mt-3">
                                <button type="submit" class="btn btn-primary col-md-4 ml-5 mr-5">Finalizar Pedido</button>
                                <a class="btn btn-danger" href="CadastrarCliente.php" role="button">Cancelar Pedido</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="produtos container float-right col-md-8 mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4 text-white text-center mt-3 col-md-12">Produtos</h1>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="lanches-tab" data-toggle="tab" href="#lanches" role="tab" aria-controls="lanches" aria-selected="true">Lanches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bebidas-tab" data-toggle="tab" href="#bebidas" role="tab" aria-controls="bebidas" aria-selected="false">Bebidas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="doces-tab" data-toggle="tab" href="#doces" role="tab" aria-controls="doces" aria-selected="false">Doces</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="lanches" role="tabpanel" aria-labelledby="lanches-tab">
                            <ul style="color: white; margin-left: 50px; margin-top: 30px;">
                                <?php
                                $listagem = $conexao->prepare("SELECT * FROM tb_produto WHERE tipo_produto like 'Lanches'");
                                $listagem->execute();
                                while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) :
                                    ?>
                                    <li style="margin-top: 30px;">
                                            <?php echo $lista['id'] ?> - <span>Nome:</span> <?php echo $lista['nome_produto'] ?> - 
                                            <span>Valor: R$:</span> <?php echo $lista['valor_produto'] ?> - 
                                            <span>Tipo: </span> <?php echo $lista['tipo_produto'] ?><a class="ml-5 btn btn-primary" role="button"><i class="fas fa-pencil-alt"></i> Adicionar</a> 
                                    </li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                            </div>
                            <div class="tab-pane fade" id="bebidas" role="tabpanel" aria-labelledby="bebidas-tab">
                                <ul style="color: white; margin-left: 50px; margin-top: 30px;">
                                    <?php
                                    $listagem = $conexao->prepare("SELECT * FROM tb_produto WHERE tipo_produto like 'Bebidas'");
                                    $listagem->execute();
                                    while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) :
                                        ?>
                                        <li style="margin-top: 30px;">
                                                <?php echo $lista['id'] ?> - <span>Nome:</span> <?php echo $lista['nome_produto'] ?> - 
                                                <span>Valor: R$:</span> <?php echo $lista['valor_produto'] ?> - 
                                                <span>Tipo: </span> <?php echo $lista['tipo_produto'] ?><a class="ml-5 btn btn-primary"  role="button"><i class="fas fa-pencil-alt"></i> Adicionar</a> 
                                        </li>
                                    <?php
                                    endwhile;
                                    ?>
                                </ul>
                                
                            </div>
                            <div class="tab-pane fade" id="doces" role="tabpanel" aria-labelledby="doces-tab">
                            <ul style="color: white; margin-left: 50px; margin-top: 30px;">
                                    <?php
                                    $listagem = $conexao->prepare("SELECT * FROM tb_produto WHERE tipo_produto like 'Doces'");
                                    $listagem->execute();
                                    while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) :
                                        ?>
                                        <li style="margin-top: 30px;">
                                                <?php echo $lista['id'] ?> - <span>Nome:</span> <?php echo $lista['nome_produto'] ?> - 
                                                <span>Valor: R$:</span> <?php echo $lista['valor_produto'] ?> - 
                                                <span>Tipo: </span> <?php echo $lista['tipo_produto'] ?><a class="ml-5 btn btn-primary"  role="button"><i class="fas fa-pencil-alt"></i> Adicionar</a> 
                                        </li>
                                    <?php
                                    endwhile;
                                    ?>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>


    </main>

    <footer>

    </footer>
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