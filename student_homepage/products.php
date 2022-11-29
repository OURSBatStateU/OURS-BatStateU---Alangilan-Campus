<?php
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
    <link rel="stylesheet" href="products.css" type="text/css" />
    <title>OURS Homepage</title>
  </head>
  <body>
    <a href="Cart/Cart.php?id=<?=$username;?>" id="myBtn"><i class="fa fa-shopping-cart"></i></a>
    <script src="hp.js"></script>
    <ul>
        <li><a href="homepage.php?id=<?=$username;?>">Home</a></li>
        <li><a href="products.php?id=<?=$username;?>" style="background-color: #b5afaf;">Products</a></li>
    </ul>
  <section class="type-a">
    <p class="mainHeader">School Uniform</p>
      <br>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
            <a href="pd1.php?id=<?=$username;?>">
              <img src="img/pr1.png" width="auto" height="auto">
            </a>
            <p class="text_gallery">COLLEGE BARONG</p>
            <p class="text_gallery1">
              Size: 18/ Small/ Medium/ Large/ XL/ 2XL/3XL/ 4XL/ 5XL/ Special Size
            </p>
            <p class="text_gallery2">
              &#8369; 350.00 - &#8369; 476.00
            </p>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
          <a href="pd2.php?id=<?=$username;?>">
            <img src="img/pr2.png" width="auto" height="auto">
          </a>
            <p class="text_gallery">COLLEGE PANTS</p>
            <p class="text_gallery1">
              Size: 16/ 20/ 24/ 26-30/ 31-34/ 36-38/ 40/ 42/ Special Size
            </p>
            <p class="text_gallery2">
              &#8369; 356.00 - &#8369; 580.00
            </p>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
          <a href="pd3.php?id=<?=$username;?>">
            <img src="img/pr3.png" width="auto" height="auto">
          </a>
            <p class="text_gallery">COLLEGE BLOUSE</p>
            <p class="text_gallery1">
              Size: Small/ Medium/ Large/ XL/ 2XL/3XL/ 4XL/ 5XL/6XL/ Special Size
            </p>
            <p class="text_gallery2">
              &#8369; 315.00 - &#8369; 485.00
            </p>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
          <a href="pd4.php?id=<?=$username;?>">
            <img src="img/pr4.png" width="auto" height="auto">
          </a>
            <p class="text_gallery">COLLEGE SKIRT</p>
            <p class="text_gallery1">
              Size: Small/ Medium/ Large/ XL/ 2XL/3XL/ 4XL/ Special Size
            </p>
            <p class="text_gallery2">
              &#8369; 230.00 - &#8369; 305.00
            </p>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
          <a href="pd5.php?id=<?=$username;?>">
            <img src="img/pr5.png" width="auto" height="auto">
          </a>
            <p class="text_gallery">P.E COLLEGE SHIRT</p>
            <p class="text_gallery2">
              &#8369; 175.00
            </p>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
          <a href="pd6.php?id=<?=$username;?>">
            <img src="img/pr6.png" width="auto" height="auto">
          </a>
            <p class="text_gallery">P.E COLLEGE PANTS</p>
            <p class="text_gallery2">
              &#8369; 270.00
            </p>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
          <a href="pd7.php?id=<?=$username;?>">
            <img src="img/pr7.png" width="auto" height="auto">
          </a>
            <p class="text_gallery">COLLEGE PIN</p>
            <p class="text_gallery2">
              &#8369; 35.00
            </p>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
          <a href="pd8.php?id=<?=$username;?>">
            <img src="img/pr8.png" width="auto" height="auto">
          </a>
            <p class="text_gallery">COLLEGE I.D LACE</p>
            <p class="text_gallery2">
              &#8369; 50.00
            </p>
        </div>
      </div>
  </section>
      <section class="type-b">
          <div class="center">
            <p class="paragraph-2">BATANGAS STATE UNIVERSITY</p>
            <p class="paragraph-1">A premier national university that develops leaders in the global knowledge economy</p>
            <a href="https://www.facebook.com/batstateuofficial" target="_blank" class="fa fa-facebook"></a>
            <a href="https://www.linkedin.com/school/batstateuofficial/" target="_blank" class="fa fa-linkedin"></a>
            <a href="https://www.youtube.com/c/BatangasStateUniversityOfficial" target="_blank" class="fa fa-youtube"></a>
            <a href="https://twitter.com/BatStateU_NEU" target="_blank" class="fa fa-twitter"></a>
            <br /><br />
          <footer>
            <div class="paragraph-1">&copy; Copyright 2022</div></footer>
          </div>
      </section>
</body>
</html>