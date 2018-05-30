<?php
    include("connect.php");

    $productId = $_GET['p'];
    $sql = "DELETE FROM product WHERE id='$productId'";
    $query = mysqli_query($conn, $sql);
    header("Location: chinhsua.php");
?>