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
//function register($firstName,$lastName,$emailAddress,$password,$shipAddress,$billingAddress){
	if(isset($_POST['register']))
	{
		//retrieve customer info //$ip = getIp();
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$emailAddress = $_POST['emailAddress'];
		$password = $_POST['password'];
		$rpassword = $_POST['rpassword'];
		$shipAddress = $_POST['shipAddress'];
		$billingAddress = $_POST['billingAddress'];

		try
		{

			$sql = 'INSERT into CUSTOMERS SET
						firstName = :firstName,
						lastName = :lastName,
						emailAddress = :emailAddress,
						password = :password,
						shipAddress = :shipAddress,
						billingAddress = :billingAddress';

$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$s = $pdo->prepare($sql);
			$s->bindValue(':firstName', $_POST['firstName']);
			$s->bindValue(':lastName', $_POST['lastName']);
			$s->bindValue(':emailAddress', $_POST['emailAddress']);
			$s->bindValue(':password', $hash);
			$s->bindValue(':shipAddress', $_POST['shipAddress']);
			$s->bindValue(':billingAddress', $_POST['billingAddress']);


			if ($password != $rpassword)
				echo "<script>alert('Please Check Your Passwords!')</script>";

			else
			{
				$s->execute();
				header("Location: /PHPLab/ProjectFiles/customer/customerlogin/index.php"); //to redirect
        //echo "<script>alert('Your account has been created successfully!')</script>";
      }
		}


		catch (PDOException $e)
		{
			$error = 'Error Regitering: ' . $e->getMessage();
			include 'error.html.php';
			exit();
		}
    }

  include 'registerform.php';
