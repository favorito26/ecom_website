<?php include 'header.php'; ?>

<main class="mt-20 md:mx-40 mx-2 min-h-screen">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Order ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Payment Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Payment Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $uid = $_SESSION['USER_ID'];
                $res = mysqli_query($conn, "select * from orders where user_id = '$uid'");
                while ($row = mysqli_fetch_assoc($res)) {?>
                <tr>
                    <td class="px-6 py-3">
                        <a class="bg-black px-10 py-3 mt-2 text-center hover:bg-gray-700 text-white m-2" href="order_details.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a>
                    </td>
                    <td class="px-6 py-3"> 
                        <?php echo $row['added_on']?>
                    </td>
                    <td class="px-6 py-3">
                        <?php echo $row['address']?>
                    </td>
                    <td class="px-6 py-3">
                        <?php echo $row['payment_type']?>
                    </td>
                    <td class="px-6 py-3">
                        <?php echo $row['payment_status']?>
                    </td>
                    <td class="px-6 py-3">
                        <?php echo $row['order_status']?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</main>


<?php include 'bottom.php'; ?>