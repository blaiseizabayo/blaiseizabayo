<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'FLOWER');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");

    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
  echo "<div style='position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: url(13.jpg); display: flex; align-items: center; justify-content: center;'>
        <div style='background-color: #fff; padding: 20px; text-align: center;font-size:30px;'>
            <strong>Thank you for Contacting Flower Heaven Your Message is highly Appreciated!</strong>
        </div>
    </div>";

    $stmt->close();
    $conn->close();
}

?>
