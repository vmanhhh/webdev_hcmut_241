<?php
    require_once('config.php');
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql_delete = "DELETE FROM products WHERE id = $id";
    $result_delete = mysqli_query($connect, $sql_delete);
    if($result_delete){
        header("location: index.php");
    } else {
        echo "Error deleting record: " . $connect->error;
    }

    $connect->close();
?>