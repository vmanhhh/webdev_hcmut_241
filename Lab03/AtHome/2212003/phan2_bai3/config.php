<?php
    define('DB_HOSTNAME', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'shop');

    // connect database
    $connect = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    // check connection
    if($connect === false){
        die('ERROR: Could not connect'. mysqli_connect_error());
    }
?>