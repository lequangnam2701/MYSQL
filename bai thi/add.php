<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    include 'connect.php';

    $sql = "INSERT INTO contacts_table (Name, Phone) 
            VALUES ('$name', '$phone')";

    mysqli_query($conn, $sql);