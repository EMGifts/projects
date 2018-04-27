<?php
session_start();
$_SESSION['isLoggedIn'] = false;
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
	if(isset($_POST['login'])){
			$emailAddress = $_POST['emailAddress'];
			$plainTextPassword = $_POST['password'];
      // steps:
      // 1 > get the user from database wehre email address MongoDeleteBatch

      // 2 > use password_verify() to check plain text against pwd in database

			$sql = "SELECT * FROM customers WHERE emailAddress=:emailAddress";

			$s = $pdo->prepare($sql);

			$s->bindValue(':emailAddress', $_POST['emailAddress']);
			$s->execute();


			$row = $s->fetch(PDO::FETCH_ASSOC);
			if (password_verify($plainTextPassword, $row['password'])) {///
        $_SESSION['isLoggedIn'] = true;
				// echo "<script>alert('You have logged in successfully!')</script>";
        header("Location: /PHPLab/ProjectFiles/customer/homepage.php");

			}else{
				echo "<script>alert('Please check your credentials!')</script>";
			}
    }

	 include 'loginform.html';
	//header('Location: '.ROOT_URL.'users/login'); //to redirect
