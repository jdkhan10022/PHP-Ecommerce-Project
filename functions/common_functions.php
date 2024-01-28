<?php

    // including database
    include ('./includes/connect.php');

    // Getting products
    function getproducts()
    {
        global $conn;
        // Condition to check isset or not
        if(!isset($_GET['category']))  // check for category in url get if set or not
        {
            if(!isset($_GET['brand'])) // check for brand in url get if set or not
            {
         $sql="SELECT * FROM `products` ORDER BY rand() LIMIT 0,9";  // rand() function is used to random the product in display
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_discription = $row['product_discription'];
                            $product_price = $row['product_price'];
                            $product_image1= $row['product_image1'];
                            $product_image2= $row['product_image2'];
                            $product_image3= $row['product_image3'];

                            echo'<div class="col-md-4 mb-2">
                        <div class="card" style="width: 22rem;">
                            <img src="./admin_area/product_images/'.$product_image1.'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$product_title.'</h5>
                                <p class="card-text">'.$product_discription.'</p>
                                <a href="#" class="btn btn-info">Add to Cart</a>
                                <a href="#" class="btn btn-secondary">View more</a>
                            </div>
                        </div>
                    </div>';
                        }
                    }
                    }
    }

    // Getting unique Categories
    function get_unique_categories()
    {
        global $conn;
        // Condition to check isset or not
        if(isset($_GET['category']))  // check for category in url get if set or not
        {
            $category_id=$_GET['category']; // Accessing the value from the URL
         $sql="SELECT * FROM `products` WHERE category_id=$category_id";  // rand() function is used to random the product in display
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        if($num==0)
                        {
                            echo"<h2 class='text-center text-danger'>No Stock For this Category</h2>";
                        }
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_discription = $row['product_discription'];
                            $product_price = $row['product_price'];
                            $product_image1= $row['product_image1'];
                            $product_image2= $row['product_image2'];
                            $product_image3= $row['product_image3'];

                            echo'<div class="col-md-4 mb-2">
                        <div class="card" style="width: 22rem;">
                            <img src="./admin_area/product_images/'.$product_image1.'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$product_title.'</h5>
                                <p class="card-text">'.$product_discription.'</p>
                                <a href="#" class="btn btn-info">Add to Cart</a>
                                <a href="#" class="btn btn-secondary">View more</a>
                            </div>
                        </div>
                    </div>';
                        }
                    }
                    }


        // Getting Unique Brands
        function get_unique_brand()
    {
        global $conn;
        // Condition to check isset or not
        if(isset($_GET['brand']))  // check for category in url get if set or not
        {
            $brand_id=$_GET['brand']; // Accessing the value from the URL
         $sql="SELECT * FROM `products` WHERE brand_id=$brand_id";  // rand() function is used to random the product in display
                        $result = mysqli_query($conn, $sql);
                         $num = mysqli_num_rows($result);
                        if($num==0)
                        {
                            echo"<h2 class='text-center text-danger'>No Stock For this brand</h2>";
                        }
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $product_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_discription = $row['product_discription'];
                            $product_price = $row['product_price'];
                            $product_image1= $row['product_image1'];
                            $product_image2= $row['product_image2'];
                            $product_image3= $row['product_image3'];

                            echo'<div class="col-md-4 mb-2">
                        <div class="card" style="width: 22rem;">
                            <img src="./admin_area/product_images/'.$product_image1.'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$product_title.'</h5>
                                <p class="card-text">'.$product_discription.'</p>
                                <a href="#" class="btn btn-info">Add to Cart</a>
                                <a href="#" class="btn btn-secondary">View more</a>
                            </div>
                        </div>
                    </div>';
                        }
                    }
                    }
    function getcategories()
    {
        global $conn;
         $select_category="SELECT * FROM `categories`";
                $result_cat=mysqli_query($conn, $select_category);
                
                while($row_data=mysqli_fetch_assoc($result_cat))
                {
                  $cat_title=$row_data['category_title'];
                  $cat_id=$row_data['category_id'];
                  echo'<li class="nav-item">
                  <a href="index.php?category='.$cat_id.'" class="nav-link text-light">'.$cat_title.'</a>
              </li>';
                }
    }

    function getbrands()
    {
        global $conn;
         $select_brands = "SELECT * FROM `brands`";
                  $result=mysqli_query($conn, $select_brands);
                  while($row_data=mysqli_fetch_assoc($result))
                  {
                  $brand_title= $row_data['brand_title'];
                  $brand_id= $row_data['brand_id'];
                  echo'<li class="nav-item">
                  <a href="index.php?brand='.$brand_id.'" class="nav-link text-light">'.$brand_title.'</a>
              </li>';
                  }
    }
?>