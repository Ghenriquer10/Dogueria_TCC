<?php

include_once 'CadastroProduto.php';


$id = filter_input(INPUT_GET, 'id',   FILTER_SANITIZE_NUMBER_INT);

$deletar = $conexao -> prepare("DELETE FROM tb_produto WHERE id = :id");
$deletar->bindValue(":id", $id);

if($deletar -> execute()){
    echo '<script type="text/javascript">window.location = "../CadastrarProduto.php"</script>';
} else {
    echo "Erro";
}




?>