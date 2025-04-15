<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <style>
        :root {
  --primary: #4361ee;
  --primary-hover: #3a56d4;
  --text: #2b2d42;
  --text-light: #8d99ae;
  --border: #edf2f4;
  --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  --transition: all 0.3s ease;
}

body {
  font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
  margin: 0;
  padding: 0;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(135deg, #f5f7fa 0%, #e2e8f0 100%);
  color: var(--text);
  line-height: 1.6;
  animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

form {
  width: 100%;
  max-width: 400px;
  padding: 2.5rem;
  background: white;
  border-radius: 12px;
  box-shadow: var(--shadow);
  transition: var(--transition);
  animation: slideUp 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes slideUp {
  from { transform: translateY(20px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

form:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
  transform: translateY(-3px);
}

label {
  display: block;
  font-weight: 600;
  margin-bottom: 0.5rem;
  color: var(--text);
  font-size: 0.95rem;
  transition: var(--transition);
}

input {
  width: 100%;
  padding: 0.8rem 1rem;
  margin-bottom: 1.5rem;
  border: 2px solid var(--border);
  border-radius: 8px;
  font-size: 1rem;
  transition: var(--transition);
  background-color:rgb(228, 235, 241);
}

input:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
  background-color: white;
}

button {
  width: 100%;
  padding: 0.9rem;
  background-color: var(--primary);
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 1rem;
  font-weight: 600;
  letter-spacing: 0.5px;
  transition: var(--transition);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  position: relative;
  overflow: hidden;
}

button:hover {
  background-color: var(--primary-hover);
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

button:active {
  transform: translateY(0);
}

button::after {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: 0.5s;
}

button:hover::after {
  left: 100%;
}

/* Responsive adjustments */
@media (max-width: 480px) {
  form {
    padding: 1.5rem;
    margin: 1rem;
    max-width: calc(100% - 2rem);
  }
  
  input {
    padding: 0.7rem;
  }
  
  button {
    padding: 0.8rem;
  }
}
    </style>
</head>
<body>

    
    <form method="POST">
        <h2>Enter Your Details</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="1" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required placeholder="1234567890">

       <button type="submit" name="sb">Submit</button>
    </form>
<?php
$con = mysqli_connect('localhost','root','','login_system');
if(isset($_POST['sb']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $phone=$_POST['phone'];

    $query = "INSERT INTO mydata(name,age,email,phone_no)VALUES('$name','$age','$email','$phone')";
    $execute=mysqli_query($con,$query);
}
?>
</body>
</html>