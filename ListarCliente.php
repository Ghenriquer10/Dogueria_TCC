<?php

include_once 'Codes/Cadastro_Cliente.php';
session_start();

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
    <link rel="stylesheet" href="Css/ListaFuncionario.css">
    <title>Listagem de Clientes</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <main>
        <section>
            <div class="container">
                <div class="row text-center">
                    <h1 class="display-3 text-center col-md-12 mt-5 mb-5">Clientes</h1>
                    <table class="table text-white text-center mb-5">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>Editar</th>
                            </tr>
                        </thead>

                        <?php
                        $listagem = $conexao->query('SELECT * FROM tb_cliente');
                        $listagem->execute();
                        while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                            <tr>
                                <td>
                                    <h4 style="margin-top: 20px;">
                                        <?php echo $lista['id'] ?>
                                    </h4>
                                </td>
                                <td>
                                    <h4 style="margin-top: 20px;">
                                        <?php echo $lista['nome_cliente'] ?>
                                    </h4>
                                </td>
                                <td>
                                    <h4 style="margin-top: 20px;">
                                        <?php echo $lista['telefone_cliente'] ?>
                                    </h4>
                                </td>
                                <td>
                                    <h4 style="margin-top: 20px;">
                                        <?php echo $lista['cpf_cliente'] ?>
                                    </h4>
                                </td>
                                <td>
                                    <h4 style="margin-top: 20px;">
                                        <a class="ml-5 btn btn-primary" href='EditarCliente.php?id="<?php echo $lista['id'] ?>"' role="button"><i class="fas fa-pencil-alt"></i> Editar</a>
                                    </h4>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </table>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center mb-5">
                            <a class="btn btn-primary col-md-4" href="TelaAdmin.php" role="button">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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