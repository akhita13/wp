<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "project");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prepare and execute
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verify user
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;

            // Redirect to page.html
            header("Location: page.html");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found. <a href='register.php'>Register here</a>";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
