<?php
include "connect.php";

if (isset($_GET['town'])) {
    $selectedTown = $_GET['town'];

    // Prepare and execute the SQL query to get barangays and contact information for the selected town
    $sql = "SELECT barangay, contact_number, brgy_captain, brgy_captain_number, brgy_secretary, brgy_secretary_number FROM contacts WHERE town = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedTown);
    $stmt->execute();

    $result = $stmt->get_result();
    $barangays = array();
    while ($row = $result->fetch_assoc()) {
        $barangays[] = array(
            "barangay" => $row['barangay'],
            "contact_number" => $row['contact_number'],
            "brgy_captain" => $row['brgy_captain'],
            "brgy_captain_number" => $row['brgy_captain_number'],
            "brgy_secretary" => $row['brgy_secretary'],
            "brgy_secretary_number" => $row['brgy_secretary_number']
        );
    }

    // Close the database connection
    $stmt->close();
    $conn->close();

    // Echo the response as JSON
    echo json_encode($barangays);
}
?>
