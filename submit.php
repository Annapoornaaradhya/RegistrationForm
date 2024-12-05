<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "registration_form"; // Name of your database

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $password = htmlspecialchars($_POST['password']);

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($dob) || empty($gender) || empty($password)) {
        die("Error: All fields are required.");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, dob, gender, password) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $name, $email, $phone, $dob, $gender, $hashed_password);

    // Execute the query
    if ($stmt->execute()) {
        // Output success page with styling
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Registration Successful</title>
            <style>
                body {
                    background-color: #121212; /* Dark background */
                    color: #f8f8f8; /* Light text */
                    font-family: Arial, sans-serif;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                
                .container {
                    background-color: #1e1e1e; /* Dark gray box */
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
                    text-align: center;
                    width: 80%;
                    max-width: 500px;
                }

                h1 {
                    color: #ff69b4; /* Pink color */
                    font-size: 2.5em;
                    margin-bottom: 20px;
                }

                p {
                    color: #d3d3d3; /* Light gray text */
                    font-size: 1.2em;
                    margin-bottom: 30px;
                }

                .btn {
                    background-color: #ff69b4; /* Pink button */
                    color: #121212; /* Dark text */
                    text-decoration: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    font-size: 1.2em;
                    transition: background-color 0.3s ease;
                }

                .btn:hover {
                    background-color: #ff85c0; /* Lighter pink on hover */
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Registration Successful!</h1>
                <p>Thank you, <strong>$name</strong>. Your registration details have been saved.</p>
                <a href='index.html' class='btn'>Go Back to Registration Form</a>
            </div>
        </body>
        </html>
        ";
    } else {
        // Error page with styling
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Registration Failed</title>
            <style>
                body {
                    background-color: #121212; /* Dark background */
                    color: #f8f8f8; /* Light text */
                    font-family: Arial, sans-serif;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                
                .container {
                    background-color: #1e1e1e; /* Dark gray box */
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
                    text-align: center;
                    width: 80%;
                    max-width: 500px;
                }

                h1 {
                    color: #ff69b4; /* Pink color */
                    font-size: 2.5em;
                    margin-bottom: 20px;
                }

                p {
                    color: #d3d3d3; /* Light gray text */
                    font-size: 1.2em;
                    margin-bottom: 30px;
                }

                .btn {
                    background-color: #ff69b4; /* Pink button */
                    color: #121212; /* Dark text */
                    text-decoration: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    font-size: 1.2em;
                    transition: background-color 0.3s ease;
                }

                .btn:hover {
                    background-color: #ff85c0; /* Lighter pink on hover */
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Registration Failed</h1>
                <p>We encountered an issue saving your details. Error: {$stmt->error}</p>
                <a href='index.html' class='btn'>Go Back to Registration Form</a>
            </div>
        </body>
        </html>
        ";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
