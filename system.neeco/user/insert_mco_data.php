<?php
// Include your connect.php file to establish a database connection
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mcoName = $_POST['mco_name'];
    $mcoContact = $_POST['mco_contact'];

    // Escape the values to prevent SQL injection
    $mcoName = mysqli_real_escape_string($conn, $mcoName);
    $mcoContact = mysqli_real_escape_string($conn, $mcoContact);

    // Prepare and execute the SQL query to insert new MCO data
    $sql = "INSERT INTO MCO_Info (MCO_Name, MCO_Contact) VALUES ('$mcoName', '$mcoContact')";

    if (mysqli_query($conn, $sql)) {
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
