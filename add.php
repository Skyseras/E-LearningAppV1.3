<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$enroll_number = $_POST['enroll_number'];
$date_of_admission = $_POST['date_of_admission'];

include("connect.php");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  $stmt = $conn->prepare("insert into student(name, email, phone, enroll_number, date_of_admission) values(?, ?, ?, ?, ?)");
  $stmt->bind_param("sssis", $name, $email, $phone, $enroll_number, $date_of_admission);
  $stmt->execute();
  header("location:students.php");
  $stmt->close();
  $conn->close();
}
