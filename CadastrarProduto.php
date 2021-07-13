<?php

session_start();

if (isset($_SESSION['admin'])) {
    echo 'Bem vindo ' . $_SESSION['admin'] . ' - Administração';
} else if (isset($_SESSION['normal'])) {
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}

include_once 'Codes/CadastroProduto.php';

if (isset($_SESSION['cadastroproduto'])) {
    echo "
    <script language='javascript'>
        window.alert('Produto cadastrado com sucesso!');
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/CadastroProduto.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Cadastrar produto</title>

</head>

<body>
    <header>

    </header>
    <section>
        <div class="container text-center mt-3" style="border: 1px solid red;">
            <div class="row">
                <div class="produtos col-md-12">
                    <h1 class="display-4">Cadastrar produto</h1>
                    <?php

                    if (isset($_SESSION['dados'])) {
                        echo $_SESSION['dados'];
                        unset($_SESSION['dados']);
                    }
                    ?>
                    <form action="CadastrarProduto.php" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <label for="exampleInputEmail1">Nome do produto:</label>
                                <input type="text" class="form-control" id="exampleInputNomeProduto" placeholder="Nome produto" name="nome_produto" required>
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="exampleInputPassword1">Preço do produto:</label>
                                <input type="text" class="form-control" id="exampleInputPrecoProduto" placeholder="Ex.: 5.99" name="preco_produto" required>
                            </div>
                        </div>
                        <div class="row col-md-4 mt-4">
                            <label for=" exampleFormControlSelect1"></label>
                            <select name="tipo_produto" class="form-control" id="exampleFormControlSelect1" required>
                                <option value="">Tipo de produto</option>
                                <option value="Bebidas">Bebidas</option>
                                <option value="Lanches">Lanches</option>
                                <option value="Doces">Doces</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Adicionar foto ao produto:</label>
                                    <input type="text" class="form-control" id="exampleInputFoto" placeholder="Adicione uma URL com final .jpg" name="foto_produto">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info" value="Cadastrar produto">
                        <input type="hidden" name="env" value="cadastro">
                        <a class="btn btn-danger" href="TelaAdmin.php" role="button">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="container text-white text-center mt-5" style="border: 1px solid red; color: white;">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h1 class="display-3 text-center col-12">Produtos</h1>
                        <table class="table text-white text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Tipo</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                            </thead>

                            <?php
                            $listagem = $conexao->query('SELECT * FROM tb_produto');
                            $listagem->execute();
                            while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) :
                            ?>
                                <tr>
                                    <td>
                                        <h5 style="margin-top: 20px;">
                                            <?php echo $lista['id'] ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <img src="<?php echo $lista['foto_produto'] ?>" alt="" height="90px" width="90px">
                                    </td>
                                    <td>
                                        <h3 style="margin-top: 20px;">
                                            <?php echo $lista['nome_produto'] ?>
                                        </h3>
                                    </td>
                                    <td>
                                        <h3 style="margin-top: 20px;">
                                            R$: <?php echo number_format($lista['valor_produto'], 2) ?>
                                        </h3>
                                    </td>
                                    <td>
                                        <h3 style="margin-top: 20px;">
                                            <?php echo $lista['tipo_produto'] ?>
                                        </h3>
                                    </td>
                                    <td>
                                        <h3 style="margin-top: 20px;">
                                            <a class="ml-5 btn btn-primary" href='EditarProduto.php?id="<?php echo $lista['id'] ?>"' role="button"><i class="fas fa-pencil-alt"></i> Editar</a>
                                        </h3>
                                    </td>
                                    <td>
                                    <h3 style="margin-top: 20px;">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $lista['id'] ?>">
                                            Deletar
                                        </button>
                                    </h3>
                                        <div class="modal fade" id="exampleModal<?php echo $lista['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $lista['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel<?php echo $lista['id'] ?>">Atenção!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-danger">
                                                        <h3>Tem certeza que deseja excluir o produto: <?php echo $lista['nome_produto'] ?></h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                                        <a class="ml-3 btn btn-danger" href='Codes/ExcluirProduto.php?id="<?php echo $lista['id'] ?>"' role="button"><i class="fas fa-trash"></i> Deletar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <?php
    unset($_SESSION['cadastroproduto']);
    ?>
</body>

</html>