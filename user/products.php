<?php 
include 'header.php';

$cat_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

// Validate category ID
if (!empty($cat_id)) {
    $check_sql = "SELECT id FROM categories WHERE id = '$cat_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) == 0) {
        header("Location: index.php");
        exit();
    }
}

$get_product = get_product($conn, '', $cat_id);
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
?>

<main class="mt-20 md:mx-40 mx-2 h-screen products">
    <select class="mb-10 w-60 bg-blue-100 p-3 rounded" name="category" id="category" onchange="filterProducts(this.value)">
        <option value="">All</option>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $selected = ($row['id'] == $cat_id) ? "selected" : "";
            echo "<option value='{$row['id']}' $selected>{$row['categories']}</option>";
        }
        ?>
    </select>

    <div class="cards">
        <?php
        if (!empty($get_product)) {
            foreach ($get_product as $list) {
        ?>
                <div class="card">
                    <a href="product.php?id=<?php echo $list['id']?>">
                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image']; ?>" alt="product image" />
                    </a>
                    <div class="md:px-5 md:pb-5">
                        <a href="product.php?id=<?php echo $list['id']?>">
                            <h5><?php echo $list['name']; ?></h5>
                        </a>
                        <article>
                            <span><?php echo $list['price']; ?></span>
                            <a href="product.php?id=<?php echo $list['id']?>" class="btn-cart">Add to cart</a>
                        </article>
                    </div>
                </div>
        <?php 
            }
        } else { 
        ?>
            <p class="text-center text-gray-500 text-lg">No products for this category.</p>
        <?php 
        } 
        ?>
    </div>
</main>

<script>
function filterProducts(catId) {
    window.location.href = "?id=" + catId;
}
</script>

<?php include 'bottom.php'; ?>
