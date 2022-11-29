<?php
	$username = $_GET['id'];
	
	//encrypt the username
//	$encrypt_uname = (($username*12345678*7586)/84981);
	
/*
	$link1 = "homepage.php?id=".urlencode(base64_encode($encrypt_uname));
	$link2 = "dresscode.php?id=".urlencode(base64_encode($encrypt_uname));
	
	foreach ($_GET as $key => $username){
		$d2 = $_GET[$key] = base64_decode(urldecode($username));
		
		echo $encrypt_uname2=(($d2*74853)/784932*374621);
	}
*/	
	
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
		<?php include 'style_hp.css'?>
	</style>
	
</head>
<body>   
    
    <!--Header & Navigation Bar-->
    <dev class="res">
      <picture>
        <source media="(min-width: 800px)" srcset="img/homepage.png" alt="">
        <source media="(min-width: 400px)" srcset="img/hp_cp.png" alt="">
        <img src="img/hp_cp.png" alt="">
      </picture>
    </dev>
    <ul>
        <li><a href="homepage.php?id=<?=$username;?>" style="background-color: #b5afaf;" >Home</a></li>
        <li><a href="dresscode.php?id=<?=$username;?>">Dress Code Policy</a></li>
        <li><a href="products.php?id=<?=$username;?>">Products</a></li>
		<li class="logout"><a href="logout.php">Log out</a></li>
    </ul>

    <!--About Section-->
    <p class="mainHeader">ALANGILAN CAMPUS</p>
    <section class="type-a">
      <br>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
            <img src="img/1.JPG" alt="Lounge" width="auto" height="auto" />
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
            <img src="img/2.png" alt="BatStateU" width="auto" height="auto" />
          </a>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
            <img src="img/3.png" alt="Dreamy" width="auto" height="auto" />
          </a>
        </div>
      </div>
      <div class="col-3 col-s-3 menu">
        <div class="gallery">
            <img src="img/4.JPG" alt="Birthday" width="auto" height="auto" />
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="container-p1">
        <p class="paragraph-1">
          Acquired by the university in 1984, Alangilan is the second oldest campus in the university. 
          Located in Golden Country Homes, Brgy. Alangilan, Batangas City, it has total land area of 5.62 hectares; 
          the three colleges and research hubs in the campus occupy 2.89 hectares, while 2.73 hectares were recently acquired for the 
          Knowledge, Innovation, and Science Technology (KIST) Park, the first KIST Park registered under the 
          Philippine Economic Zone Authority in the country. <br><br>
        </p>
    </div>
    </section>

    <div class="boxMain">
      <p class="paragraph-2">Resource Generation Office (RGO)</p>
      <img src="img/rgo1.png" class="img_box">
      <div class="txt_box">
        The Batangas State University is committed to serve the needs of its students, 
        faculty and staff and other members of the BatStateU community through identification of 
        their needs and making these needs available for their convenience. Through the Resource
        Generation Office (RGO), headed by the Vice President for Administration and Finance, 
        the University provides better services as well as University products to its community.
      </div>
      <img src="img/rgo2.JPG" class="img_box">
      <div class="txt_box1">
        <br>
        It caters all purely business activities/ projects/ programs engaged in by the University. 
        Its main function is to generate another means of income and enhance the financial capability of the University. 
        It establishes linkages with the government and private organizations to further enhance the various business activities 
        or affairs of the University.
      </div><br>
      <p class="paragraph-2"> RGO SERVICES</p>
      <img src="img/rgo3.png" class="img_box">
      <div class="txt_box2">
        <br>
        &#x2022; RGO provides quality and affordable school uniforms;<br>
        &#x2022; books directly ordered from the author or authorized publisher to give the best and cheapest price;<br>
        &#x2022; personal accident insurance at lowest cost to ensure that BatStateU students, faculty and staff are covered if an accident result
        to injury, hospitalization and death; <br>    
        &#x2022; improved spaces for canteen tenants to provide a wide variety of food choices at affordable price; <br>
        &#x2022; innovative facilities to use for a very reasonable price; <br>
        &#x2022; University shop that caters quality and affordable souvenirs and items; <br> 
        &#x2022; aromatic coffee shop that serves premium coffee and pastries at affordable price; <br>
        &#x2022; and other businesses that provides the best service to the students and the University. <br>
      </div>
    </div>
    <div class="side">
    <div class="box1">
      <br>
     <p class="paragraph-3">Contact Us</p>
     <br>
     <p class="paragraph-1"> Landline:</p><p class="paragraph-4"> 980-0385/980-0387/980-0394 loc 1221 / 1130</p>
     <p class="paragraph-1"> Email Address:</p><p class="paragraph-4"> rgo.main@g.batastate-u.edu.ph,
      resourcegenerationoffice@gmail.com</p>
      <p class="paragraph-1"> Facebook Page:</p><a class="paragraph-4" href="https://www.facebook.com/RGOAlangilanCampus" target="_blank">
        Batangas State University Resource Generation Office</a><br><br>
    </div>
    </div>
    <!--Contact me section-->
  <section class="type-b">
    <br>
      <div class="center">
      <p class="paragraph-3">BATANGAS STATE UNIVERSITY</p>
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
