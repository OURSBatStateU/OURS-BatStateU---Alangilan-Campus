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
                <img src="img/pr5.png">
            </div>
            <div class="col-2">
                <p class="text_gallery">P.E COLLEGE SHIRT</p>
                <p class="text_gallery1">Unisex P.E Top</p>
                <div class="small-container1">
                <p class="text_gallery3" id="initial">&#8369; 175.00</p>
                  <p class="text_gallery2">Choose Size:</p>
                  <br>
                  <button id="PET" class="button1" onclick="PET()">One Size</button>
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
