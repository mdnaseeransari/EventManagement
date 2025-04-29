<?php
include 'db_connect.php';
include 'admin_class.php';

// Test delete venue functionality
$crud = new Action();

// Get a venue ID for testing
$venue = $conn->query("SELECT id FROM venue LIMIT 1");
if($venue->num_rows > 0) {
    $venue_id = $venue->fetch_assoc()['id'];
    
    echo "Testing deletion of venue ID: " . $venue_id . "<br>";
    
    // Create a mock POST request
    $_POST['id'] = $venue_id;
    
    // Call the delete function
    $result = $crud->delete_venue();
    
    echo "Result: " . ($result ? "Success" : "Failed") . "<br>";
} else {
    echo "No venues found for testing!";
}
?> 