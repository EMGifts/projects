<!DOCTYPE>

<?php

session_start();
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=i_gifts', 'eunice', 'eunice');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}

if(isset($_GET['edit_pro'])){

	$get_Code = $_GET['edit_pro'];


	$sql = "SELECT * FROM products where productCode = '$get_Code'";

			$s = $pdo->prepare($sql);

		 $s->bindValue(':categoryID', $_POST['categoryID']);
		 $s->bindValue(':productCode', $_POST['productCode']);
		 $s->bindValue(':productName', $_POST['productName']);
		 $s->bindValue(':description', $_POST['description']);
		 $s->bindValue(':listPrice', $_POST['listPrice']);
		 $s->bindValue(':discountPercent', $_POST['discountPercent']);
		 $s->execute();
		 $i = 0;
		 while ($row = $s->fetch(PDO::FETCH_ARRAY)){

		$categoryID = $_POST['categoryID'];
		$productCode = $_POST['productCode'];
		$productName = $_POST['productName'];
		$description = $_POST['description'];
		$listPrice = $_POST['listPrice'];



		$sql = "SELECT * FROM categories where categoryID = '$categoryID'";

		$s->execute();


		$categoryName = $_POST['categoryName'];


}
?>
<html>
	<head>
		<title>Update Product</title>
	</head>

<body>


	<form action="" method="post" enctype="multipart/form-data">

		<table align="center" width="795" border="2" bgcolor="#187eae">

			<tr align="center">
				<td colspan="7"><h2>Update Products</h2></td>
			</tr>

			<tr>
				<td align="right"><b>Product Name:</b></td>
				<td><input type="text" name="productName" size="60" value="<?php echo $productName;?>"/></td>
			</tr>

			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="categoryName" >
					<option><?php echo $categoryName; ?></option>
					<?php
		$sql = "SELECT * FROM categories";

		$s->execute();


		$categoryName = $_POST['categoryName'];
		$categoryID = $_POST['categoryID'];

		echo "<option value='$categoryID'>$categoryName</option>";






}


					?>
				</select>


				</td>
			</tr>

			<tr>


		</table>


	</form>


</body>
</html>
<?php

	if(isset($_POST['update_product'])){

		//getting the text data from the fields
		if(isset($_POST['insert_product'])){

		//getting the text data from the fields
	//	$categoryID = $_GET['categoryID'];
	//	$productCode = $_GET['productCode'];
	//	$productName = $_GET['productName'];
	//	$description = $_GET['description'];
	//	$listPrice = $_GET['listPrice'];
	//	$discountPercent = $_POST['discountPercent'];



		$categoryID = $_POST(['categoryID']);
		$productCode = $_POST(['productCode']);
		$productName = $_POST(['productName']);
		$description = $_POST(['description']);
		$listPrice = $_POST(['listPrice']);
		$discountPercent = $_POST(['discountPercent']);


		 $update_product =
		 "UPDATE products SET categoryID='$categoryID', productCode='$productCode',productName='$productName',description='$description',listPrice='$listPrice',discountPercent='$discountPercent'
		 where product_id='$product_id'";

		$s->execute();

		 echo "<script>alert('Product has been updated!')</script>";

		// echo "<script>window.open('index.php?view_products','_self')</script>";

		 }
	}








?>
