<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Insert
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $movie = $_POST['movie'];
    $showtime = $_POST['showtime'];
    $seats = $_POST['seats'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $stmt = $conn->prepare("INSERT INTO bookings (name, movie, showtime, seats, email, phone) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $name, $movie, $showtime, $seats, $email, $phone);
    $stmt->execute();
    $stmt->close();
}

// Handle Select
if (isset($_POST['select'])) {
    $result = $conn->query("SELECT * FROM bookings");
    while ($row = $result->fetch_assoc()) {
        echo "Booking: " . $row["name"] . " - Movie: " . $row["movie"] . "<br>";
    }
}

// Handle Update
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $new_seats = $_POST['new_seats'];
    
    $stmt = $conn->prepare("UPDATE bookings SET seats = ? WHERE name = ?");
    $stmt->bind_param("is", $new_seats, $name);
    $stmt->execute();
    $stmt->close();
}

// Handle Delete
if (isset($_POST['delete'])) {
    $name = $_POST['name'];
    
    $stmt = $conn->prepare("DELETE FROM bookings WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
