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

			$sql = "SELECT * FROM administrators WHERE emailAddress= :emailAddress";

			$s = $pdo->prepare($sql);

			$s->bindValue(':emailAddress', $_POST['emailAddress']);
			$s->execute();


			$row = $s->fetch(PDO::FETCH_ASSOC);

      if (password_verify($plainTextPassword, $row['password'])) {///
        $_SESSION['isLoggedIn'] = true;
        // echo "<script>alert('You have logged in successfully!')</script>";
        header("Location: /PHPLab/ProjectFiles/admin/index.html.php");
      }else{
				echo "<script>alert('Please check your credentials!')</script>";
			}
    }
	include 'adminloginform.html';
	//header('Location: '.ROOT_URL.'users/login'); //to redirect
