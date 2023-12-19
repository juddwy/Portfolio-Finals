<?php
// Include your connect.php file to establish a database connection
include('connect.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the parameters from the POST request
    $id = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Escape the values to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);
    $field = mysqli_real_escape_string($conn, $field);
    $value = mysqli_real_escape_string($conn, $value);

    // Construct the SQL query
    $query = "UPDATE mco_info SET $field = '$value' WHERE ID = '$id'";

    // Update the data in the database
    $result = mysqli_query($conn, $query);

    if ($result) {
        $response = ['status' => 'success'];
    } else {
        $response = ['status' => 'error', 'message' => mysqli_error($conn)];
    }

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If the request is not a POST request, return an error
    header('HTTP/1.1 400 Bad Request');
    echo 'Bad Request';
}
?>
