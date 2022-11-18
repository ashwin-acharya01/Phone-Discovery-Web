
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../css/mycss.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/utility.css">
    <link rel="stylesheet" href="../css/navbar.css">
    
    <title>View Product</title>
</head>
<body>
<header>
<section class="section-2">
        <div class="logo"><h1>MobileX</h1></div>
        <button type="button" class = "appointment"> <a href="login.html">Signup/Login</a></button>
</section>
    <nav id="top">

        <div id="toggle-btn">
            <label for="toggle">
                <i class="fas fa-bars"></i>
            </label>   
        </div>

        <input type="checkbox" id="toggle">
        <ul>
            <li><a href=""index.php>HOME</a></li>
            <li><a href="index.php">MOBILE FINDER</a></li>
            <li><a href="compare.php">COMPARE MOBILES</a></li>
            <li><a href="index.php">LATEST</a></li>
            <li><a href="index.php">POPULAR</a></li>
            <li><a href="index.php">UPCOMING</a></li>
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
<header>
<main class="fl-c">
    <?php
        $sql = "SELECT * FROM `mini_project_1` where `ID` = ".$_GET['rows']."";
        $result = mysqli_query($conn, $sql);
        //$row = mysqli_fetch_assoc($result);

        while($row = mysqli_fetch_assoc($result)){
        echo "<section class='top fl-r'>
        <section class='top-left'>
            <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                <ol class='carousel-indicators'>
                  <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                  <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
                  <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
                </ol>
                <div class='carousel-inner'>
                  <div class='carousel-item active'>
                    <img class='d-block h-40' src='".$row['Image1']."' alt='First slide' ;' >
                  </div>
                  <div class='carousel-item'>
                    <img class='d-block h-40' src='".$row['Image2']."' alt='Second slide'>
                  </div>
                  <div class='carousel-item'>
                    <img class='d-block h-40' src='".$row['Image3']."' alt='Third slide'>
                  </div>
                <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                  <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                  <span class='sr-only'>Previous</span>
                </a>
                <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                  <span class='carousel-control-next-icon' aria-hidden='true'></span>
                  <span class='sr-only'>Next</span>
                </a>
              </div>
        </section>
        <section class='top-right fl-c'>
            <h1>".$row['Company']." ".$row['model']."</h1>
            <h2>Rs. ".$row['price']."</h2>
            <div class='rating fl-r'>
                <div class='rating-comp fl-c'>
                    <h5>User Score</h5>
                    <h2>".$row['Amazon_ratings']."/5</h2>
                </div>
                <div class='rating-comp fl-c'>
                    <h5>Our Score</h5>
                    <h2>4/5</h2>
                </div>               
            </div>
            <button id='comparison-btn'>Add to Compare</button>
        </section>
    </section>
    <h1>Device Specs</h1>
        <section class='bottom grid'>
            
            <div class='performance'>
                <h3>Performance</h3>
                <ul>
                    <li>CPU: ".$row['cpu']."</li>
                    <li>GPU: ".$row['gpu']."</li>
                    <li>RAM: ".$row['ram (GB)']." GB</li>
                    <li>Storage/ROM: ".$row['rom']." GB</li>
                </ul>
            </div>
            <div class='camera'>
                <ul>
                    <h3>Camera</h3>
                    <li>Sensor: ".$row['camera_sensor']."</li>
                    <li>Number of Cameras: ".$row['camera_no']."</li>
                    <li>Front Camera: ".$row['camera_front_mp']."</li>
                    <li>Rear Camera: ".$row['camera_rear_mp']."</li>
                </ul>
            </div>
            <div class='battery'>
                <h3>Battery</h3>
                <ul>
                    <li>Charging Port:".$row['batterie_mah']."</li>
                    <li>Charging Port Type: ".$row['charging_port']."</li>
                    <li>Power: ".$row['charger_w']."</li>
                </ul>
            </div>
            <div class='display'>
                <h3>General</h3>
                <ul>
                    <li>Dimensions: ".$row['Dimension (b)(cm)']." x ".$row['dimension (h)(cm)']." in cms</li>
                    <li>Battery: ".$row['batterie_mah']." mAh</li>
                    <li>Connectivity: ".$row['Connectivity']."</li>
                </ul>
            </div>
        </section>";
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="owl.carousel.min.js"></script>

    <h2>Top Picks based on your Searches....</h2>
    <div class="card-carousel11">
    <div class="container mt-5 mb-5 d-flex flex-wrap justify-content-between align-items-center">
        
                <?php 
                $sql = "SELECT * FROM `mini_project_1` where `price`<= ".$_GET['price'] + 3000 ." AND `price`>= ".$_GET['price'] - 2000 ."";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='owl-carousel owl-theme'>
                    <div class='ml-2 mr-2'>
                    <div class='card'>
                    <img src='".$row['Image1']."' class='card-image-top'>
                    <div class='card-body'>
                    <h5 class='card-title'>".$row['Company']." ".$row['model']."</h5>
                    <a href='product.php?rows=".$row['ID']."&price=".$row['price']."' class='btn btn-primary'style='width: 12rem; '>View</a>
                    </div>
                </div>
                </div>
                </div>";
                }
                ?>
            
        </div>  
    </div>
    </main>;
    
</body>
</html>