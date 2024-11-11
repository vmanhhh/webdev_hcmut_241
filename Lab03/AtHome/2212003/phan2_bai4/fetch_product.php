<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $connect = mysqli_connect("localhost", "root", "", "shop");
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    echo json_encode($row);

    mysqli_close($connect);
}