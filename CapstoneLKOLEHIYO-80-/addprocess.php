<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name"; // Replace 'your_database_name' with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $id_number = $_POST["id_number"];
    $email = $_POST["email"];
    $strand = $_POST["strand"];
    $grade_section = $_POST["grade_section"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO students (name, id_number, email, strand, grade_section, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $id_number, $email, $strand, $grade_section, $username, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Student added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
