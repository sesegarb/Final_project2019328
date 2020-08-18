<?php
session_start();
include('includes/connection.php');
include('includes/userconf.php');
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
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php">My Orders<span class="sr-only">(current)</span></a>
            </li>
            <?php
            if(isset($_SESSION['id_user'])) {
                echo '<li class="nav-item">
                <a class="nav-link " href="includes/logout.php">Log out</a>
                
              </li>';

            }
            ?>
            
          </ul>
        </div>
      </nav>
         
    <!-- navbar end-->
    
    <div class="container-dashboard">
        <div class="bar">
            <div class="name-dashboard">
                <h2>
                    <?php
                    if (isset($_SESSION['name'])){
                        echo $_SESSION['name'];

                    }
                ?>
                </h2>

            </div>
            <div class="button-dashboard">
                <a href="booking.php" class="book-btn">New reservation</a>


            </div>
        </div>
        <div class="orders-dashboard">
            
        
            
            
            
         <?php
         $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM booking WHERE id = $id;"; 
        $query = mysqli_query($conn, $sql);
        $britney = mysqli_num_rows($query);
        if ($britney > 0) {

            echo '<div class="order-list">
            <table>
                <thead>
                    <tr>
                        <th> Booking No </th>
                        <th>Name</th>
                        <th>Car</th>
                        <th>Licence</th>
                        <th>Problem</th>
                        <th>Comment</th>
                        <th>Service Type</th>
                        
                    </tr>
                </thead>';

            while ($row = mysqli_fetch_assoc($query)) {
                echo '<tbody>
                <tr>
                    <td> '.$row['booking_id'].' </td>
                    <td> '.$row['usr_name'].' </td>
                    <td> '.$row['vehicle_make'].' </td>
                    <td> '.$row['vehicle_licence_details'].' </td>
                    <td> '.$row['reason_of_reservation'].' </td>
                    <td> '.$row['customer_comments'].' </td>
                    <td> '.$row['service_type'].' </td>
                    
                </tr>
            </tbody>';
            }
        } else{
            echo '<div class="alert">
            <h3>
                No orders yet. Book now. 
            </h3>
            <a href="booking.php" class="book-btn">New reservation</a>
        </div>';
        }


        ?>

                    
                </table>
                
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