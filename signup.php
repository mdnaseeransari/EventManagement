<?php
session_start();
require_once 'config/database.php';

// AJAX endpoint for checking email and username
if (isset($_POST['check_email']) || isset($_POST['check_username'])) {
    $db = (new Database())->connect();
    $response = ['status' => 'success', 'message' => ''];
    
    if (isset($_POST['check_email'])) {
        $email = filter_var($_POST['check_email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = ['status' => 'error', 'message' => 'Invalid email format'];
        } else {
            $stmt = $db->prepare('SELECT id FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            if ($stmt->fetch()) {
                $response = ['status' => 'error', 'message' => 'Email already registered'];
            }
        }
    }
    
    if (isset($_POST['check_username'])) {
        $username = filter_var($_POST['check_username'], FILTER_SANITIZE_STRING);
        if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $username)) {
            $response = ['status' => 'error', 'message' => 'Username must be 3-20 characters long and contain only letters and numbers'];
        } else {
            $stmt = $db->prepare('SELECT id FROM users WHERE username = :username');
            $stmt->execute(['username' => $username]);
            if ($stmt->fetch()) {
                $response = ['status' => 'error', 'message' => 'Username already taken'];
            }
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Normal form processing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['check_email']) && !isset($_POST['check_username'])) {
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $username = filter_var($_POST['username'] ?? '', FILTER_SANITIZE_STRING);
    $password = $_POST['password'] ?? '';

    // Username validation (alphanumeric, 3-20 characters)
    if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $username)) {
        $error = 'Username must be 3-20 characters long and contain only letters and numbers.';
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password) || strlen($password) < 6) {
        $error = 'Please provide a valid email and password (minimum 6 characters).';
    } else {
        $db = (new Database())->connect();

        try {
            // First, check if the username column exists
            $checkColumn = $db->query("SHOW COLUMNS FROM users LIKE 'username'");
            $usernameColumnExists = $checkColumn->rowCount() > 0;

            if (!$usernameColumnExists) {
                // Add username column if it doesn't exist
                $db->exec("ALTER TABLE users ADD COLUMN username VARCHAR(20) NULL AFTER email");
                // Add unique constraint after adding the column
                $db->exec("ALTER TABLE users ADD UNIQUE INDEX username_unique (username)");
                // Update existing records with a default username based on email
                $db->exec("UPDATE users SET username = CONCAT('user_', id) WHERE username IS NULL");
                // Now make the column NOT NULL
                $db->exec("ALTER TABLE users MODIFY COLUMN username VARCHAR(20) NOT NULL");
            }

            // Check if email or username exists
            $stmt = $db->prepare('SELECT id FROM users WHERE email = :email OR username = :username');
            $stmt->execute(['email' => $email, 'username' => $username]);
            
            if ($stmt->fetch()) {
                $error = 'Email or username already registered.';
            } else {
                // Hash password and insert user
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $db->prepare('INSERT INTO users (email, username, password) VALUES (:email, :username, :password)');
                $stmt->execute([
                    'email' => $email,
                    'username' => $username,
                    'password' => $hashed_password
                ]);

                $_SESSION['user_email'] = $email;
                $_SESSION['username'] = $username;
                header('Location: index.php');
                exit;
            }
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - WIXVENT</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>
        <?php if (isset($error)): ?>
            <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="signup.php" id="signupForm">
            <div class="mb-4">
                <label class="block text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="w-full px-4 py-2 border rounded-lg" required
                       pattern="[a-zA-Z0-9]{3,20}" title="Username must be 3-20 characters long and contain only letters and numbers">
                <p id="username-feedback" class="text-sm mt-1 hidden"></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg" required>
                <p id="email-feedback" class="text-sm mt-1 hidden"></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg" required>
                <p id="password-feedback" class="text-sm mt-1 hidden"></p>
            </div>
            <button type="submit" class="w-full bg-purple-500 text-white py-2 rounded-lg hover:bg-purple-600">Sign Up</button>
        </form>
        <p class="mt-4 text-center">Already have an account? <a href="login.php" class="text-purple-500">Login</a></p>
    </div>

    <script>
        $(document).ready(function() {
            // Function to validate email format
            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }
            
            // Function to validate username format
            function isValidUsername(username) {
                return /^[a-zA-Z0-9]{3,20}$/.test(username);
            }
            
            // Function to validate password
            function isValidPassword(password) {
                return password.length >= 6;
            }
            
            // Validate username in real-time with debounce
            let usernameTimer;
            $('#username').on('input', function() {
                const username = $(this).val();
                const feedbackElement = $('#username-feedback');
                
                // Clear any previous validation
                feedbackElement.removeClass('text-red-500 text-green-500').addClass('hidden');
                
                if (username.length === 0) return;
                
                // Basic format validation
                if (!isValidUsername(username)) {
                    feedbackElement.text('Username must be 3-20 characters and contain only letters and numbers').addClass('text-red-500').removeClass('hidden');
                    return;
                }
                
                // Clear previous timer
                clearTimeout(usernameTimer);
                
                // Set new timer for AJAX check
                usernameTimer = setTimeout(function() {
                    $.ajax({
                        url: 'signup.php',
                        type: 'POST',
                        data: { check_username: username },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'error') {
                                feedbackElement.text(response.message).addClass('text-red-500').removeClass('hidden text-green-500');
                            } else {
                                feedbackElement.text('Username available').addClass('text-green-500').removeClass('hidden text-red-500');
                            }
                        }
                    });
                }, 500);
            });
            
            // Validate email in real-time with debounce
            let emailTimer;
            $('#email').on('input', function() {
                const email = $(this).val();
                const feedbackElement = $('#email-feedback');
                
                // Clear any previous validation
                feedbackElement.removeClass('text-red-500 text-green-500').addClass('hidden');
                
                if (email.length === 0) return;
                
                // Basic format validation
                if (!isValidEmail(email)) {
                    feedbackElement.text('Invalid email format').addClass('text-red-500').removeClass('hidden');
                    return;
                }
                
                // Clear previous timer
                clearTimeout(emailTimer);
                
                // Set new timer for AJAX check
                emailTimer = setTimeout(function() {
                    $.ajax({
                        url: 'signup.php',
                        type: 'POST',
                        data: { check_email: email },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'error') {
                                feedbackElement.text(response.message).addClass('text-red-500').removeClass('hidden text-green-500');
                            } else {
                                feedbackElement.text('Email available').addClass('text-green-500').removeClass('hidden text-red-500');
                            }
                        }
                    });
                }, 500);
            });
            
            // Validate password in real-time
            $('#password').on('input', function() {
                const password = $(this).val();
                const feedbackElement = $('#password-feedback');
                
                feedbackElement.removeClass('text-red-500 text-green-500').addClass('hidden');
                
                if (password.length === 0) return;
                
                if (password.length < 6) {
                    feedbackElement.text('Password must be at least 6 characters').addClass('text-red-500').removeClass('hidden');
                } else {
                    feedbackElement.text('Password strength: Good').addClass('text-green-500').removeClass('hidden text-red-500');
                }
            });
            
            // Form submission validation
            $('#signupForm').on('submit', function(e) {
                const username = $('#username').val();
                const email = $('#email').val();
                const password = $('#password').val();
                let hasError = false;
                
                // Check if there are any error messages displayed
                if ($('#username-feedback').hasClass('text-red-500') || 
                    $('#email-feedback').hasClass('text-red-500') || 
                    $('#password-feedback').hasClass('text-red-500')) {
                    e.preventDefault();
                    return false;
                }
                
                // Perform final validation
                if (!isValidUsername(username)) {
                    $('#username-feedback').text('Username must be 3-20 characters and contain only letters and numbers').addClass('text-red-500').removeClass('hidden');
                    hasError = true;
                }
                
                if (!isValidEmail(email)) {
                    $('#email-feedback').text('Invalid email format').addClass('text-red-500').removeClass('hidden');
                    hasError = true;
                }
                
                if (!isValidPassword(password)) {
                    $('#password-feedback').text('Password must be at least 6 characters').addClass('text-red-500').removeClass('hidden');
                    hasError = true;
                }
                
                if (hasError) {
                    e.preventDefault();
                    return false;
                }
            });
        });
    </script>
</body>
</html>