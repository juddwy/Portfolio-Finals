<?php
// Include the database connection file
include 'connect.php';

// Retrieve data from the MCO_Info table
$sql = "SELECT * FROM MCO_Info";
$result = $conn->query($sql);

$data = array();

// Loop through the data and store it in an array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the retrieved data as JSON
echo json_encode($data);
?>
