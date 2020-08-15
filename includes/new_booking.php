<?php
if (isset($_POST['submit'])) {
    require 'connection.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$make = mysqli_real_escape_string($conn, $_POST['make']);
$licence = mysqli_real_escape_string($conn, $_POST['licence']);
$engine = mysqli_real_escape_string($conn, $_POST['engine']);
$reason = mysqli_real_escape_string($conn, $_POST['reason']);
$comments = mysqli_real_escape_string($conn, $_POST['comments']);

// QUERY
$query = mysqli_query($conn, "INSERT INTO booking(usr_name,email,phone_number,vehicle_type,vehicle_make, vehicle_licence_details, vehicle_engine_type, reason_of_reservation, customer_comments) VALUES('$name','$email','$phone','$type','$make', '$licence', '$engine', '$reason', '$comments' ) ");
if ($query) {
    $_SESSION['id'] = $conn->insert_id;
    session_start();

    header('location: ../booking.php?bookingsuccess');
    exit();
} else {
    $_SESSION['error'] = "Sorry, invalid input";
}
}