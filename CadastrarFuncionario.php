<?php
session_start();

include_once 'Codes/CadastroFuncionario.php';
if (isset($_SESSION['admin'])) {

    echo 'Bem vindo ' . $_SESSION['admin'] . ' - Administração';
} else if (isset($_SESSION['normal'])) {

    header("Location: TelaFuncionario.php");
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}

if (isset($_SESSION['cadastrofunc'])) {
    echo "
    <script language='javascript'>
        window.alert('Funcionário cadastrado com sucesso!');
    </script>";
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="Css/CadastroFuncionario.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="cadastro col-md-10">
                    <h1 class="display-4 text-center text-white">Cadastrar funcionário</h1>
                    

                    <form action="CadastrarFuncionario.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNome">Nome</label>
                                <input type="text" class="form-control" id="inputNome" placeholder="Nome do funcionário" name="nome_funcionario" minlength="4" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLogin">Login</label>
                                <input type="text" class="form-control" id="inputLogin" placeholder="login que usará para entrar no sistema" minlength="4" name="login_funcionario" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Senha</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Min 4, max 10 caracteres" name="senha_funcionario" minlength="4" maxlength="10" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Telefone</label>
                            <input type="number" class="form-control" id="inputAddress" placeholder="Ex: 6199955684" name="telefone_funcionario" minlength="8" maxlength="15" required>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Endereço</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Endereço" name="endereco_funcionario" minlength="8" required>
                        </div>
                        <div class="row col-md-4 mt-4">
                            <label for=" exampleFormControlSelect1"></label>
                            <select name="funcao_funcionario" class="form-control" id="exampleFormControlSelect1" required>
                                <option value="">Função do Funcionario</option>
                                <option value="Caixa">Caixa</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Garçom">Garçom</option>
                                <option value="Gerente">Gerente</option>
                            </select>
                        </div>
                        <div class="row col-md-4 mt-4">
                            <label for=" exampleFormControlSelect3"></label>
                            <select name="tipo_funcionario" class="form-control" id="exampleFormControlSelect3" required>
                                <option value="">Tipo de Funcionario</option>
                                <option value="admin">Administrador</option>
                                <option value="func">Funcionario</option>
                            </select>
                        </div>
                        <div class="row col-md-12 m-1">
                            <input type="submit" class="btn btn-success mt-3 col-md-4" value="Cadastrar Funcionario">
                            <a class="btn btn-primary col-md-4 mt-3" href="ListarFuncionario.php" role="button">Lista de funcionários</a>
                            <a class="btn btn-danger col-md-4 mt-3" href="TelaAdmin.php" role="button">Voltar</a>
                        </div>
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