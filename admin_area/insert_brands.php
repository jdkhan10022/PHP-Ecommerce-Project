<?php

        include('../includes/connect.php');
        if(isset($_POST['insert-brand']))
        {
            $insert_brand = $_POST['brand_title'];
            $select_query = "SELECT * FROM `brands` WHERE brand_title = '$insert_brand'";
            $result = mysqli_query($conn, $select_query);
            $num = mysqli_num_rows($result);
            if($num>0)
            {
                echo"<script>alert('Brand Already Exists!')</script>";
            }
            else{
            $sql ="INSERT INTO `brands`(brand_title) VALUES('$insert_brand')";
            $result = mysqli_query($conn, $sql);

            if($result)
            {
                echo"<script>alert('Brand Added Successfully!')</script>;";
            }}
        }

?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="insert Brands" aria-label="Brands"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-2" name="insert-brand" value="Insert Brands"
            placeholder="Insert Brand">
    </div>
</form>