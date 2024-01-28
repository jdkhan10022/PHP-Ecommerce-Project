<form action="" method="post" class="mb-2">
<?php

    include('../includes/connect.php');
    if(isset($_POST['insert-cat']))
    {
        $category_title=$_POST['cat_title'];
        // Select Data From Database
        $select_query="SELECT * FROM `categories` WHERE category_title='$category_title'";
        $result_select= mysqli_query($conn, $select_query);
        $num = mysqli_num_rows($result_select);
        if($num>0)
        {
            echo"<script>alert('Category Already Exists!')</script>";
        }
        else{
        $insert_query="INSERT INTO `categories`(category_title) VALUES('$category_title')";

        $result = mysqli_query($conn, $insert_query);
        if($result)
        {
            echo"<script>alert('Category hasbeen Inserted Successfully!')</script>";
        }}
    }

?>
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="insert Category" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-2" name="insert-cat" value="Insert Categories" placeholder="insert Category">
</div>
</form>