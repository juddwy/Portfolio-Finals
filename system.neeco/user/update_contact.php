<?php
include "connect.php";

if (isset($_GET['barangay']) && isset($_GET['field']) && isset($_GET['value'])) {
    $barangayName = $_GET['barangay'];
    $field = $_GET['field'];
    $newValue = $_GET['value'];

    // Map the field names to the corresponding column names in the database
    $columnMapping = array(
        'contact_number' => 'contact_number',
        'brgy_captain' => 'brgy_captain',
        'brgy_captain_number' => 'brgy_captain_number',
        'brgy_secretary' => 'brgy_secretary',
        'brgy_secretary_number' => 'brgy_secretary_number'
    );

    // Check if the specified field is valid
    if (array_key_exists($field, $columnMapping)) {
        $columnName = $columnMapping[$field];

        // Prepare and execute the SQL query to update the specified field
        $sql = "UPDATE contacts SET $columnName = ? WHERE barangay = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newValue, $barangayName);

        if ($stmt->execute()) {
            $response = array("status" => "success");
        } else {
            $response = array("status" => "error");
        }

        $stmt->close();
    } else {
        $response = array("status" => "error");
    }
} else {
    $response = array("status" => "error");
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
