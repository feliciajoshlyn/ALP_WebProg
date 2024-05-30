<?php
    //function to connect to database
    function my_connectDB(){
        $host = "localhost";
        $user = "root";
        $pwd = "";
        $db = "jasa_titip";

        $conn = mysqli_connect($host, $user, $pwd, $db) or die("Error connecting to database");
        return $conn;
    }

    //function to close connection to database
    function my_closeDB($conn){
        mysqli_close($conn);
    }

    //function to insert to user database
    function saveUser($username, $password, $telnum, $email, $address){
        $conn = my_connectDB();

        $sql = "INSERT INTO customers (username, password, telephone_num, email, address) VALUES ('$username', '$password', '$telnum', '$email', '$address')";
        $result = mysqli_query($conn, $sql);

        my_closeDB($conn);
    }

    //function to update user info
    function updateUser(){
        $conn = my_connectDB();

        $sql = "";
        $result = mysqli_query($conn, $sql);

        my_closeDB($conn);
    }

    //function to delete user from database
    function deleteUser($customer_id){
        $conn = my_connectDB();

        $sql = "DELETE FROM customers WHERE customer_id = '$customer_id'";
        $result = mysqli_query($conn, $sql) or die();

        my_closeDB($conn);
    }
?>