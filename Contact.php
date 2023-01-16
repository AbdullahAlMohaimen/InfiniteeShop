<?php

    $host="localhost";
	$user="root";
	$password="";
	$database="shopinfinite";

	$conn=mysqli_connect($host,$user,$password,$database);
	$msgx="";

	if(isset($_POST['send']))
    {
        $msgx="";
        $name =$_POST['name'];
        $email =$_POST['email'];
        $phone =$_POST['phone'];
        $message =$_POST['message'];

            $sql= "INSERT INTO contact (Name,Email,Phone,Message)
            VALUES('$name', '$email', '$phone', '$message')";

            if(mysqli_query($conn, $sql))
            {
                $msgx="Successfully Send";
            }
            else
            {
                $msgx="Something Wrong";
            }
    }


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


	<!---------------Contact Us----------->
  <div class="contact-page">
	  <section class="location">
		  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3176.8006551069066!2d90.4063402031354!3d23.763833698770767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1616773990607!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	  </section>

	  <section class="contact-us">
		 <div class="row">
			 <div class="contact-col">
				 <div>
					 <i class="fa fa-home"></i>
					 <span>
						 <h5>Shop to Abroad</h5>
						 <p>141 & 142, Love Road<br>Tejgaon Industrial Area, Dhaka</p>
					 </span>
				 </div>
				 <div>
					 <i class="fa fa-phone"></i>
					 <span>
						<h5> Business Center</h5>
						 <p> +8801521209559<br>+8801687424509</p>
					 </span>
				 </div>
				 <div>
					 <i class="fa fa-envelop"></i>
					 <span>
						 <p>Email us your query</p>
						 <h6>mohaimenhasan7@gmail.com<br>salmanchy192786@gmail.com </h6>
					 </span>
					 <div class="error">
                          <?php echo $msgx ?>
                      </div>
				 </div>
			 </div>
			 <div class="contact-col">

		<form id="RegForm" method="post">
			<input type="text" class="form-control rounded-pill form-control-lg" name="name" placeholder="Enter your name" required>
			<input type="email" class="form-control rounded-pill form-control-lg" name="email" placeholder="Email address" required>
			<input type="phone" class="form-control rounded-pill form-control-lg" name="phone" placeholder="Enter your phone no" required>
			<textarea  rows="8" class="form-control form-control-lg"name="message" placeholder="Write your Message here" required></textarea>
			<button type="submit" name="send" class="btn">Send Message</button>
		</form>

			 </div>
		 </div>

	  </section>
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


	<script src="js/bootstrap.bundle.min.js" "></script>
  </body>
</html>