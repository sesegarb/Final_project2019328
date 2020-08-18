<?php 

include('includes/userconf.php');
session_start();
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
              <a class="nav-link " href="login.php">Book Now</a>
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
    


    <!--booking page start-->
    <section class="py-5 bg-primary" style="margin-top: 10%"> 
    <div class="container">
	<div class="row">
		<div class="col-md-8">
		    <div class="card shadow">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12 ">
		                        <h5>Booking Form</h5>
		                        <hr>
                                <div class="form-group">
                                 <form class="signup" action="includes/new_booking.php" method="post">
                                    
                                      <input type="text" class="form-control" name="id" value="<?php echo $_SESSION['id_user'] ?>" style="display: none;">
                                      <br>
                                      <input type="text" class="form-control" name="name" placeholder="First & Last Name">
                                      <br>
                                      <input type="text" class="form-control" name="email" placeholder="Email Address">
                                      <br>
                                      <input type="text" class="form-control" name="phone" placeholder="Phone No.">
                                      <br>
                                      <input type="text" class="form-control" name="type" placeholder="Vehicle type">
                                      <br>
                                      <input type="text" class="form-control" name="make" placeholder="Vehicle make">
                                      <br>
                                      <input type="text" class="form-control" name="licence" placeholder="Vehicle licence details">
                                      <br>
                                      <input type="text" class="form-control" name="engine" placeholder="Vehicle engine type">
                                      <br>
                                      <input type="text" class="form-control" name="reason" placeholder="Reason of reservation">
                                      <br>
                                      <input type="text" class="form-control" name="comments" placeholder="Customer comments">
                                      <br>
                                      <select name="service-type"  class="form-control" placeholder="Booking Type">
                    <option value="default">Service Type</option>
                    <option value="Repair Fault">Repair/Fault</option>                    
                    <option value="Major Service">Major Service</option>                    
                    <option value="Major Repair">Major Repair</option>
                    <option value="Annual Service">Annual Service</option>
                </select>
                                      <br>
                                      <input type="submit" class="btn btn-success" name="submit" value="SUBMIT">
                                    
                                  </form>
                                 
                    
                                </div>
                    
                            </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
</section>

    <!--booking page end-->
   

    <!--footer start-->
    <footer class="container-fluid">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-4 offset-md-4">Seseg Arbalzhinova</div>
                <div class="col-md-4 text-right"><i class="fa fa-facebook-square" aria-hidden="true"></i>
                <i class="fa fa-twitter-square" aria-hidden="true"></i>  
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-linkedin-square" aria-hidden="true"></i></div>
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