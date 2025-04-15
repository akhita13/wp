<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /*body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        form { display: inline-block; text-align: left; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input { width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; }
        button { padding: 8px 12px; background: blue; color: white; border: none; cursor: pointer; }
        .error { color: red; }*/
        :root {
  --primary: #4361ee;
  --primary-light: #4895ef;
  --primary-dark: #3a0ca3;
  --accent: #f72585;
  --light: #f8f9fa;
  --dark: #212529;
  --gray: #6c757d;
  --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

body {
  font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  margin: 0;
  background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
  color: var(--dark);
  line-height: 1.6;
  animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

form {
  width: 100%;
  max-width: 400px;
  padding: 2.5rem;
  background: white;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  transition: var(--transition);
  margin: 20px;
}

form:hover {
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
  transform: translateY(-2px);
}

h1, h2 {
  color: var(--primary-dark);
  margin-bottom: 1.5rem;
  font-weight: 600;
  text-align: center;
}

.input-group {
  margin-bottom: 1.5rem;
  position: relative;
}

input {
  width: 100%;
  padding: 12px 15px;
  margin: 8px 0;
  border: 2px solid #e9ecef;
  border-radius: 8px;
  font-size: 1rem;
  transition: var(--transition);
  background-color: #f8f9fa;
}

input:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
  background-color: white;
}

button {
  width: 100%;
  padding: 14px;
  background: linear-gradient(135deg, var(--primary), var(--primary-dark));
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

button:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
  background: linear-gradient(135deg, var(--primary-light), var(--primary));
}

button:active {
  transform: translateY(0);
}

.error {
  color: #dc3545;
  font-size: 0.9rem;
  margin-top: 0.25rem;
  display: block;
  animation: shake 0.4s;
}

@keyframes shake {
  0%, 100% { transform: translateX(0); }
  20%, 60% { transform: translateX(-5px); }
  40%, 80% { transform: translateX(5px); }
}

/* Responsive adjustments */
@media (max-width: 480px) {
  form {
    padding: 1.5rem;
    margin: 15px;
  }
  
  input, button {
    padding: 12px;
  }
}
    </style>
</head>
<body>

  <h2>Register</h2>
  <form action="register1.php" method="post">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
  </form>
</body>
</html>



<?php
// Start by checking if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "project");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data safely
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($username && $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashed_password);

        try {
            $stmt->execute();
            echo "Registered successfully. <a href='index1.html'>Login here</a>";
        } catch (mysqli_sql_exception $e) {
            echo "Registration failed: " . $e->getMessage();
        }
    } else {
        echo "Username and password are required.";
    }

    $conn->close();
    exit();
}
?>

