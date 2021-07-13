<?php

include_once 'Codes/CadastroFuncionario.php';
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
    <title>Listagem de funcionário</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<body>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="titulo col-md-12">
                        <h1 class="display-3 text-center">Funcionários</h1>
                        <table class="table text-white text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Função</th>
                                    <th>Endereço</th>
                                    <th>Deletar</th>
                                    <th>Deletar</th>
                                </tr>
                            </thead>

                            <?php
                            $listagem = $conexao->query('SELECT * FROM tb_funcionario');
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
                                            <?php echo $lista['nome_funcionario'] ?>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 style="margin-top: 20px;">
                                            <?php echo $lista['telefone_funcionario'] ?>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 style="margin-top: 20px;">
                                            <?php echo $lista['funcao_funcionario'] ?>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 style="margin-top: 20px;">
                                            <?php echo $lista['endereco_funcionario'] ?>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 style="margin-top: 20px;">
                                            <a class="ml-5 btn btn-primary" href='EditarFuncionario.php?id="<?php echo $lista['id'] ?>"' role="button"><i class="fas fa-pencil-alt"></i> Editar</a>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 style="margin-top: 20px;">
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $lista['id'] ?>">
                                                Deletar
                                            </button>
                                        </h4>
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
                                                        Tem certeza que deseja excluir o funcionário <?php echo $lista['nome_funcionario'] ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                                        <a class="ml-3 btn btn-danger" href='Codes/ExcluirFuncionario.php?id="<?php echo $lista['id'] ?>"' role="button"><i class="fas fa-trash"></i>Deletar!</a>
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
                <div class="row col-md-12">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center mb-5">
                            <a class="btn btn-primary col-md-4" href="CadastrarFuncionario.php" role="button">Voltar</a>
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
    <script src="Javascript/script.js"></script>
</body>

</html>