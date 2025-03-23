<?php require('top.inc.php');

$order_id = get_safe_value($conn, $_GET['id']);
?>
<main>
    <h4 class= "mb-2 bg-white w-auto font-bold text-2xl text-center">Users</h4>

    <table class="h-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total price
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $uid = $_SESSION['USER_ID'];
                $res = mysqli_query($conn, "select distinct(order_detail.id), order_detail.*,product.name,product.image from order_detail,product,orders where order_detail.order_id='$order_id' and orders.user_id='$uid' and order_detail.product_id=product.id");
                $total_price =0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $total_price =$total_price+($row['qty']*$row['price']);
                ?>
                   <tr >
                        <td scope="row" class="px-6 py-4">
                            <?php echo $row['name']; ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <img class="w-36 h-36" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="">
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?php echo $row['price']; ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?php echo $row['qty']; ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?php echo $row['price'] * $row['qty']; ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr class="">
                    <td colspan="4" class="px-6 py-4">
                        Total Price
                    </td>
                    <td class="px-6 py-4 font-bold">
                        <?php echo $total_price;?>
                    </td>
                </tr>
                </tr>
            </tbody>
        </table>


</main>

<?php require('bottom.inc.php') ?>