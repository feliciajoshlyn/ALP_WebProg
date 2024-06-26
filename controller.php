<?php
//function to connect to database
function my_connectDB()
{
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "jasa_titip";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("Error connecting to database");
    return $conn;
}

//function to close connection to database
function my_closeDB($conn)
{
    mysqli_close($conn);
}

//user functions

//function to insert to user database
function saveUser($username, $password, $telnum, $email, $address)
{
    $conn = my_connectDB();

    // checks if ada w the same username
    $sql_check = "SELECT * FROM customers WHERE username = '$username'";
    $checkAvailability = mysqli_query($conn, $sql_check);
    if ($checkAvailability->num_rows > 0) {
        my_closeDB($conn);
        header("Location: register.php?failed=duplicate_user");
    } else {
        $sql = "INSERT INTO customers (username, password, telephone_num, email, address) VALUES ('$username', '$password', '$telnum', '$email', '$address')";
        $result = mysqli_query($conn, $sql);

        my_closeDB($conn);
    }
}

//function to update user info
function updateUser($user_id, $username, $password, $telephone_num, $email, $address)
{
    $conn = my_connectDB();

    $sql = "UPDATE customers SET username = '$username' , password = '$password', telephone_num = '$telephone_num', email = '$email', address='$address'  WHERE customer_id='$user_id'";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
}

//function to delete user from database
function deleteUser($customer_id)
{
    $conn = my_connectDB();

    $sql = "DELETE FROM customers WHERE customer_id = '$customer_id'";
    $result = mysqli_query($conn, $sql) or die();

    my_closeDB($conn);
}

function getUser($user_id)
{
    $conn = my_connectDB();

    $sql = "SELECT * FROM customers WHERE customer_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
    return $result;
}

function loginUser($username, $password)
{
    $conn = my_connectDB();

    $sql = "SELECT * FROM customers WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);

    return $result;
}

//product functions

//upload Items from admin
function uploadItems($name, $desc, $image, $price, $category, $country)
{
    $conn = my_connectDB();

    $sql = "INSERT INTO products (name, description, photo, price, category, country) VALUES ('$name','$desc','$image','$price', '$category', '$country')";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
}

//get details of item
function getItemDetails($product_id)
{
    $conn = my_connectDB();

    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
    return $result;
}

//delete item
function deleteItem($product_id)
{
    $conn = my_connectDB();

    $sql = "DELETE FROM customer_request WHERE product_id = '$product_id'";
    $sql2 = "DELETE FROM products WHERE product_id = '$product_id'";
    
    $result = mysqli_query($conn, $sql) or die();
    $result2 = mysqli_query($conn, $sql2) or die();
    

    my_closeDB($conn);
}

//update item
function updateItem($product_id, $name, $desc, $img, $price, $category, $country)
{
    $conn = my_connectDB();

    $sql = "UPDATE products SET name = '$name' , description = '$desc', photo = '$img', price = '$price', category='$category', country ='$country'  WHERE product_id='$product_id'";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
}

//Customers view carts
function viewCart($user_id)
{
    $conn = my_connectDB();

    $sql = "SELECT * FROM products INNER JOIN customer_request ON products.product_id = customer_request.product_id WHERE customer_id = $user_id AND confirmed =  0";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);

    return $result;
}

function viewConfirmed($user_id)
{
    $conn = my_connectDB();

    $sql = "SELECT * FROM products INNER JOIN customer_request ON products.product_id = customer_request.product_id WHERE customer_id = $user_id AND confirmed =  1";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);

    return $result;
}

//confirm items
function confirmItem($user_id)
{
    $conn = my_connectDB();

    $sql = "UPDATE customer_request SET confirmed = 1 where customer_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
    return $result;
}

function viewUnconfirmedRequest($user_id, $product_id)
{
    $conn = my_connectDB();

    $sql = "SELECT * FROM customer_request WHERE customer_id = $user_id AND product_id = $product_id AND confirmed = 0";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);

    return $result;
}

//approve Items by admin
function approveItem($request_id){
    $conn = my_connectDB();

    $sql = "UPDATE customer_request SET approved = 1 WHERE request_id = '$request_id'";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
}

//Customers add to cart
function addToCart($product_id, $quantity)
{
    $conn = my_connectDB();
    $user_id = $_SESSION['user']['customer_id'];

    $sql = "INSERT INTO customer_request(customer_id, product_id, quantity) VALUES ('$user_id', '$product_id', $quantity)";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
}

//return true / false if it's in the cart
function checkProductinCart($user_id, $product_id)
{
    $conn = my_connectDB();
    $user_id = $_SESSION['user']['customer_id'];

    $sql = "SELECT * FROM customer_request WHERE customer_id=$user_id AND product_id=$product_id ";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {

        my_closeDB($conn);
        return 1;
    } else {

        my_closeDB($conn);
        return 0;
    }
}

function checkProductInButNotConfirmed($user_id, $product_id)
{
    $conn = my_connectDB();
    $user_id = $_SESSION['user']['customer_id'];

    $sql = "SELECT * FROM customer_request WHERE customer_id=$user_id AND product_id=$product_id AND confirmed = 0";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {

        my_closeDB($conn);
        return 1;
    } else {

        my_closeDB($conn);
        return 0;
    }
}

//update the cart (plus)
function cartUpdate($product_id, $quantity)
{
    $conn = my_connectDB();
    $user_id = $_SESSION['user']['customer_id'];

    $sql = "UPDATE customer_request SET quantity = $quantity WHERE product_id = '$product_id' AND customer_id = '$user_id' AND confirmed = 0";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
    return $result;
}

function cartItemDelete($product_id)
{
    $conn = my_connectDB();
    $user_id = $_SESSION['user']['customer_id'];

    $sql = "DELETE FROM customer_request WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
}

function admingetUsers()
{
    $conn = my_connectDB();

    $sql = "SELECT * FROM customers WHERE admin = 0";
    $result = mysqli_query($conn, $sql);

    my_closeDB($conn);
    return $result;
}
