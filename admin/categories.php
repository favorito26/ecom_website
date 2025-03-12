
    <?php require('top.inc.php');

    if(isset($_GET['type']) && $_GET['type'] != ''){
        $type = get_safe_value($conn, $_GET['type']);
        if($type =='status'){
            $operation = get_safe_value($conn, $_GET['operation']);
            $id = get_safe_value($conn, $_GET['id']);
            if($operation == 'active'){
                $status = '1';                
            }else{
                $status = '0';
            }

            $update_status_sql = "update categories set status = '$status' where id = $id";
            mysqli_query($conn, $update_status_sql);
        }
        if($type =='delete'){
            $id = get_safe_value($conn, $_GET['id']);
            $delete_sql = "delete from categories where id = $id";
            mysqli_query($conn, $delete_sql);
        }
    }
    $sql = 'select * from categories order by categories desc';
    $result = mysqli_query($conn, $sql);
    ?>
    <main class="flex flex-col items-center justify-center md:h-[100vh] h-screen w-full">
            <h4 class="mb-2 bg-white w-auto font-bold text-2xl text-center">Categories </h4>
            <h4 class="mb-2 bg-white w-auto font-bold text-2xl text-center"><a href="manage_categories.php">Add categories</a></h4>

            <link rel="stylesheet" href="output.css">
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800">
            <?php 
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
            <td class="px-6 py-3"><?php echo $i?></td>
            <td class="px-6 py-3"><?php echo $row['id']?></td>
            <td class="px-6 py-3"> <?php echo $row['categories']?> </td>
            <td class="px-6 py-3"><?php
            if ($row['status'] == 1) {
                echo '<a class="status inactive" href="?type=status&operation=inactive&id='.$row['id'].'">Active</a>&nbsp;';
            }
            else {
                echo '<a class="status active" href="?type=status&operation=active&id='.$row['id'].'">Inactive</a>&nbsp;';
            }

            echo '<a class="edit" href="manage_categories.php?id='.$row['id'].'">Edit</a>&nbsp;'; 
            echo '<a class="delete" href="?type=delete&id='.$row['id'].'">Delete</a>';

            ?> 
        </td>
        </tr>
          <?php  }?>
        </tbody>
    </table>
</div>

    </main>

    <?php require('bottom.inc.php')?>