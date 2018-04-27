<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");

?>
<html>
	<head>
		<title>My Ideal Gifts</title>

	</head>

<body>

	<!--Main Container starts here-->
	<div class="main_wrapper">

		<!--Header starts here-->
		<div class="header_wrapper">
			<!--Navigation Bar starts-->
			<div class="menubar">

				<ul id="menu">
					<li><a href="../ecommerce/index.php">Home</a></li>
					<li><a href="../all_products.php">All Products</a></li>
					<li><a href="customer/my_account.php">My Account</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="#">Contact Us</a></li>

				</ul>

				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product"/ >
						<input type="submit" name="search" value="Search" />
					</form>

				</div>

			</div>
			<!--Navigation Bar ends-->
		</div>
		<!--Header ends here-->
		
		<!--Content wrapper starts-->
		<div class="content_wrapper">

			<div id="sidebar">

				<div id="sidebar_title">My Account:</div>

				<ul id="cats">

				<li><a href="my_account.php?my_orders">My Orders</a></li>
				<li><a href="my_account.php?edit_account">Edit Account</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
				<li><a href="logout.php">Logout</a></li>

				<ul>

				</div>


			<div id="content_area">

			<?php cart(); ?>

			<div id="shopping_cart">

					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">

					<?php
					if(isset($_SESSION['emailAddress'])){
					echo "<b>Welcome:</b>" . $_SESSION['emailAddress'] ;

					}
					?>


					<?php
					if(!isset($_SESSION['emailAddress'])){

					echo "<a href='checkout.php' style='color:orange;'>Login</a>";

					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}



					?>



					</span>
			</div>

				<div id="products_box">



				<?php
				if(!isset($_GET['my_orders'])){
							if(!isset($_GET['delete_account'])){

				echo "
				<h2 style='padding:20px;'>Welcome:  $firstName </h2>
				<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
				}
				}


				?>

				<?php

				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}


				?>

				</div>

			</div>
		</div>
		<!--Content wrapper ends-->



		<div id="footer">


		</div>

	</div>
<!--Main Container ends here-->


</body>
</html>
