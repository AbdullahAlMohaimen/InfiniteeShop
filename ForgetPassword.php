<?php
	$host="localhost";
	$user="root";
	$password="";
	$database="shopinfinite";

	$conn=mysqli_connect($host,$user,$password,$database);
	$msgx="";
	if ($conn==false) {
		 die("Connection failed: " . $conn->connect_error);
	}

	if(isset($_POST['forget']))
	{
		$msgx="";
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password_1=mysqli_real_escape_string($conn, $_POST['password_1']);
		$password_2=mysqli_real_escape_string($conn, $_POST['password_2']);

		if($password_1==$password_2)
		{
		    $xpassword = password_hash($password_1, PASSWORD_BCRYPT);
			$sql = "UPDATE account SET password='$xpassword' where email='$email'";

			if (mysqli_query($conn, $sql)) {
			  $msgx="Password reset successfully";
			} else {
			  $msgx="Something wrong!!";
			}
		}
		else
		{
		    $msgx="Password not match";
		}

	}
	else{
	}
	mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link type="text/css"rel="stylesheet" href="css/mystylesheet.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Account</title>
  </head>
  <body>
	<div class="header">
		<div class="container">
			<div class="navbar">
				<div class="logo">
					<img src="images/logo.png" width="126px"alt="logo">
					<p>InfInItE.Mh</p>
				</div>
				<nav>
					<ul id="MenuItems">
					   <li><a href="index.php">Home</a></li>
					   <li><a href="Product.php">Product</a></li>
					   <li><a href="Contact.php">Contact</a></li>
					   <li><a href="Account.php">Account</a></li>
					   <li><a href="About.php">About</a></li>
					</ul>
				</nav>
				    <div>
                       <?php
                        $count=0;
                        if(isset($_SESSION['cart']))
                        {
                            $count= count($_SESSION['cart']);
                        }
                        ?>
                        <a href="cart.php" class="btn btn-outline-success">My Cart (<?php echo"$count"; ?>)</a>
                    </div>
				    <a href="Profile.php"><img src="images/employee.png" class="menu-icon" onclick="menutoggle()"></a>

			</div>
		</div>
	</div>


	<!-- --------------account page------------- -->

  <div class="account-page">
      <div class="container">
          <div class="row">
              <div class="col-2">
                  <img src="images/image1.png" width="100%">
              </div>
              <div class="col-2">
                  <div class="form-container">
					  <p>Forget Password</p>
                      <form id="RegForm" method="post">
                          <input type="email" class="form-control rounded-pill form-control-lg" name="email" placeholder="Email" required>
                          <input type="password" class="form-control rounded-pill form-control-lg" name="password_1" placeholder="New Password" required>
						  <input type="password" class="rounded-pill form-control-lg"name="password_2" placeholder="Confirm Password" required>
                          <button type="submit" name="forget" class="btn">Done</button>
						  <a href="Account.php" >Login</a>
                      </form>
                  </div>
              </div>
			  <div class="error">
				  <?php echo $msgx ?>
			  </div>
          </div>
      </div>
  </div>


	<!-- --------------Footer------------ -->
   <div class="footer">
       <div class="container">
           <div class="row">
               <div class="footer-col-1">
                   <h3>Download Our App</h3>
                   <p>Download App for Android and ios mobile phone</p>
                   <div class="app-logo">
                       <img src="images/play-store.png" alt="">
                       <img src="images/app-store.png" alt="">
                   </div>
               </div>
                  <div class="footer-col-2">
                   <img src="images/infinite.png" >
                   <p>Our Purpose Is Sustainablx Make the Pleasure and Benefits of Sports Accessible to the Many.</p>
               </div>
               <div class="footer-col-3">
                   <h3>Useful Links</h3>
                   <ul>
                       <li>Coupons</li>
                       <li>Blog Post</li>
                       <li>Return Policy</li>
                       <li>Join Affiliate</li>
                   </ul>
               </div>
                <div class="footer-col-4">
                   <h3>Follow Us</h3>
                   <ul>
                       <li>Facebook</li>
                       <li>Twitter</li>
                       <li>Instagram</li>
                       <li>Youtube</li>
                   </ul>
               </div>
           </div>
           <hr>
           <p class="copyright">&#xA9 Copyright 2020-Shop to Abroad</p>
       </div>
   </div>
   <!-- ----JS for toggle menu--------- -->
   <script>
    var MenuItems = document.getElementById("MenuItems");
       MenuItems.style.maxHeight= "0px";
       function menutoggle(){
           if(MenuItems.style.maxHeight == "0px")
               {
                   MenuItems.style.maxHeight ="200px";
               }
           else{
             MenuItems.style.maxHeight ==  "0px";
           }
       }

    </script>

	<!-- -------------js for toggle form-------------->

    <script>

      var LoginForm = document.getElementById("LoginForm");

      var RegForm = document.getElementById("RegForm");

      var Indicator = document.getElementById("Indicator");


      function forget(){
          RegForm.style.transform = "translateX(0px)";
          LoginForm.style.transform = "translateX(0px)";
          Indicator.style.transform = "translateX(100px)";


    </script>


	<script src="js/bootstrap.bundle.min.js" "></script>
  </body>
</html>