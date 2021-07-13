<?php

session_start();

if(isset($_SESSION['cadastrofunc'])){
    unset($_SESSION['cadastrofunc']);
}

if (isset($_SESSION['admin'])) {

    echo $_SESSION['admin'] . ' - Administração';
} else if (isset($_SESSION['normal'])) {
    header("Location: TelaFuncionario.php");;
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}

include_once 'Codes/CadastroFuncionario.php';
$id = filter_input(INPUT_GET, 'id',   FILTER_SANITIZE_NUMBER_INT);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Css/EditarFuncionario.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Editar Funcionário</title>
</head>

<body>
    <?php

    $sttm = " SELECT * FROM tb_funcionario WHERE id = $id";

    $sttm_resultado = $conexao->prepare($sttm);

    $sttm_resultado->execute();

    $rowSttm = $sttm_resultado->fetch(PDO::FETCH_ASSOC);



    ?>
    <div class="container text-white p-5">
        <div class="row">
        <h1 class="display-4 text-center col-12 mt-4">Editar dados do funcionário</h1>
            <div class="col-md-12">
                <form action="Codes/EditarFuncionario.php" method="POST">
                    <div class="form-group">
                        <label for="nome_funcionario">Nome:</label>
                        <input class="form-control" type="text" name="nome_funcionario" value="<?php if (isset($rowSttm['nome_funcionario'])) {
                                                                                echo $rowSttm['nome_funcionario'];
                                                                            } ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input  type="hidden" name="id" value="<?php if (isset($rowSttm['id'])) {
                                                                    echo $rowSttm['id'];
                                                                } ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone_funcionario">Telefone:</label>
                        <input class="form-control" type="text" name="telefone_funcionario" value="<?php if (isset($rowSttm['telefone_funcionario'])) {
                                                                                    echo $rowSttm['telefone_funcionario'];
                                                                                } ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco_funcionario">Endereço:</label>
                        <input class="form-control" type="text" name="endereco_funcionario" value="<?php if (isset($rowSttm['endereco_funcionario'])) {
                                                                                    echo $rowSttm['endereco_funcionario'];
                                                                                } ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="funcao_funcionario">Função:</label>
                        <input class="form-control" type="text" name="funcao_funcionario" value="<?php if (isset($rowSttm['funcao_funcionario'])) {
                                                                                echo $rowSttm['funcao_funcionario'];
                                                                            } ?>" required>
                    </div>
                    <div class="form-group mt-5">
                        <input class="btn btn-block btn-info" type="submit" name="editar_funcionario" value="Editar Funcionário">
                        <a class="btn btn-primary btn-block" href="ListarFuncionario.php" role="button">Voltar</a>
                    </div>
                </form>
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