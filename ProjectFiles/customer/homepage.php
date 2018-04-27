<?php
require_once('util/main.php');
require_once('util/tags.php');
require_once('util/helpers.php');
require_once('model/database.php');
require_once('model/product_db.php');
require_once('model/category_db.php');

// Get all categories
$categories = get_categories();

// Set the featured product IDs in an array
$product_ids = array(1, 7, 9);
// Note: You could also store a list of featured products in the database

// Get an array of featured products from the database
$products = array();
foreach ($product_ids as $product_id) {
    $product = get_product($product_id);
    $products[] = $product;   // add product to array
}
?>
<?php include 'view/header.php'; ?>

<div id="content">
    <br/>
    <p> Welcome to our shopping catalog</p>

    <!-- display product -->
    <h1>Products</h1>
    <table>
    <?php foreach ($products as $product) :
        // Get product data
        $list_price = $product['listPrice'];
        $discount_percent = $product['discountPercent'];
        $description = $product['description'];

        // Calculate unit price
        $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Get first paragraph of description
        $description = add_tags($description);
        $i = strpos($description, "</p>");
        $description = substr($description, 3, $i-3);
    ?>
        <tr>
            <td id="product_image_column">
                <img src="images/<?php echo $product['productCode']; ?>_s.png"
                     alt="&nbsp;">
            </td>
            <td>
                <p>
                    <a href="catalog?action=view_product&amp;product_id=<?php
                              echo $product['productID']; ?>">
                        <?php echo $product['productName']; ?>
                    </a>
                </p>
                <p>
                    <?php echo $description; ?>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

<?php include 'view/footer.php'; ?>
