<?php require('top.inc.php');
$categories = '';
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
  $id = get_safe_value($conn, $_GET['id']);
  $query = mysqli_query($conn, "SELECT * FROM categories WHERE id = '$id'");
  $check = mysqli_num_rows($query);
  if ($check > 0){
    $row = mysqli_fetch_assoc($query);
  $categories = $row['categories'];
} else {
  header('location:categories.php');
  die();
}
}

if (isset($_POST['submit'])) {
  $category = $_POST['category'];
  $res = mysqli_query($conn, "SELECT * FROM categories WHERE categories = '$category'");
  $check = mysqli_num_rows($res);
  if ($check > 0) {
    if (isset($_GET['id']) && $_GET['id'] != '') {
      $getData = mysqli_fetch_assoc($res);
      if ($id == $getData['id']) {
        
      }
      else{
        $msg = "categories already exists ";
      }
    }else{
      $msg = "categories already exists ";
    }
  }
 if($msg==''){
  if (isset($_GET['id']) && $_GET['id'] != '') {
    $sql = "update categories set categories='$category' where id = '$id'";
    mysqli_query($conn, $sql);
  } else {
    $sql = "insert into categories (categories,status) values('$category','1')";
    mysqli_query($conn, $sql);
  }
  header("Location:categories.php");
  die();
 }
}

?>

<main>
  <h4 class="mb-2 bg-white w-auto font-bold text-2xl text-center">Add Categories form</h4>
  <form class="w-full max-w-sm" action="" method="POST">
    <div class="flex items-center border-b border-blue-500 py-2">
      <input class="appearance-none bg-transparent border-none w-full text-gray-400 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="category" value="<?php echo $categories ?>" placeholder="Category Name" aria-label="Category name" required>
      <button class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit" name="submit">
        Submit
      </button>
      <button class="flex-shrink-0 border-transparent border-4 text-blue-500 hover:text-blue-800 text-sm py-1 px-2 rounded" type="reset">
        Cancel
      </button>
   
    </div>
  </form>
  <p class="text-red-700 m-0"><?php echo $msg; ?></p>
</main>

<?php require('bottom.inc.php') ?>