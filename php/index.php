
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<link rel="stylesheet" media="screen and (min-width: 426px) and (max-width: 768px)" href="../css/tablet.css">
<link rel="stylesheet" media="screen and (max-width: 425px)" href="../css/mobile.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
session_start();
$dbname = "csv_db 6";
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Sorry failed to connect". mysqli_connect_error());
}

?>
        
<header>
    <section class="section-2">
        <div class="logo"><h1>MobileX</h1></div>
        <button type="button" class = "appointment"><a href="login.html">Signup/Login</a></button>
    </section>
    <nav id="top">

        <div id="toggle-btn">
            <label for="toggle">
                <i class="fas fa-bars"></i>
            </label>   
        </div>

        <input type="checkbox" id="toggle">
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">MOBILE FINDER</a></li>
            <li><a href="compare1.php">COMPARE MOBILES</a></li>
            <li><a href="#Latest">LATEST</a></li>
            <li><a href="#popular">POPULAR</a></li>
            <li><a href="#Upcoming">UPCOMING</a></li>
            <li><a href="#">ABOUT US</a></li>
        </ul>
    </nav>

    <script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {myFunction()};
        
        // Get the header
        var header = document.getElementById("top");
        
        // Get the offset position of the navbar
        var sticky = header.offsetTop;
        console.log(sticky);
        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        }
        </script>
    </header>

    <div class="search-container">
        <input type="text" class="search" placeholder="Search for mobiles, brands, etc.">
        <button class="submit">Search</button>
    </div>
    
    <div class="phone-finder">
        <h2>Find exactly what's best for you</h2>
        <div class="price-filter">
            <h5>Price</h5>
            <p>around</p>
            <ul>
                <li class="options">
                    <a href="result.php?filter=5000" class="filter">5000</a>
                    <a href="result.php?filter=12000" class="filter">10000</a>
                    <a href="result.php?filter=17000" class="filter">15000</a>
                    <a href="result.php?filter=22000" class="filter">20000</a>
                    <a href="result.php?filter=27000" class="filter">25000</a>
                    <a href="result.php?filter=30000" class="filter">30000</a>
                    <a href="result.php?filter=100000" class="filter">All</a>
                </li>
            </ul>
        </div>
    </div>    


    <h3 id="popular">Popular</h3>
    <div class="swiper mySwiper">
    <div class="popular-container swiper-wrapper">
    <?php 
        $sql = "SELECT * FROM `mini_project_1` where `price`>= 15000 LIMIT 5";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          
            echo "<div class='card swiper-slide d-flex justify-content-between align-items-center p-3 h-100' style='width: 18rem; '>
                <img class='card-img-top' src='".$row['Image1']."' alt='Card image cap' style='width: 10rem; height: 60%;'>
                <div class='card-body d-flex flex-column justify-content-between align-items-center text-center'>
                  <h5 class='card-title'>".$row['Company']." ". $row['model']. "</h5>
                  <a href='product.php?rows=".$row['ID']."&price=".$row['price']."' class='btn btn-primary mt-auto'style='width: 12rem; '>View</a>
                </div>
              </div> ";
        }    
    ?> 
    </div>
   
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
    
      </div>

    <h3 id="Upcoming">Upcoming Mobiles</h3>
    <div class="swiper mySwiper">
    <div class="popular-container swiper-wrapper">
    <?php 
        
        $sql = "SELECT * FROM `mini_project_1` LIMIT 5";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)){
          
        

            $product = array($row);
            echo "<div class='card swiper-slide d-flex justify-content-between align-items-center p-3 h-100' style='width: 18rem; '>
                <img class='card-img-top' src='".$row['Image1']."' alt='Card image cap' style='width: 10rem; height: 60%;'>
                <div class='card-body d-flex flex-column justify-content-between align-items-center text-center'>
                  <h5 class='card-title'>".$row['Company']." ". $row['model']. "</h5>
                  <a href='product.php?rows=".$row['ID']."&price=".$row['price']."' class='btn btn-primary mt-auto'style='width: 12rem; '>View</a>
                </div>
              </div> ";
        }    
    ?>
    </div>
    
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
    </div>

    <h3 id="Latest">Latest</h3>
    <div class="swiper mySwiper">
    <div class="popular-container swiper-wrapper">
    <?php 
        $sql = "SELECT * FROM `mini_project_1` LIMIT 5";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='card swiper-slide d-flex justify-content-between align-items-center p-3 h-100' style='width: 18rem; height:100%; '>
                <img class='card-img-top' src='".$row['Image1']."' alt='Card image cap' style='width: 10rem; height: 60%;'>
                <div class='card-body d-flex flex-column justify-content-between align-items-center text-center'>
                  <h5 class='card-title'>".$row['Company']." ". $row['model']. "</h5>
                  <a href='product.php?rows=".$row['ID']."&price=".$row['price']."' class='btn btn-primary'style='width: 12rem; '>View</a>
                </div>
              </div> "; 
        }    
    ?>
    </div>
    
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>  
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        slidesPerGroup:3,
        loop: false,
        loopFillGroupWithBlank: false,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          0:{
            slidesPerView:1,
          },
          520:{
            slidesPerView:2,
          },
          950:{
            slidesPerView:3,
          }
        }
      });
    </script>

    <footer class="bg-dark">
        <div class="container-fluid p-2 bg-dark text-white text-center">
            <h3>Find the best. Buy the Best</h3>
            <br>
            <div class="container">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-md-6 mb-4">
                    <!-- Form -->
                    <form class="form-inline">
                      <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                        aria-label="Search">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </form>
                    <!-- Form -->
                  </div>
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="col-md-6 mb-4">
                    <form class="input-group">
                      <input type="text" class="form-control form-control-sm" placeholder="Your email"
                        aria-label="Your email" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-white my-0" type="button">Sign up</button>
                      </div>
                    </form>
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div> 
        </div>
            
          <div class="container mt-3">
            <div class="row">
              <div class="col-sm-4">
                <h5>Column 1</h5>
                <a>text</a>
                <a>text</a>
                <a>text</a>
              </div>
              <div class="col-sm-4">
                <h5>Column 2</h5>
                <a>text</a>
                <a>text</a>
                <a>text</a>
              </div>
              <div class="col-sm-4">
                <h5>Column 3</h5>
                <a>text</a>
                <a>text</a>
                <a>text</a>
              </div>
            </div>
          </div>
          <hr>
          <div class="footer-copyright text-center py-3">© 2022 Copyright: 
            <a href="/">Mobiles.com</a>
            <div class="float-right col-md-3">
                <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-md white-text mr-3"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-3"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-3"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-3"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-3"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa-lg white-text mr-4"> </i>
          </a>
            </div> 
          </div>
    </footer>
    
</body>
</html>



