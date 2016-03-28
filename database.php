<?php
$servername = "mysql.hostinger.co.il";
$username = "u857564284_user";
$password = "icosahedra";

// Create connection
$conn = new mysqli($servername, $username, $password, "u857564284_algs");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$sql = "INSERT INTO Algorithms (Username, Description, Category, Alg)
VALUES ('nitzan','T pure OLL case.','ZBLL',\"(U) R U R' U R U2 R' U2 R' U' R U' R' U2 R\")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>