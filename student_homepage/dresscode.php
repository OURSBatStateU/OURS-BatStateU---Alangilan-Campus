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
    <title>OURS Homepage</title>
	
	<style>
		<?php include 'dresscode.css'?>
	</style>
	
  </head>
  <body>
    <!--Header & Navigation Bar-->
    <dev class="res">
      <picture>
        <source media="(min-width: 800px)" srcset="img/homepage.png" alt="">
        <source media="(min-width: 400px)" srcset="img/hp_cp.png" alt="">
        <img src="img/hp_cp.png" alt="">
    </dev>
    <ul>
        <li><a href="homepage.php?id=<?=$username;?>">Home</a></li>
        <li><a href="dresscode.php?id=<?=$username;?>" style="background-color: #b5afaf;">Dress Code Policy</a></li>
        <li><a href="products.php?id=<?=$username;?>">Products</a></li>
		<li class="logout"><a href="logout.php">Log out</a></li>
    </ul>
        <p class="mainHeader">Dress Code Policy</p>
        <section class="type-a">
            <br>
            <div class="col-3 col-s-3 menu">
            <div class="gallery">
                <div class="img-magnifier-container">
                    <img id="myimage1" src="img/dc1.png" width="auto" height="auto">
                    <script>  magnify("myimage1", 3); </script>
                </div>
            </div>
            </div>
            <div class="col-3 col-s-3 menu">
                <div class="gallery">
                    <div class="img-magnifier-container">
                        <img id="myimage2" src="img/dc2.png" width="auto" height="auto">
                        <script>  magnify("myimage2", 3); </script>
                    </div>
                </div>
            </div>
            <div class="col-3 col-s-3 menu">
                <div class="gallery">
                    <div class="img-magnifier-container">
                        <img id="myimage3" src="img/dc3.png" width="auto" height="auto">
                        <script>  magnify("myimage3", 3); </script>
                    </div>
                </div>
            </div>
    </section>

        <div class="col-3 col-s-3 menu">
            <div class="gallery1">
                <p class="head_gallery"><br>Wearing of the following is strictly PROHIBITED inside the University;</p>
                <p class="text_gallery">
                    <br>
                    &#x2022; Slippers of any material, kind or form within the University premises <br>
                    &#x2022; Caps or hats inside the building/classroom <br>
                    &#x2022; Patched and/or torn pants, shirts, etc. <br>
                    &#x2022; Improper, vulgar, and similar offensively-designed pants, shirts, etc. <br> 
                    &#x2022; Spaghetti-strapped, sleeveless, haltered, see-through blouses, midriffs, tube backless, plunging necklines.
                </p>
            </div> </div>
        <div class="col-3 col-s-3 menu">
            <div class="gallery1">
                <p class="text1_gallery">
                    &#x2022; Sando/sleeveless shirts <br>
                    &#x2022; Skirts with slits reaching the upper thigh, micro-mini skirts <br>
                    &#x2022; Shorts, walking shorts, short shorts <br> 
                    &#x2022; Low waist or hip hugging pants, leggings or tights <br> 
                    &#x2022; Wearing of earrings for males <br>
                    &#x2022; Cross-dressing <br>
                </p>
            </div> </div>

        <div class="col-3 col-s-3 menu">
            <div class="gallery1">
                <p class="foot_gallery">
                    <br><br>
                    Sections 10.7.1-9, 10.7.12, 10.7.14 of the <br>
                    Policies and Procedures of the <br>
                    Office of Student Discipline <br><br><br>
                </p>
            </div> </div>
    
            <section class="type-b">
                <div>
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
                </div>
              </section>
        
         
    