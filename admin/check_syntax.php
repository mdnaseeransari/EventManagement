<?php
// Check for syntax errors
$filename = 'admin_class.php';
$output = shell_exec('php -l ' . $filename . ' 2>&1');
echo "<pre>$output</pre>";

// If no syntax errors found, test the specific function structure
if (strpos($output, 'No syntax errors') !== false) {
    // Load the file content
    $content = file_get_contents($filename);
    
    // Check for delete_venue function
    if (preg_match('/function\s+delete_venue\s*\(\s*\)\s*\{(.*?)\}/s', $content, $matches)) {
        echo "Function delete_venue found and appears to be well-formed.\n";
        echo "Function body length: " . strlen($matches[1]) . " characters\n";
    } else {
        echo "Function delete_venue not found or might have syntax issues.\n";
        
        // Try to find where it starts and stops
        if (preg_match('/function\s+delete_venue\s*\(\s*\)\s*\{/s', $content, $startMatch)) {
            echo "Function start found at position: " . strpos($content, $startMatch[0]) . "\n";
            
            // Find the next function after delete_venue
            if (preg_match('/function\s+delete_venue.*?function\s+(\w+)/s', $content, $nextFunction)) {
                echo "Next function after delete_venue is: " . $nextFunction[1] . "\n";
            }
        }
    }
}
?> 