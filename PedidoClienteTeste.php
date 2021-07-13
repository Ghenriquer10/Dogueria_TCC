<?php

session_start();

if (isset($_SESSION['admin'])) {
	' - Administração';
} else if (isset($_SESSION['normal'])) {
} else {
	echo '<script type="text/javascript">window.location = "index.php"</script>';
}

include_once 'Codes/CadastroProduto.php';

if (isset($_POST["add_to_cart"])) {
	if (isset($_SESSION["shopping_cart"])) {
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if (!in_array($_GET["id"], $item_array_id)) {
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		} else {
			echo '<script>alert("Produto já adicionado")</script>';
		}
	} else {
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "delete") {
		foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			if ($values["item_id"] == $_GET["id"]) {
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="PedidoClienteTeste.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Carrinho de compras</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="Css/PedidoClienteTeste.css">
</head>

<body>
	<br />
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">

				<?php
				$query = "SELECT * FROM tb_produto ORDER BY id ASC";
				$result = $conexao->query($query);
				if ($result->rowCount() > 0) {
					while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				?>
						<div class="col-md-4">
							<form method="post" action="PedidoClienteTeste.php?action=add&id=<?php echo $row["id"]; ?>">
								<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
									<img src="images/<?php echo $row["imagem_produto"]; ?>" class="img-responsive" /><br />

									<h4 class="text-info"><?php echo $row["nome_produto"]; ?></h4>

									<h4 class="text-danger">$ <?php echo $row["valor_produto"]; ?></h4>

									<input type="text" name="quantity" value="1" class="form-control" />

									<input type="hidden" name="hidden_name" value="<?php echo $row["nome_produto"]; ?>" />

									<input type="hidden" name="hidden_price" value="<?php echo $row["valor_produto"]; ?>" />

									<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

								</div>
							</form>
						</div>
				<?php
					}
				}
				?>

			</div>

			<div class=" carrinho col-sm-4">

				<h3>Order Details</h3>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th width="40%">Item Name</th>
							<th width="10%">Quantity</th>
							<th width="20%">Price</th>
							<th width="15%">Total</th>
						</tr>
						<?php
						if (!empty($_SESSION["shopping_cart"])) {
							$total = 0;
							foreach ($_SESSION["shopping_cart"] as $keys => $values) {
						?>
								<tr>
									<td><?php echo $values["item_name"]; ?></td>
									<td><?php echo $values["item_quantity"]; ?></td>
									<td>$ <?php echo $values["item_price"]; ?></td>
									<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
								</tr>
							<?php
								$total = $total + ($values["item_quantity"] * $values["item_price"]);
							}
							?>
							<tr>
								<td colspan="3" align="right">Total</td>
								<td align="right">$ <?php echo number_format($total, 2); ?></td>
								<td></td>
							</tr>
						<?php
						}
						?>

					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>