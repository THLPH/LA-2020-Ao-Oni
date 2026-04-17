<?php
session_start();
$error_msg = '';
$file_path = "users.txt"; // Make sure this file exists in your directory

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');
    
    // 1. Mandatory Field Validation
    if (empty($username) || empty($password)) {
        $error_msg = ">>>> ERR: BOTH OPERATOR ID AND PASSCODE ARE REQUIRED.";
    } else {
        $user_exists = false;
        $auth_success = false;

        // 2. Read the file to check for existing users and validate
        if (file_exists($file_path)) {
            // Read file line by line, ignoring empty lines
            $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                // Split the line into username and password
                list($stored_user, $stored_pass) = explode("|", $line);
                
                if ($stored_user === $username) {
                    $user_exists = true; // We found them!
                    if ($stored_pass === $password) {
                        $auth_success = true; // Passwords match
                    }
                    break; // Stop looping once the user is found
                }
            }
        }

        // 3. Routing & Registration Logic
        if ($user_exists && !$auth_success) {
            // User found, but password was wrong
            $error_msg = ">>>> ERR: INVALID PASSCODE.";
        } else {
            // 4. Register if they don't exist yet (Name Reservation)
            if (!$user_exists) {
                $new_entry = $username . "|" . $password . PHP_EOL;
                file_put_contents($file_path, $new_entry, FILE_APPEND);
            }

            // 5. Establish Identity & Redirect to Intro
            $_SESSION['username'] = htmlspecialchars($username);

            header("Location: kowloon_intro.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUST GLOBAL - TERMINAL ACCESS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="terminal-container">
        <div class="header-cell">
            <span>>>>> TRUST_GLOBAL</span>
            <span>[ LOGIN ]</span>
        </div>
        
        <div class="content-cell">
            <span class="sys-text">>>>> SECURE CONNECTION ESTABLISHED...</span>
            
            <?php if (!empty($error_msg)): ?>
                <div class="error-msg"><?php echo $error_msg; ?></div>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="username">Operator ID</label>
                    <input type="text" id="username" name="username" autocomplete="off" placeholder="Enter designation...">
                </div>

                <div class="form-group">
                    <label for="password">Passcode</label>
                    <input type="password" id="password" name="password" placeholder="••••••••">
                </div>
                
                <button type="submit" class="auth-btn">>>>> INITIALIZE UPLINK</button>
            </form>
        </div>
    </div>

</body>
</html>