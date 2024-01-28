<?php
        include ('../includes/connect.php');
        if(isset($_POST['insert_product']))
        {
            $product_title = $_POST['product_title'];
            $product_discription = $_POST['product_discription'];
            $product_keyword = $_POST['product_keyword'];
            $product_category = $_POST['product_categories'];
            $product_brands = $_POST['product_brands'];
            $product_price = $_POST['product_price'];
            $product_status = 'true';

            //Accessing images
            $product_image1 = $_FILES['product_image1']['name'];
            $product_image2 = $_FILES['product_image2']['name'];
            $product_image3 = $_FILES['product_image3']['name'];

            // Accessing image Temp name
            $temp_image1 = $_FILES['product_image1']['tmp_name'];
            $temp_image2 = $_FILES['product_image2']['tmp_name'];
            $temp_image3 = $_FILES['product_image3']['tmp_name'];

            // checking empty condition
            if($product_title=='' || $product_discription=='' || $product_keyword=='' || $product_category=='' || $product_brands=='' || $product_price==''|| $product_image1=='' || $product_image2=='' || $product_image3=='')
            {
                echo"<script>alert('Please Fill All the Avaiable Fields')</script>";
                exit();
            }
            else
            {
                move_uploaded_file($temp_image1,"./product_images/$product_image1");
                move_uploaded_file($temp_image2,"./product_images/$product_image2");
                move_uploaded_file($temp_image3,"./product_images/$product_image3");

                // Insert Query
                $sql="INSERT INTO `products`(product_title, product_discription, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES('$product_title', '$product_discription', '$product_keyword', '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";
                $result = mysqli_query($conn, $sql);
                if($result)
                {
                    echo"<script>alert('Product Inserted Successfully')</script>";
                }
            }

        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>
    <!-- Bootstrap Css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css Link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center">Insert Products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- enctype is used to insert the images. -->
            <!-- Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- Product discription -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_discription" class="form-label">Product Discription</label>
                <input type="text" name="product_discription" id="product_discription" class="form-control"
                    placeholder="Enter Product discription" autocomplete="off" required="required">
            </div>
            <!-- Product Keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                    placeholder="Enter Product keyword" autocomplete="off" required="required">
            </div>
            <!-- Product Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                                $select_query = "SELECT * FROM `categories`";
                                $result_query = mysqli_query($conn, $select_query);
                                while($row=mysqli_fetch_assoc($result_query))
                                {
                                    $category_title= $row['category_title'];
                                    $category_id = $row['category_id'];
                                    echo'<option value="'.$category_id.'">'.$category_title.'</option>';
                                }

                        ?>
                </select>
            </div>
            <!-- Product Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select Brand</option>
                    <?php
                            $sql="SELECT * FROM `brands`";
                            $result=mysqli_query($conn, $sql);

                            while($row=mysqli_fetch_assoc($result))
                            {
                                $brand_title= $row['brand_title'];
                                $brand_id= $row['brand_id'];
                                echo' <option value="'.$brand_id.'">'.$brand_title.'</option>';
                            }
                        ?>
                </select>
            </div>
            <!-- Product image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- Product image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- Product image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Product Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Enter Product price" autocomplete="off" required="required">
            </div>
            <!-- Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info" value="Insert Product">
            </div>

        </form>
    </div>

</body>

</html>