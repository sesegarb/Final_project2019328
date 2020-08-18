<?php
if (isset($_POST['submit'])) {
    require 'connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$make = mysqli_real_escape_string($conn, $_POST['make']);
$licence = mysqli_real_escape_string($conn, $_POST['licence']);
$engine = mysqli_real_escape_string($conn, $_POST['engine']);
$reason = mysqli_real_escape_string($conn, $_POST['reason']);
$comments = mysqli_real_escape_string($conn, $_POST['comments']);
$service = mysqli_real_escape_string($conn, $_POST['service-type']);

// QUERY
$query = mysqli_query($conn, "INSERT INTO booking(id, usr_name,email,phone_number,vehicle_type,vehicle_make, vehicle_licence_details, vehicle_engine_type, reason_of_reservation, customer_comments, service_type) VALUES('$id', '$name','$email','$phone','$type','$make', '$licence', '$engine', '$reason', '$comments', '$service' ) ");
if ($query) {
    $_SESSION['id'] = $conn->insert_id;
    session_start();

    $_SESSION['phone'] = $row['phone_number'];
    $_SESSION['type'] = $row['vehicle_type'];
    $_SESSION['make'] = $row['vehicle_make'];

    header('location: ../dashboard.php?booking=success');
    exit();
} else {
    $_SESSION['error'] = "Sorry, invalid input";
}
}