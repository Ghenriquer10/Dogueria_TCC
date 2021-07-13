<?php

session_start();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Principal</title>
    <link rel="stylesheet" href="Css/index.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <main>
        <div class="cadastro" style="margin-top: 150px;">
            <div style="margin-top: -100px; text-align: center; border-radius: 30px;">
                <img src="dogueria.png" alt="" style="border-radius: 30px;">
            </div>
            <h1 class="text-white display-4">Entrar</h1>
            <?php
            if (isset($_SESSION['invalido'])) {
                echo $_SESSION['invalido'];
                unset($_SESSION['invalido']);
            }
            ?>
            <div class="dados col-12" style="margin-top:-10px; margin-left: 105px;">
                <form action="Codes/login.php" method="POST" class="form-group">

                    <input class="form-control" type="text" placeholder="Login" name="login">
                    <input class="form-control" type="password" placeholder="Senha" name="senha">
                    <br>
                    <button type="submit" class="btn btn-danger btn-block mt-5">Entrar</button>
                    
                </form>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>