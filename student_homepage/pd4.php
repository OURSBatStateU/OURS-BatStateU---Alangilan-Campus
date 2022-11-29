<?php
			
	session_start();

	require_once 'connect.php';
	
	$username = $_GET['id'];
	//encrypt the username id
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script type="text/javascript" src="pd.js"></script>
    <title>OURS Homepage</title>
	
	<style>
		<?php include 'product_details.css'?>
	</style>
	
  </head>
  <body>
    <a href="Cart/Cart.php?id=<?=$username;?>" id="myBtn"><i class="fa fa-shopping-cart"></i></a>
    <script src="hp.js"></script>
    <ul>
        <li><a href="homepage.php?id=<?=$username;?>">Home</a></li>
        <li><a href="products.php?id=<?=$username;?>" style="background-color: #b5afaf;">Products</a></li>
    </ul>
    <br><br>
    <button class="back" onclick="history.back()"><i class="fa fa-arrow-circle-left"></i></button>
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="img/pr4.png">
            </div>
            <div class="col-2">
                <p class="text_gallery">COLLEGE SKIRT</p>
                <p class="text_gallery1">Women's College Skirt</p>
                <div class="small-container1">
                <p class="text_gallery3" id="initial">&#8369; 230.00 - &#8369; 305.00</p>
                  <p class="text_gallery2">Choose Size:</p>
                  <br>
                  <button id="ws_small" class="button" onclick="ws_small()">Small</button>
                  <button id="ws_medium" class="button" onclick="ws_medium()">Medium</button>
                  <button id="ws_large" class="button" onclick="ws_large()">Large</button>
                  <button id="ws_xl"class="button" onclick="ws_xl()">XL</button>
                  <button id="ws_two_xl" class="button" onclick="ws_two_xl()">2XL</button>
                  <button id="ws_three_xl" class="button" onclick="ws_three_xl()">3XL</button>
                  <button id="ws_four_xl" class="button" onclick="ws_four_xl()">4XL</button>
                  <button id="ws_ss" class="button1" onclick="ws_ss()">Special Size</button>
                  <br><br>
                  <p class="text_gallery2">Quantity:</p> 
                  <br>
                  <form action='pd.php' method='POST'>
                    <input name="qty" type="number" value="1" min="0">
                  <br>
                                  
                  <input type="hidden" name="val1" class='text_gallery2' id="val1">				
                  <input type="hidden" name="val2" class='text_gallery2' id="val2">
				  <input type="hidden" name="srcode" value="<?php echo $username;?>" class='text_gallery2' id="srcode">
				  
				  <input type="submit" class="button2" name="addtocart" value ="ADD TO CART">
				  
                  </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</body>
</html>
