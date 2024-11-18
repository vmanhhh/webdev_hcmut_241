<?php
require_once('config.php');

// Set headers for JSON response
header('Content-Type: application/json');

$response = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validate and sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($connect, $id);

    $sql_delete = "DELETE FROM products WHERE id = $id";
    $result_delete = mysqli_query($connect, $sql_delete);

    if ($result_delete) {
        $response['success'] = true;
        $response['message'] = "Record deleted successfully";
    } else {
        $response['success'] = false;
        $response['message'] = "Error deleting record: " . mysqli_error($connect);
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request, 'id' parameter is missing";
}

// Return JSON response
echo json_encode($response);

$connect->close();
?>
?>