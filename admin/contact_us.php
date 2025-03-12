<?php require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);

    if ($type == 'delete') {
        $id = get_safe_value($conn, $_GET['id']);
        $delete_sql = "delete from contact_us where id = $id";
        mysqli_query($conn, $delete_sql);
    }
}
$sql = 'select * from contact_us order by id desc';
$result = mysqli_query($conn, $sql);
?>
<main>
    <h4 class= "mb-2 bg-white w-auto font-bold text-2xl text-center">Contact Us </h4>

        <table class="h-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Mobile No.</th>
                    <th scope="col" class="px-6 py-3">Comment</th>
                    <th scope="col" class="px-6 py-3">Date added</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800">
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="px-6 py-3"><?php echo $i ?></td>
                        <td class="px-6 py-3"><?php echo $row['id'] ?></td>
                        <td class="px-6 py-3"> <?php echo $row['name'] ?> </td>
                        <td class="px-6 py-3"> <?php echo $row['email'] ?> </td>
                        <td class="px-6 py-3"> <?php echo $row['mobile'] ?> </td>
                        <td class="px-6 py-3"> <?php echo $row['comment'] ?> </td>
                        <td class="px-6 py-3"> <?php echo $row['added_on'] ?> </td>
                        <td class="px-6 py-3"><?php
                                                echo '<a href="?type=delete&id=' . $row['id'] . '">Delete</a>';
                                                ?>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>


</main>

<?php require('bottom.inc.php') ?>