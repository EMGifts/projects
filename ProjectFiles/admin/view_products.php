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

?>
<table width="795" align="center" >


	<tr align="center">
		<td colspan="6"><h2>View All Products</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Product</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
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
	if(isset($_POST['products'])){
			$sql = "SELECT * FROM products";

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

		$i++;


	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $productName;?></td>
		<td><?php echo $listPrice;?></td>
		<td><a href="index.php?edit_pro=<?php echo $productCode; ?>">Edit</a></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $productCode;?>">Delete</a></td>

	</tr>
	<?php } ?>
</table>

<?php } ?>
