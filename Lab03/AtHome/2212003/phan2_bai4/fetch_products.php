<?php
$connect = mysqli_connect("localhost", "root", "", "shop");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from products";
$result = mysqli_query($connect, $sql);

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

mysqli_close($connect);

echo json_encode($products);
?>
