<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>List of Products in cart</title>
  </head>
  <body>
    <p><a href="?Cart">Add a product</a></p>
    <p>Here are all the products:</p>
    <?php foreach ($dnames as $dname): ?>
      <blockquote>
        <p><?php echo htmlspecialchars($dname, ENT_QUOTES, 'UTF-8'); ?></p>
      </blockquote>
    <?php endforeach; ?>
  </body>
</html>
