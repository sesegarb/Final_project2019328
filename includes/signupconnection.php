<?php
// check if the user got to this page by clicking signup button.
if (isset($_POST['signup-btn'])) {

  require 'connection.php';

  // grab all the data which we passed from signup form.
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];

  // check for any empty inputs
  if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
    header("Location: ../login.php?error=emptyfields&name=".$name."&mail=".$email);
    exit();
  }
  // We check for an invalid e-mail.
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../login.php?error=invalidmail&name=".$username);
    exit();
  }
  // We check if the repeated password is NOT the same.
  else if ($password !== $confirmPassword) {
    header("Location: ../login.php?error=passwordconfirm&name=".$username."&mail=".$email);
    exit();
  }
  else {

    // include another error handler here that checks whether or the username is already taken

    // create the statement that searches database table to check for any identical usernames.
    $sql = "SELECT name_user FROM customers WHERE name_user=?;";
    // create a prepared statement.
    $stmt = mysqli_stmt_init($conn);
    // prepare our SQL statement AND check if there are any errors
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // if there is an error send the user back to the signup page.
      header("Location: ../login.php?error=sqlerror");
      exit();
    }
    else {
      // bind the type of parameters we expect to pass into the statement and bind the data from the user.
      // "s" is "string", "i" is "integer", "b" is "blob", "d" is "double".
      mysqli_stmt_bind_param($stmt, "s", $name);
      // execute prepared statement and send to the database
      mysqli_stmt_execute($stmt);
      // store the result from the statement
      mysqli_stmt_store_result($stmt);
      // get the number of result we received from our statement. This tells whether the username already exists or not
      $resultCount = mysqli_stmt_num_rows($stmt);
      // close the prepared statement
      mysqli_stmt_close($stmt);
      // check if the username exists
      if ($resultCount > 0) {
        header("Location: ../login.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
        // prepare the SQL statement that will insert the users info into the database

        $sql = "INSERT INTO customers (name_user, email_user, password_user) VALUES (?, ?, ?);";
        // we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // prepare SQL statement AND check if there are any errors with it
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If an error send the user back to the signup page.
          header("Location: ../login.php?error=sqlerror");
          exit();
        }
        else {

          // hash the users password 
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          //bind type of parameters expect to pass into the statement, and bind the data from the user.
          mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
          // Then execute the prepared statement and send it to the database
          mysqli_stmt_execute($stmt);
          // send the user back to the signup page with a success message!
          header("Location: ../dashboard.php?signup=success");
          exit();

        }
      }
    }
  }
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../login.php");
  exit();
}
