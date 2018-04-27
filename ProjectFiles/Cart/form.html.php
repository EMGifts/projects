<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Department</title>
    <style type="text/css">
    textarea {
      display: block;
      width: 100%;
    }
    </style>
  </head>
  <body>
    <form action="?" method="post">
     <div><label for="dname">Department Name:
        <input type="text" name="dname" id="dname"></label>
      </div>
      <div><label for="dnum">Department Number:
        <input type="text" name="dnum" id="dnum"></label>
      </div>
      <div><label for="mgr_ssn">Department Manager's SSN:
      <select name="mgr_ssn">
           <option value="333445555">333445555</option>
           <option value ="888665555">888665555</option>
           <option value = "987654321">987654321</option>
           <option value = "666778888">666778888</option>
      </select>
    </div>

      <div><input type="submit" value="Add"></div>
    </form>
  </body>
</html>
<?php
$mgr_ssn = $POST['mgr_ssn'];

try
{
  $sql = 'SELECT super_ssn FROM employee';
  $result = $pdo->query($sql);
}
catch (PDOException $e)
{
  $error = 'Error fetching employee: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}
?>
