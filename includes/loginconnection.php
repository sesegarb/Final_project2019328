<?php
// check if user got to this page by clicking login button.
if (isset($_POST['login-btn'])) {

  require 'connection.php';

  $email_login = $_POST['email'];
  $password_login = $_POST['password'];

  // check for any empty inputs
  if (empty($email_login) || empty($password_login)) {
    header("Location: ../login.php?error=emptyfields&mailuid=".$email_login);
    exit();
  }
  else {

    // connect to the database using prepared statements which work by sending SQL to the database
    $sql = "SELECT * FROM customers WHERE name_user=? OR email_user=?;";
    // initialize a new statement using the connection from the dbh.inc.php file.
    $stmt = mysqli_stmt_init($conn);
    // prepare SQL statement AND check
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // If there is an error send the user back to the signup page.
      header("Location: ../login.php?error=sqlerror");
      exit();
    }
    else {

      // If there is no error continue the script

      // Next bind the type of parameters to pass into the statement, and bind the data from the user.
      mysqli_stmt_bind_param($stmt, "ss", $email_login, $email_login);
      // execute the prepared statement and send it to the database!
      mysqli_stmt_execute($stmt);
      // get the result from the statement.
      $result = mysqli_stmt_get_result($stmt);
      // tore the result into a variable.
      if ($row = mysqli_fetch_assoc($result)) {
        // match the password from the database with the password the user submitted
        $pwdCheck = password_verify($password_login, $row['password_user']);
        // If on't match create an error message!
        if ($pwdCheck == false) {
          // If rror send the user back to the signup page.
          header("Location: ../login.php?error=wrongpwd");
          exit();
        }
        // if DO match, it is correct
        else if ($pwdCheck == true) {

          // create session variables based on the users information from the database

          // need to start a session HERE to be able to create the variables!
          session_start();
          // And NOW we create the session variables.
          $_SESSION['id_user'] = $row['id'];
          $_SESSION['name'] = $row['name_user'];
          $_SESSION['email'] = $row['email_user'];
          $_SESSION['phone'] = $row['phone_user'];
          $_SESSION['vehicleType'] = $row['vehicle_type'];
          $_SESSION['vehicleMake'] = $row['vehicle_make'];
          $_SESSION['vehicleEngine'] = $row['vehicle_engine'];
          $_SESSION['address'] = $row['address_user'];
          $_SESSION['service_type'] = $row['service_type'];
          $_SESSION['licence'] = $row['l_details'];

          

          // Now the user is registered as logged in and we can now take them back to the front page
          header("Location: ../dash.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../login.php?login=wronguidpwd");
        exit();
      }
    }
  }
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../index.php");
  exit();
}
