<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link type="text/css"rel="stylesheet" href="css/mystylesheet.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>inFinite</title>
  </head>
  <body>
  <?php //print_r($_SESSION['cart']) ?>
	<div class="header">
		<div class="container">
			<div class="navbar">
			   <div class="logo">
				   <img src="images/logo.png" width="125px"alt="logo">
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

			<div class="add">
				 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                           <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-2">
                                        <h1>Your Best Shot</h1>
                                        <p><br>Price:98000tk</p>
                                        <h1>OnePlus 9 Pro</h1>
                                        <a href="" class="btn">buy now &#8594;</a>
                                    </div>
                                    <div class="col-2">
                                        <img src="images/oneplus9y.png" alt="image1" width="400" height="364px">
                                    </div>
                                </div>
                           </div>


                           <div class="carousel-item">
                                <div class="row">
                                    <div class="col-2">
                                        <h1>Second slide label</h1>
                                        <p>Success isn't always about greatness. It's about consistency. <br>Consistent hard work gains success.  Greatness will come.</p>
                                        <a href="" class="btn">Explore now &#8594;</a>
                                    </div>
                                    <div class="col-2">
                                        <img src="images/image1.png" alt="image1">
                                    </div>
                                </div>
                           </div>

                           <div class="carousel-item">
                                <div class="row">
                                    <div class="col-2">
                                        <h1>Galaxy Note20 5G | Note20 Ultra 5G</h1>
                                        <p><br>Price:98000tk</p>
                                        <p>It's the ultimate gaming experience that goes where you go<br>It's a director-grade 8K video camera.</p>
                                        <a href="" class="btn">buy now &#8594;</a>
                                    </div>
                                    <div class="col-2">
                                        <img src="images/samsung.png" alt="image1" height="364px">
                                    </div>
                                </div>
                           </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                      </button>
                 </div>
			</div>
		</div>
	</div>


		<div class="fratured_products">
           <h5 style= "color: green; text-align: center; font-weight:bold; font-size: 30px;">Feature Products</h5>
       </div>

		<div class="container mt-5">
		    <div class="row">
		        <?php
		            include ("connection.php");
		            $sql = " SELECT * FROM mobile where status = 'latest' ";
		            $pst = mysqli_query($conn,$sql);
		            if (mysqli_num_rows($pst)>0)
		            {
		                while($row = mysqli_fetch_array($pst))
		                {
		                    ?>
		                    <div class="col-md-3 ">
		                        <br>
		                        <form action="manage_cart.php" method="POST">
                                    <div class="card color:#FF0000 " >
                                        <?php echo '<img src="data:image;base64,'.base64_encode($row['product_image']).'" alt="Image" style= "width:100%; height:300px;"> '; ?>
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?php echo $row['product_Name']; ?></h5>
                                            <p class="card-text">BDT <?php echo $row['product_Price']; ?>.00</p>
                                            <button type="submit" name="Add_to_Cart" class="btn btn-outline-success">Add to Cart</button>
                                            <input type="hidden" name="Item_Name" value="<?php echo $row['product_Name']; ?>">
                                            <input type="hidden" name="Price" value="<?php echo $row['product_Price']; ?>">
                                            <button type="submit" name="Details" class="btn btn-outline-primary">Details</button>
                                            <input type="hidden" name="Item_ID" value="<?php echo $row['product_ID']; ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php
		                }
		            }
		            else
                    {
                            echo "No Latest Product Found";
                    }
                ?>

		    </div>
		</div>

    <div class="fratured_products">
       <h5 style= "color: green; text-align: center; font-weight:bold; font-size: 30px;">Available Products</h5>
   </div>

    <div class="container mt-5">
        <div class="row">
            <?php
                include ("connection.php");
                $sql = " SELECT * FROM mobile where status = 'available' ";
                $pst = mysqli_query($conn,$sql);

                if (mysqli_num_rows($pst)>0)
                {
                    while($row = mysqli_fetch_array($pst))
                    {
                        ?>
                            <div class="col-md-3 ">
                                <form action="manage_cart.php" method="POST">
                                    <div class="card color:#FF0000 " >
                                        <?php echo '<img src="data:image;base64,'.base64_encode($row['product_image']).'" alt="Image" style= "width:100%; height:300px;"> '; ?>
                                        <div class="card-body text-center">
                                            <h6 class="card-title"><?php echo $row['product_Name']; ?></h6>
                                            <p class="card-text">BDT <?php echo $row['product_Price']; ?>.00</p>
                                            <button type="submit" name="Add_to_Cart" class="btn btn-outline-success">Add to Cart</button>
                                            <input type="hidden" name="Item_Name" value="<?php echo $row['product_Name']; ?>">
                                            <input type="hidden" name="Price" value="<?php echo $row['product_Price']; ?>">
                                            <button type="submit" name="Details" class="btn btn-outline-primary">Details</button>
                                            <input type="hidden" name="Item_ID" value="<?php echo $row['product_ID']; ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo "No Available Product Found";
                }
            ?>
        </div>
    </div>



    <div class="fratured_products">
       <h5 style= "color: green; text-align: center; font-weight:bold; font-size: 30px;">Sports Product</h5>
   </div>

    <div class="container mt-5">
        <div class="row">
            <?php
                include ("connection.php");
                $sql = " SELECT * FROM sports where status = 'available' ";
                $pst = mysqli_query($conn,$sql);

                if (mysqli_num_rows($pst)>0)
                {
                    while($row = mysqli_fetch_array($pst))
                    {
                        ?>
                            <div class="col-md-3 ">
                                <form action="manage_cart.php" method="POST">
                                    <div class="card color:#FF0000 " >
                                        <?php echo '<img src="data:image;base64,'.base64_encode($row['product_Image']).'" alt="Image" style= "width:100%; height:300px;"> '; ?>
                                        <div class="card-body text-center">
                                            <h6 class="card-title"><?php echo $row['product_Name']; ?></h6>
                                            <p class="card-text">BDT <?php echo $row['product_Price']; ?>.00</p>
                                            <button type="submit" name="Add_to_Cart" class="btn btn-outline-success">Add to Cart</button>
                                            <input type="hidden" name="Item_Name" value="<?php echo $row['product_Name']; ?>">
                                            <input type="hidden" name="Price" value="<?php echo $row['product_Price']; ?>">
                                            <button type="submit" name="Details" class="btn btn-outline-primary">Details</button>
                                            <input type="hidden" name="Item_ID" value="<?php echo $row['sportsproduct_ID']; ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo "No Available Product Found";
                }
            ?>
        </div>
    </div>


    <!----------------- BRANDS--------------->
   <div class="brands">
       <div class="small-container">
           <div class="row">
               <div class="col-5">
                   <img src="images/logo-godrej.png" >
               </div><div class="col-5">
                   <img src="images/logo-philips.png" >
               </div><div class="col-5">
                   <img src="images/logo-oppo.png" >
               </div><div class="col-5">
                   <img src="images/logo-coca-cola.png" >
               </div><div class="col-5">
                   <img src="images/logo-paypal.png" >
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
           <p class="copyright">&#169 Copyright 2020-Shop to Abroad</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>