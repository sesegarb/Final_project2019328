<?php
session_start();
include('includes/userconf.php');
include 'includes/connection.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Ger's garage web</title>
  </head>
  <body>

    <!--navbar start-->
    
    <nav class="navbar navbar-expand-lg  my-nav fixed-top">
        <a class="navbar-brand" href="index.php"><img src="img/logo.jpg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span> <i class="fa fa-bars"></i> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link " href="booking.php">Book Now</a>
            </li>
          </ul>
        </div>
      </nav>
         
    <!-- navbar end-->

    <?php
            if (isset($_SESSION['id'])) {

                echo '<li><a href="dash.php"><i class="fa fa-user-o" aria-hidden="true"></i>My Account </a></li>';
                echo '<li><a href="includes/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>';
            } else {
                echo '<li><a href="dash.php"><i class="fa fa-user-o" aria-hidden="true"></i>My Account </a></li>';
            }

            
    

    if (isset($_GET['id'])) {
        $idbk = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM booking WHERE booking_id='$idbk' ";
        $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
        $row = mysqli_fetch_assoc($result);
    }        

    ?>

<h3>Order Details</h3>

<div class="flex-container">
    <div class="details">


        <h4><?php echo $row['reason_of_reservation']  ?> </h4>
        <p><b>Order Number:</b> <?php echo $row['booking_id'] ?></p>

        <br>

        <p><b>Car Make:</b> <?php echo $row['vehicle_make']  ?></p>
        <p><b>Engine Type:</b> <?php echo $row['vehicle_engine_type']  ?></p>
        <p><b>Plan Type:</b> <?php echo $_SESSION['vehicle_type'] ?></p>
        <p><b>Issues:</b> <?php echo $row['reason_of_reservation']  ?></p>
        <p><b>Comments:</b> <?php echo $row['customer_comments'] ?></p>

        <div class="btn-dtls">
            <a href="invoice.php?id=<?php echo $row['booking_id'] ?>" class="print-order-btn"> Print Order</a>
            <a href="dash.php" class="add-comment-btn"> My Orders</a>
            
        </div>

    </div>

</div>


    <!--footer start-->
<footer class="container-fluid">
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-md-4 offset-md-4">Seseg Arbalzhinova</div>
            <div class="col-md-4 text-right">
            <a href="https://www.facebook.com/sesegarbalzhinova"><i class="fa fa-facebook-square" aria-hidden="true"></i>
            <a href="https://www.twitter.com/"> <i class="fa fa-twitter-square" aria-hidden="true"></i>  
            <a href="https://www.instagram.com/thecraicisninety/"> <i class="fa fa-instagram" aria-hidden="true"></i>
            <a href="https://www.linkedin.com/"> <i class="fa fa-linkedin-square" aria-hidden="true"></i>
        </div>
    </div>
</footer>
<!-- footer end-->

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
