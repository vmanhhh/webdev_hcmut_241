<?php
    // Connect file from config.php
    require_once('config.php');

    // SQL Select 
    $select_sql = "SELECT * FROM products";

    // Query db
    $result_select = mysqli_query($connect, $select_sql);
?>