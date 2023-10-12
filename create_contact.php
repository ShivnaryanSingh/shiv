<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $organisation = $_POST["organisation"];

    // You can perform further validation and sanitization of the data if needed

    // Connect to your database (replace these values with your actual database credentials)
    $servername = "localhost";
    $dbname = "portfolio";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the data into a database table (replace "your_table" with your actual table name)
    $sql = "INSERT INTO contactUs (name, phone, email, organisation) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $phone, $email, $organisation);

    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Form not submitted!";
}
?>