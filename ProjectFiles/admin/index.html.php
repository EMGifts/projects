<?php
session_start();
if (!$_SESSION['isLoggedIn']) {
	die("You must log in");
}

?>

<!DOCTYPE>

<html>
	<head>
		<title> Admin </title>
	</head>
<body>

	<div class="main_wrapper">
		<div id="header"></div>
		<div id="right">
		<h2 style="text-align:center;">Manage Content</h2>

			<a href="insert_product.html.php">Insert New Product</a>
			<a href="view_products.php">View All Products</a>
			<a href="edit_pro.php">Edit Products</a>
			<a href="insert_cat.php">Insert New Category</a>
			<a href="view_cats.php">View All Categories</a>
			<a href="view_customers.php">View Customers</a>
			<a href="view_orders.php">View Orders</a>
			<a href="logout.php">Admin Logout</a>

		</div>

		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php
		if(isset($_GET['insert_product'])){

		include("insert_product.html.php");

		}
		if(isset($_GET['view_products'])){

		include("view_products.php");

		}
		if(isset($_GET['edit_pro'])){

		include("edit_pro.php");

		}
		if(isset($_GET['logout'])){

		include("logout.php");

		}
	/*	if(isset($_GET['insert_cat'])){

		include("insert_cat.php");

		}

		if(isset($_GET['view_cats'])){

		include("view_cats.php");

		}

		if(isset($_GET['edit_cat'])){

		include("edit_cat.php");

		}
		if(isset($_GET['view_customers'])){

		include("view_customers.php");

		} */

		?>
		</div>






	</div>


</body>
</html>
