<?php

//include("includes/db.inc.php");

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

	if(isset($_POST['insert_product'])){

		//getting the text data from the fields
		$categoryID = $_GET['categoryID'];
		$productCode = $_GET['productCode'];
		$productName = $_GET['productName'];
		$description = $_GET['description'];
		$listPrice = $_GET['listPrice'];
		$discountPercent = $_POST['discountPercent'];

		//getting the image from the field
	//	$product_image = $_FILES['product_image']['name'];
	//	$product_image_tmp = $_FILES['product_image']['tmp_name'];

	//	move_uploaded_file($product_image_tmp,"product_images/$product_image");

		 $insert_product = "INSERT INTO products (categoryID,productCode,productName,description,listPrice,discountPercent) values ('$categoryID','$productCode','$productName','$description','$listPrice','$discountPercent')";

		 $s = $pdo->prepare($insert_product);

		 $s->bindValue(':categoryID', $_GET['categoryID']);
		 $s->bindValue(':productCode', $_GET['productCode']);
		 $s->bindValue(':productName', $_GET['productName']);
		 $s->bindValue(':description', $_GET['description']);
		 $s->bindValue(':listPrice', $_GET['listPrice']);
		 $s->bindValue(':discountPercent', $_GET['discountPercent']);
		 $s->execute();

	//	 if($s){

		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('index.php?insert_product','_self')</script>";

		 }
	//}

?>


	<form action="insert_product.php" method="post" enctype="multipart/form-data">

		<table align="center" width="795" border="2" bgcolor="#187eae">

			<tr align="center">
				<td colspan="7"><h2>Insert New Product</h2></td>
			</tr>



			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="categoryID" >
					<option>Select a Category</option>

	<?php

		$categoryName = $_GET['categoryName'];
		$categoryID = $_GET['categoryID'];

		$sql = "SELECT * FROM categories";////////////// i think tis is right
		$s = $pdo->prepare($sql);

		$s->bindValue(':categoryID', $_POST['categoryID']);
		$s->bindValue(':categoryName', $_POST['categoryName']);
		$s->execute();

		$data = $s->fetchAll();



		while ($row = $s->fetch(PDO::FETCH_ARRAY) ($s)){


		$categoryID = $categoryID['categoryID'];
		$categoryName = $categoryName['categoryName'];

		foreach($data as $row):
		echo"<option value='$categoryName'</option>";
	?>
				</select>
				</td>
				</tr>

				<tr>
				<td align="right"><b>Product Code:</b></td>
				<td><input type="text" name="productCode" size="60" required/></td>
			</tr>

				<tr>
				<td align="right"><b>Product Name:</b></td>
				<td><input type="text" name="productName" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td><input type="text" name="description" size="60" required/></td>
			</tr>


					<tr>
				<td align="right"><b>Product List Price:</b></td>
				<td><input type="text" name="listPrice" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Discount Percent:</b></td>
				<td><input type="text" name="discountPercent" size="60" required/></td>
			</tr>


				<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/>
				</td>
			</tr>
		</table>

	</form>
