<?php
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
          </ul>
        </div>
      </nav>
         
    <!-- navbar end-->


    <!--login page start-->
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Login</h3>
                <form method="post" action="includes/loginconnection.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email *" name="email" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" name="password" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" name="login-btn" />
                    </div>
                    <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                    </div>
                </form>
            </div>
            <div class="col-md-6 login-form-2">
                <h3>Register</h3>
                <form method="post" action="includes/signupconnection.php"> 
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name *" name="name" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email *" name="email" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" name="password" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password *" name="confirm-password" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" name="signup-btn"/>
                    </div>
                    <div class="form-group">

                        <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--login page end-->
   

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