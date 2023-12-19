<!DOCTYPE html>
<html>
<head>
    <title>Main MCO Page</title>
    <!-- Add your CSS style here using the provided color palette -->
    <style>
        tr {
            text-align: center;
        }
       select#town {
            background-color: #f2f2f2;
            text-align: center;
            font-size: 20px;
            font-family: 'Times New Roman', serif;
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
            width: 200px;
        }

        select {
            height: 30px;
            border-radius: 5px;
        }

        label {
            font-size: 1.3em;
            font-family: 'Times New Roman', serif;
            display: inline-block;
            vertical-align: middle;
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
            margin-top: 30px;
            background-color: rgba(255, 255, 255, 0.8);

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
            padding-top: 30px;
        }

        body {
            background-image: url('img/logo2.png');
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

        .go-to-main-button {
            display: block;
            margin-top: 20px; /* Add some spacing from the h1 */
            text-align: center;
        }
    </style>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <!-- Header -->
    <h1 class="mt-4">MCO Information</h1>

    <!-- Add MCO Button -->
     <button class="btn btn-primary float-right" onclick="addMCO()">Add MCO</button>


    <!-- Redirect Button to Main Page -->
    <a href="main.php" class="btn btn-primary go-to-main-button">Go back to Main Page</a>

    <!-- MCO Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>MCO Names</th>
                <th>MCO Contacts</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="mcoTableBody">
            <!-- Table rows will be populated dynamically using JavaScript -->
        </tbody>
    </table>
</div>

<script>
    var mcoTableBody = document.getElementById('mcoTableBody');

// Fetch data from get_mco_data.php (replace with your actual file)
fetch('get_mco_data.php')
    .then(response => response.json())
    .then(data => {
        // Populate the table with retrieved data
        data.forEach(mco => {
            var row = document.createElement('tr');
            row.dataset.id = mco.ID;
            row.innerHTML = `
                <td data-field="MCO_Name">${mco.MCO_Name}</td>
                <td data-field="MCO_Contact">${mco.MCO_Contact}</td>
                <td>
                    <button class="btn btn-success edit-button" onclick="editField(${mco.ID}, 'MCO_Name')">Edit MCO Name</button>
                    <button class="btn btn-success edit-button" onclick="editField(${mco.ID}, 'MCO_Contact')">Edit Contact Information</button>
                </td>
            `;
            mcoTableBody.appendChild(row);
        });
    })
    .catch(error => {
        console.error('Error fetching MCO data:', error);
    });

// Function to handle edit button click for MCO Name and Contact Information
function editField(id, field) {
    var fieldName, fieldLabel;

    switch (field) {
        case 'MCO_Name':
            fieldName = 'MCO Name';
            fieldLabel = 'Enter new value for MCO Name:';
            break;
        case 'MCO_Contact':
            fieldName = 'Contact Information';
            fieldLabel = 'Enter new value for Contact Information:';
            break;
        default:
            return;
    }

    var newValue = prompt(fieldLabel);
    if (newValue !== null) {
        // Perform an AJAX request to update the data in the database
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    // Update the table cell with the new value
                    var fieldCell = document.querySelector(`#mcoTableBody tr[data-id="${id}"] td[data-field="${field}"]`);
                    fieldCell.textContent = newValue;
                } else {
                    alert(`Error updating ${fieldName}.`);
                }
            }
        };
        xhr.open('POST', 'update_mco_data.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(`id=${id}&field=${field}&value=${encodeURIComponent(newValue)}`);
    }
}

// Function to add a new MCO
function addMCO() {
    var newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td data-field="MCO_Name" contenteditable="true">New MCO</td>
        <td data-field="MCO_Contact" contenteditable="true">New Contact</td>
        <td>
            <button class="btn btn-success edit-button" onclick="editMCOName(this.parentElement.parentElement)">Edit MCO Name</button><br>
            <button class="btn btn-success edit-button" onclick="editContactInfo(this.parentElement.parentElement)">Edit Contact Info</button>
        </td>
    `;
    mcoTableBody.appendChild(newRow);

    // Save the new data to the database
    var mcoName = 'New MCO'; // Replace with the actual value
    var mcoContact = 'New Contact'; // Replace with the actual value

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
                // Reload the page to reflect the updated data
                location.reload();
            } else {
                alert('Error saving new MCO.');
            }
        }
    };
    xhr.open('POST', 'insert_mco_data.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(`mco_name=${encodeURIComponent(mcoName)}&mco_contact=${encodeURIComponent(mcoContact)}`);
}



</script>
</body>
</html>