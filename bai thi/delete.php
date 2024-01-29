<?php

$id = $_GET['cid'];

include 'connect.php';

$sql = "DELETE FROM contacts_table WHERE ID=$id";

mysqli_query($conn, $sql);

header("Location: index.php");