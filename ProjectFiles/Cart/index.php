<?php

if (isset($_GET['cart']))
{
  include 'form.html.php';
  exit();
}

try
{

  $pdo = new PDO('mysql:host=localhost;dbname=company', 'eunice', 'eunice');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}

if (isset($_POST['dname']))
{
  try
  {
    $sql = 'INSERT INTO department SET
        dname = :dname,
        dnumber = :dnum,
        mgr_ssn = :mgr_ssn,
        mgr_start=CURDATE()';
    $s = $pdo->prepare($sql);
    $s->bindValue(':dname', $_POST['dname']);
    $s->bindValue(':dnum', $_POST['dnum']);
    $s->bindValue(':mgr_ssn', $_POST['mgr_ssn']);

    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted department: ' . $e->getMessage();
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

try
{
  $sql = 'SELECT dname FROM department';
  $result = $pdo->query($sql);
}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}

while ($row = $result->fetch())
{
  $dnames[] = $row['dname'];
}

include 'cart.html.php';
