<!DOCTYPE html>
<html>
<head>
    <title>Barangay Contact Information System</title>
    <!-- Add your CSS style here using the provided color palette -->
    <style>
         select#town {
            background-color: #f2f2f2; /* Replace with your desired background color */
            text-align: center;
            font-size: 20px;
             font-family: 'Times New Roman', serif;
        }

        select {
            height: 30px; /* Adjust the height as needed */
            border-radius: 5px; /* Add curved border */
        }

        label {
            font-size: 1.3em; /* Adjust the font size as needed */
            font-family: 'Times New Roman', serif;
            display: inline-block; /* Display label as inline block */
            vertical-align: middle; /* Align vertically in the middle */
        }

        h1 {
            text-align: center;
            border: 4px solid black;
            font-family: 'Times New Roman', serif;
            background-color: #f2f2f2;
            padding-bottom: 3px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the opacity as needed */
            margin-bottom: 30px;
        }

        table, th, td {
            border: 2px solid black;
        }

        th, td {
            padding: 6px;
            text-align: center;
            font-family: 'Times New Roman', serif;
            font-size: 19px;
            text-shadow: 0 0 10px rgba(255, 255, 255, 1);
        }

        body {
            background-image: url('img/logo2.png'); /* Replace with your image path */
            background-size: contain;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.5);

        }

        /* Style for the edit buttons */
        .edit-button {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 2px 6px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 3px;
        }
    select#town {
            display: inline-block; /* Display dropdown as inline block */
            vertical-align: middle; /* Align vertically in the middle */
            margin-left: 10px; /* Add some space between label and dropdown */
            width: 200px; /* Adjust width as needed */
        }
    .go-to-mco-button {
    position: absolute;
    top: 55px;
    right: 50px;
    margin-left: 50px;
}
    </style>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h1 class="mt-4">Barangay Contact Information</h1>
        <label for="town" class="mt-3">Select a town:</label>
        <select name="town" id="town" class="form-control" style="width: 200px;">
            <option value="" class="text-center"><----TOWNS----></option>
            <!-- Add the provided towns to the dropdown -->
            <option value="Cabiao">CABIAO</option>
            <option value="Gapan A">GAPAN A</option>
            <option value="Gapan B">GAPAN B</option>
            <option value="Jaen">JAEN</option>
            <option value="San Antonio">SAN ANTONIO</option>
            <option value="San Isidro">SAN ISIDRO</option>
        </select>

        <a href="mainmco.php" class="btn btn-primary">Go to MCO Contact Information</a>
        <div id="barangay_table" class="mt-4">
            <!-- Barangay table will be populated dynamically using JavaScript -->
        </div>
    </div>

    <script>
       var barangays = []; // Global array to store barangay data

        // JavaScript code to handle the dropdown change event for town
        document.getElementById("town").addEventListener("change", function() {
            var selectedTown = this.value;
            var barangayTable = document.getElementById("barangay_table");
            if (selectedTown !== "") {
                // Create an AJAX request to get barangays for the selected town
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // On successful response, update the barangay table
                        var response = JSON.parse(xhr.responseText);
                        barangays = response; // Store barangay data in the global array
                        populateBarangayTable(barangays);
                    }
                };
                xhr.open("GET", "get_barangays.php?town=" + encodeURIComponent(selectedTown), true);
                xhr.send();
            } else {
                // Clear the barangay table when no town is selected
                barangayTable.innerHTML = "";
            }
        });

        // Function to populate the barangay table
        // Function to populate the barangay table
     // Function to populate the barangay table
    function populateBarangayTable(barangays) {
        var tableHTML = "<table>";
        tableHTML += "<thead style='background-color: #AED8CC; text-align: center;'><tr><th>Barangay Names</th><th>Contact Information</th><th>Barangay Captain</th><th>Captain Contact</th><th>Barangay Secretary</th><th>Secretary Contact</th><th>Edit</th></tr></thead><tbody>";

        barangays.forEach(function(barangay, index) {
            tableHTML += "<tr>";
            tableHTML += "<td>" + barangay.barangay + "</td>";
            tableHTML += "<td contenteditable='true' data-field='contact_number'>" + barangay.contact_number + "</td>";
            tableHTML += "<td contenteditable='true' data-field='brgy_captain'>" + barangay.brgy_captain + "</td>";
            tableHTML += "<td contenteditable='true' data-field='brgy_captain_number'>" + barangay.brgy_captain_number + "</td>";
            tableHTML += "<td contenteditable='true' data-field='brgy_secretary'>" + barangay.brgy_secretary + "</td>";
            tableHTML += "<td contenteditable='true' data-field='brgy_secretary_number'>" + barangay.brgy_secretary_number + "</td>";
            tableHTML += "<td>";
            tableHTML += "<div class='edit-button-group'>";
            tableHTML += "<button class='edit-button' onclick='editField(" + index + ", \"contact_number\")'>Edit Contact Information</button><br>";
            tableHTML += "<button class='edit-button' onclick='editField(" + index + ", \"brgy_captain\")'>Edit BRGY. Captain</button><br>";
            tableHTML += "<button class='edit-button' onclick='editField(" + index + ", \"brgy_captain_number\")'>Edit BRGY. Captain Contact Info</button><br>";
            tableHTML += "<button class='edit-button' onclick='editField(" + index + ", \"brgy_secretary\")'>Edit BRGY. Secretary</button><br>";
            tableHTML += "<button class='edit-button' onclick='editField(" + index + ", \"brgy_secretary_number\")'>Edit BRGY. Secretary Contact Info</button><br>";
            tableHTML += "</div>";
            tableHTML += "</td>";
            tableHTML += "</tr>";
        });

        tableHTML += "</tbody></table>";
        document.getElementById("barangay_table").innerHTML = tableHTML;
    }


        // Function to handle edit button click
        function editField(index, field) {
            if (field === 'barangay') {
                return; // Do not allow editing barangay names
            }

            var fieldName, fieldLabel;
            switch (field) {
                case 'contact_number':
                    fieldName = 'Contact Information';
                    fieldLabel = 'Enter new value for Contact Information:';
                    break;
                case 'brgy_captain':
                    fieldName = 'Barangay Captain';
                    fieldLabel = 'Enter new value for Barangay Captain:';
                    break;
                case 'brgy_captain_number':
                    fieldName = 'Captain Contact';
                    fieldLabel = 'Enter new value for Captain Contact:';
                    break;
                case 'brgy_secretary':
                    fieldName = 'Barangay Secretary';
                    fieldLabel = 'Enter new value for Barangay Secretary:';
                    break;
                case 'brgy_secretary_number':
                    fieldName = 'Secretary Contact';
                    fieldLabel = 'Enter new value for Secretary Contact:';
                    break;
                default:
                    return;
            }

            var barangay = barangays[index];
            var newValue = prompt(fieldLabel, barangay[field]);
            if (newValue !== null) {
                barangay[field] = newValue;
                var fieldCell = document.querySelector("#barangay_table tbody tr:nth-child(" + (index + 1) + ") td[data-field='" + field + "']");
                fieldCell.textContent = newValue;

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status !== "success") {
                            alert("Error updating " + fieldName + ".");
                        }
                    }
                };
                xhr.open("GET", "update_contact.php?barangay=" + encodeURIComponent(barangay.barangay) + "&field=" + encodeURIComponent(field) + "&value=" + encodeURIComponent(newValue), true);
                xhr.send();
            }
        }
    </script>
</body>
</html>
