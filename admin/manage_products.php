<?php require('top.inc.php');

// Initialize variables
$categories_id = $name = $mrp = $price = $qty = $image = $short_desc = $description = $meta_title = $meta_desc = $meta_keyword = '';
$msg = '';
$image_required = 'required';

// Fetch product data if editing
if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($conn, $_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM product WHERE id = '$id'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $categories_id = $row['categories_id'];
        $name = $row['name'];
        $mrp = $row['mrp'];
        $price = $row['price'];
        $qty = $row['qty'];
        $short_desc = $row['short_desc'];
        $description = $row['description'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
    } else {
        header('location:product.php');
        die();
    }
}

// Handle form submission
if (isset($_POST['submit'])) {
    $categories_id = get_safe_value($conn, $_POST['categories_id']);
    $name = get_safe_value($conn, $_POST['name']);
    $mrp = get_safe_value($conn, $_POST['mrp']);
    $price = get_safe_value($conn, $_POST['price']);
    $qty = get_safe_value($conn, $_POST['qty']);
    $short_desc = get_safe_value($conn, $_POST['short_desc']);
    $description = get_safe_value($conn, $_POST['description']);
    $meta_title = get_safe_value($conn, $_POST['meta_title']);
    $meta_desc = get_safe_value($conn, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($conn, $_POST['meta_keyword']);

    // Check if product already exists
    $res = mysqli_query($conn, "SELECT * FROM product WHERE name = '$name'");
    if (mysqli_num_rows($res) > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id != $getData['id']) {
                $msg = "Product already exists";
            }
        } else {
            $msg = "Product already exists";
        }
    }

    if($_FILES['image']['type'] != '' && ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')){
        $msg = "please select image in png, jpg or jpeg format";
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if($_FILES['image']['name'] != ''){
                $image = rand(1111111111, 9999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH.$image);
                $update_sql = "UPDATE product SET categories_id='$categories_id', name='$name', mrp='$mrp', price='$price', qty='$qty', short_desc='$short_desc', description='$description', meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword', image='$image' WHERE id='$id'";
            }
            else{
                $update_sql = "UPDATE product SET categories_id='$categories_id', name='$name', mrp='$mrp', price='$price', qty='$qty', short_desc='$short_desc', description='$description', meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword' WHERE id='$id'";
            }
            mysqli_query($conn, $update_sql);
        } else {
            $image = rand(1111111111, 9999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH.$image);
            mysqli_query($conn, "INSERT INTO product (categories_id, name, mrp, price, qty, short_desc, description, meta_title, meta_desc, meta_keyword, status, image) 
                    VALUES ('$categories_id', '$name', '$mrp', '$price', '$qty', '$short_desc', '$description', '$meta_title', '$meta_desc', '$meta_keyword', 1, '$image')");
        }

            header("Location: product.php");
            die();
    }
}
?>

<main>
    <div class="bg-blue-100 p-6 rounded-lg shadow-md w-full max-w-lg mt-20 mb-5">
        <h2 class="text-2xl font-bold text-center">Add Product</h2>
        <?php if ($msg != '') echo "<div class='text-red-500'>$msg</div>"; ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Category -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300" name="categories_id" required>
                    <option value="">Select Category</option>
                    <?php
                    $res = mysqli_query($conn, "SELECT id, categories FROM categories ORDER BY categories ASC");
                    while ($row = mysqli_fetch_assoc($res)) {
                        $selected = ($row['id'] == $categories_id) ? 'selected' : '';
                        echo "<option value='{$row['id']}' $selected>{$row['categories']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" value="<?php echo $name ?>" name="name" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300" placeholder="Enter product name" required>
            </div>

            <!-- MRP -->
            <div>
                <label class="block text-sm font-medium text-gray-700">MRP</label>
                <input type="number" value="<?php echo $mrp ?>" name="mrp" step="0.01" min="0" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300" placeholder="Enter MRP" required>
            </div>

            <!-- Price -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" value="<?php echo $price ?>" name="price" step="0.01" min="0" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300" placeholder="Enter price" required>
            </div>

            <!-- Quantity -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" value="<?php echo $qty ?>" name="qty" min="0" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300" required>
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300" <?php echo $image_required?>>
            </div>

            <!-- Short Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Short Description</label>
                <textarea name="short_desc" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300" required><?php echo $short_desc ?></textarea>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300" required><?php echo $description ?></textarea>
            </div>

            <!-- Meta Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Meta title</label>
                <textarea name="meta_title" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300"><?php echo $meta_title ?></textarea>
            </div>

            <!-- Meta Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Meta Description</label>
                <textarea name="meta_desc" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300"><?php echo $meta_desc ?></textarea>
            </div>

            <!-- Meta Keywords -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                <textarea name="meta_keyword" class="p-2 w-full border rounded-md focus:ring focus:ring-blue-300"><?php echo $meta_keyword ?></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 mt-1">Submit</button>
            </div>
        </form>
    </div>
</main>

<?php require('bottom.inc.php') ?>