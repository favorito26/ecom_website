<?php
include 'header.php';
$product_id =mysqli_real_escape_string($conn,$_GET['id']);
$get_product = get_product($conn, '', '', $product_id);
?>
<main class="mt-20 md:mx-40 mx-2 min-h-screen products">
    <section class="flex md:flex-row flex-col gap-5">
        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="" class="max-w-full w-96 h-96 object-cover">
        <div class="flex flex-col gap-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">
                <?php echo $get_product['0']['name']?>
                <span class="flex flex-row text-gray-500 text-xl font-normal"><?php echo $get_product['0']['mrp']?> &nbsp; <h2 class="text-black font-bold"> <?php echo $get_product['0']['price']?></h2> </span>
            </h2>
            
            <p><?php echo $get_product['0']['short_desc']?></p>
            <p class="text-gray-600  mb-5">
                Availability: <a href="">In stock</a>
            </p>
            <p class="text-gray-600  mb-5">
                Category: <a href="products.php?id=<?php echo $get_product['0']['categories_id']?>"><?php echo $get_product['0']['categories']?></a>
            </p>
            <a href="product.php?id=<?php echo $list['id']?>" class="btn-cart w-28">Add to cart</a>
        </div>
    </section>
    <section class="flex flex-col mt-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-1">
    Description</h2>
    <div class="w-full h-[1px] bg-black"></div>
    <p class="text-gray-700"><?php echo $get_product['0']['description']?>
    </p>
    </section>
</main>
<?php include 'bottom.php'; ?>