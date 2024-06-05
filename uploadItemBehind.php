
    <?php
    session_start();
    $product_name = $_POST['product_name'];
    $description = $_POST['product_description'];
    $image = $_FILES['image'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $country = $_POST['country'];

    //to the folder
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    include('controller.php');
    uploadItems($product_name, $description, $target_file, $price, $category, $country);
    header("Location: viewItems.php")
    ?>