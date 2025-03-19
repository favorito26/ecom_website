<?php include 'header.php'; 
if (!isset($_SESSION['USER_LOGIN']) || $_SESSION['USER_LOGIN'] !== 'yes') {
    header('location: login.php');
    exit();
}
if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
   ?> 
   <script>window.location.href='index.php'</script>
   <?php
}
?>

<main class="mt-20 md:mx-40 mx-2 min-h-screen">

<hr class="mt-6 border-b-1 border-gray-300">

<h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
    Cart
</h6>
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
                $grandtotal = 0;  
                foreach ($_SESSION['cart'] as $key => $value) {
                    $productArray=get_product($conn, '', '', $key);
                    $pname=$productArray[0]['name'];
                    $mrp=$productArray[0]['mrp'];
                    $price=$productArray[0]['price'];
                    $image=$productArray[0]['image'];
                    $qty=$value['qty'];
                    $grandtotal += $qty*$price;
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
                <td class="px-6 py-4">
                    <p class=""><?php echo $qty?></p>
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
    <div class="flex justify-between mt-10 w-full p-6 bg-white">
        <h1>Grand Total:</h1>
        <h1 class="mr-20">$<?php echo $grandtotal?></h1>
    </div>
    <hr class="mt-6 border-b-1 border-blueGray-300">

    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        Address Information
    </h6>
    <section class="flex flex-col flex-wrap">
        <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                    Address
                </label>
                <input type="text" class="checkout-input">
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                    City/state
                </label>
                <input type="email" class="checkout-input">
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4">
            <div class="relative w-full mb-3">
                <label class="block uppercase text-gray-600 text-xs font-bold mb-2">
                    Postal Code
                </label>
                <input type="text" class="checkout-input">
            </div>
        </div>
    </section>
    <hr class="mt-6 border-b-1 border-blueGray-300">

    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        Payment Options
    </h6>
    <section class="flex flex-col flex-wrap">
                   <div class="flex items-center gap-10">COD(Cash on delivery) <input type="radio" name="payment_type" id="cod" value="COD"></div>
                   <div class="flex items-center gap-10">PayU <input type="radio" name="payment_type" id="payu" value="payu"></div>
    </section>
</main>

<?php include 'bottom.php'; ?>