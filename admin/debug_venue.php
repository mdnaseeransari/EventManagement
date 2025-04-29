<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect.php';
include 'admin_class.php';

echo "<h3>Debugging Venue Functionality</h3>";

// Check database connection
echo "<h4>Database Connection</h4>";
if($conn->ping()) {
    echo "Database connection is working.<br>";
} else {
    echo "Database connection error: " . $conn->error . "<br>";
}

// Check upload directory permissions
echo "<h4>Upload Directory Permissions</h4>";
$upload_dir = 'assets/uploads';
if(is_dir($upload_dir)) {
    echo "Upload directory exists.<br>";
    if(is_writable($upload_dir)) {
        echo "Upload directory is writable.<br>";
    } else {
        echo "Upload directory is not writable! This is a problem.<br>";
    }
} else {
    echo "Upload directory does not exist! This is a problem.<br>";
}

// Check venue table structure
echo "<h4>Venue Table Structure</h4>";
$result = $conn->query("DESCRIBE venue");
if($result) {
    echo "<table border='1'><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . $row['Default'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error checking venue table structure: " . $conn->error . "<br>";
}

// Check existing venues
echo "<h4>Existing Venues</h4>";
$result = $conn->query("SELECT * FROM venue");
if($result) {
    if($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Venue</th><th>Address</th><th>Description</th><th>Rate</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['venue'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['rate'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No venues found in the database.<br>";
    }
} else {
    echo "Error retrieving venues: " . $conn->error . "<br>";
}

// Create a test venue entry
echo "<h4>Test Venue Creation</h4>";
echo "<form method='post'>";
echo "<input type='submit' name='test_venue' value='Create Test Venue Entry'>";
echo "</form>";

if(isset($_POST['test_venue'])) {
    $crud = new Action();
    
    // Set up test data
    $_POST['venue'] = 'Test Venue ' . date('Y-m-d H:i:s');
    $_POST['address'] = 'Test Address';
    $_POST['description'] = 'Test Description';
    $_POST['rate'] = '100';
    
    // Call the save_venue function
    try {
        $result = $crud->save_venue();
        echo "Result: " . ($result == 1 ? "Success" : "Failed: " . $result) . "<br>";
    } catch (Exception $e) {
        echo "Exception: " . $e->getMessage() . "<br>";
    }
}
?> 