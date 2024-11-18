<?php
    // Connect file from config.php
    require_once('config.php');

    // SQL Select 
    $select_sql = "SELECT * FROM products";

    // Query db
    $result_select = mysqli_query($connect, $select_sql);
    $products = mysqli_fetch_all($result_select, MYSQLI_ASSOC);
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($products);
?>