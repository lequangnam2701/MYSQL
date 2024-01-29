<?php

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $id = $_POST['cid'];

    include 'connect.php';

    $sql = "UPDATE contacts_table SET Name = '$name', Phone = '$phone' WHERE ID=$id";

    mysqli_query($conn, $sql);

    header("Location: index.php");