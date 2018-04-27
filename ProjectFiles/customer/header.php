<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <base href="../">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ideal Gifts</title>

    <!-- Bootstrap core CSS -->
    <link href="Style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="Style/css/one-page-wonder.min.css" rel="stylesheet">
    <link href="Style/css/login.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <!-- Having navig responsive by creating a button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <button class="nav-link" onclick="document.getElementById('register-modal').style.display='block'" style="width:auto;">Sign Up</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" onclick="document.getElementById('login-modal').style.display='block'" style="width:auto;">Log In</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" onclick="document.getElementById('admin-modal').style.display='block'" style="width:auto;">Admin</button>
            </li>
            <!-- Loggin -->
            <div id="login-modal" class="modal">
                <form class="modal-content animate" action="customer/customerlogin/index.php" method="POST">
                  <div class="imgcontainer">
                    <span onclick="document.getElementById('login-modal').style.display='none'" class="close" title="Close Modal">x</span>
                    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
                  </div>
                  <center> <h2> Log In </h2> </center>
                  <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Email" name="emailAddress" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit" name="login">Login</button>
                  </div>
                </form>
              </div>

          <!-- Register -->
          <div id="register-modal" class="modal">
                <form class="modal-content animate" action="customer/customerregister/index.php" method="POST">
                  <div class="imgcontainer">
                    <span onclick="document.getElementById('register-modal').style.display='none'" class="close" title="Close Modal">x</span>
                    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
                  </div>
                  <center> <h2> Create Account </h2> </center>
                  <div class="container">
        							<label for="fname"><b>First Name</b></label>
        							<input type="text" name="firstName" placeholder="First Name" required/>

                      <label for="lname"><b>Last Name</b></label>
        							<input type="text" name="lastName" placeholder="Last Name" required/>

                      <label for="email"><b>Email</b></label>
        							<input type="text" name="emailAddress" placeholder="example@gmail.com" required/>

                      <label for="pass"><b>Password</b></label>
        							<input type="password" name="password" placeholder="Password" required/>

                      <label for="rpass"><b>Re-enter Password</b></label>
                      <input type="password" name="rpassword" placeholder="Password" required/>

                      <label for="shippingAddress"><b>Shipping Address</b></label>
                      <input type="text" name="shipAddress" placeholder="Shipping Address" required/>

                      <label for="billingAdress"><b>Billing Address</b></label>
                      <input type="text" name="billingAddress" placeholder="Billing Address" required/>

                  <button type="submit" name="register" value="Create Account">Create Account</button>
                  </div>
                </form>
              </div>
          </div>

          <!--admin login -->
          <div id="admin-modal" class="modal">
              <form class="modal-content animate" action="admin/adminlogin/index.php" method="POST">
                <div class="imgcontainer">
                  <span onclick="document.getElementById('admin-modal').style.display='none'" class="close" title="Close Modal">x</span>
                  <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
                </div>
                <center> <h2> Admin Log In </h2> </center>
                <div class="container">
                  <label for="uname"><b>Username</b></label>
                  <input type="text" placeholder="Enter Email" name="emailAddress" required>

                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="password" required>

                  <button type="submit" name="login">Login</button>
                </div>
              </form>
            </div>
          </ul>
      </div>
    </nav>
  </body>
  </html>
