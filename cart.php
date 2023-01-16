<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link type="text/css"rel="stylesheet" href="css/mystylesheet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>inFinite</title>
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



     <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h2>My Cart</h2>
            </div>
            <div class="col-lg-9">
                 <table class="table">
                    <thead class="text-center">
                         <tr>
                             <th scope="col">Serial No.</th>
                             <th scope="col">Item Name</th>
                             <th scope="col">Item Price</th>
                             <th scope="col">Quantity</th>
                             <th scope="col">Total</th>
                             <th scope="col"></th>
                         </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            if(isset($_SESSION['cart']))

                                foreach($_SESSION['cart'] as $key => $value)
                                {
                                    $serial_no=$key+1;

                                    echo"
                                    <tr>
                                        <td>$serial_no</td>
                                        <td>$value[Item_Name]</td>
                                        <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'</td>
                                        <td><input class='text-center iquantity' onchange='subTotal()' type='number'
                                        value=$value[Quantity] min='1' max='10'</td>
                                        <td class='itotal'> </td>
                                        <td>
                                        <form action='manage_cart.php' method='POST'>
                                        <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                        <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                        </form></td>
                                    </tr>
                                    ";
                                }

                        ?>
                    </tbody>
                 </table>
            </div>

            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">
                    <h4> Grand Total:</h4>
                    <h5 class="text-right" id="gtotal"></h5>
                    <form action="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Cash On Delivary
                            </label>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block">Make Purchase</button>
                    </form>
                </div>
            </div>
        </div>
     </div>

 <script>
    var gt=0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal=document.getElementById('gtotal');

    function subTotal()
    {
        gt=0;
        for(i=0; i<iprice.length;i++)
        {
            itotal[i].innerText= (iquantity[i].value) * (iprice[i].value);
            gt=gt + ((iquantity[i].value) * (iprice[i].value));
        }
      gtotal.innerText=gt;
    }
    subTotal();

 </script>
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