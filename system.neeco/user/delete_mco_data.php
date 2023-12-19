<?php
// Include your connect.php file to establish a database connection
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Escape the value to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // Construct the SQL query to delete the MCO
    $query = "DELETE FROM MCO_Info WHERE ID = '$id'";

    // Delete the data from the database
    $result = mysqli_query($conn, $query);

    if ($result) {
        $response = array("status" => "success");
    } else {
        $response = array("status" => "error");
    }

    // Close the database connection
    mysqli_close($conn);

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array("status" => "error");
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
