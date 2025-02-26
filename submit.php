<?php
$name = $_POST["name"];
$email = $_POST["email"];
$website = $_POST["website"];
$comment = $_POST["comment"];
$gender = $_POST["gender"];

echo "Name: " . htmlspecialchars($name) . "<br>";
echo "Email: " . htmlspecialchars($email) . "<br>";
echo "Gender: " . htmlspecialchars($gender) . "<br>";
echo "Comment: " . htmlspecialchars($comment) . "<br>";
echo "Website: " . htmlspecialchars($website) . "<br>";

$servername = "localhost";
$username = "root";
$password = "shree";
$dbname = "Login";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Use prepared statement to prevent SQL injection
$sql = "INSERT INTO users (name, email, website, comment, gender) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $website, $comment, $gender);

if (mysqli_stmt_execute($stmt)) {
    echo "New record created successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
