<?php
include("connect.php");
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM student WHERE student_id=$id") or die($conn->connect_error);
  echo "<script>window.location.replace('students.php')</script>";
}
