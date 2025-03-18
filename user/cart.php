<?php 
include 'header.php';
?>

<main class="mt-20 md:mx-40 mx-2 min-h-screen">


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Products
                </th>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    MRP
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Remove
                </th>
            </tr>
        </thead>
        <tbody>
            <?php  
                foreach ($_SESSION['cart'] as $key => $value) {
                    $productArray=get_product($conn, '', '', $key);
                    $pname=$productArray[0]['name'];
                    $mrp=$productArray[0]['mrp'];
                    $price=$productArray[0]['price'];
                    $image=$productArray[0]['image'];
                    $qty=$value['qty'];
            ?>
            <tr class="bg-white border-b  border-gray-200">
                <td scope="row" class="px-6 py-4">
                    <img class="w-36 h-36" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="">
                </td>
                <td class="px-6 py-4">
                     <?php echo $pname?>
                </td>
                <td class="px-6 py-4">
                    $<?php echo $mrp?>
                </td>
                <td class="px-6 py-4">
                    $<?php echo $price?>
                </td>
                <td class="px-6 py-4 flex flex-col items-center justify-center">
                    <input class="bg-gray-100 mt-10" type="number" id="<?php echo $key ?>qty" value="<?php echo $qty?>">
                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">Update</a>
                </td>
                <td class="px-6 py-4">
                    $<?php echo $qty*$price?>
                </td>
                <td class="px-6 py-4">
                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">Remove</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <div class="flex justify-between mt-10">
            <a href="<?php echo SITE_PATH;?>" class="p-4 bg-gray-300">Continue shopping</a>
            <a href="<?php echo SITE_PATH;?>checkout.php" class="p-4 bg-gray-300">Checkout</a>
    </div>
</div>

</main>


<?php
include 'bottom.php';
?>