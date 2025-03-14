


<section class="new-arrivals mt-20">
        <h1>New<span class="font-bold"> Arrivals</span></h1>
        <div class="cards">
        <?php
        $get_product = get_product($conn,4);
        foreach($get_product as $list){
        ?>
        <div class="card">
            <a href="#">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product image" />
            </a>
            <div class="md:px-5 md:pb-5">
                <a href="#">
                    <h5><?php echo $list['name']?></h5>
                </a>
                <article>
                    <span><?php echo $list['price']?></span>
                    <a href="#" class="btn-cart">Add to cart</a>
                </article>
            </div>
        </div>
        <?php } ?>
        </div>
    </section>
 