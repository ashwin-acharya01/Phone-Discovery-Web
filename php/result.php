<?php
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" media="screen and (min-width: 426px) and (max-width: 768px)" href="../css/tablet.css">
    <link rel="stylesheet" media="screen and (max-width: 425px)" href="../css/mobile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="owl.carousel.min.css" rel="stylesheet">
    <link href="OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Results</title>
</head>
<body>
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
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php">MOBILE FINDER</a></li>
            <li><a href="#">COMPARE MOBILES</a></li>
            <li><a href="analysis.php">ANALYSE</a></li>
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
    <div class = sort>
      <form class="sort-form" action="" method="post">
      <select class="form-select" name ="form-select" aria-label="Default select example">
      <option value="price">Price</option>
      <option value="camera_nor">Camera</option>
      <option value="batterie_mah">Battery</option>
      <option value="rom">Storage</option>
      </select>
      <input type="submit" class="form-submit-btn" name="submit" value="Sort">
      </form>
    </div>

<div class="result-container d-flex flex-wrap justify-content-between align-items-center">
    <?php 
        if(isset($_POST['submit'])){
          if(!empty($_POST['form-select'])) {
            $selected = $_POST['form-select'];
            $sql;
            if($selected == 'price')
              $sql = "SELECT * FROM `mini_project_1` where `price` <= ".$_GET['filter']." ORDER BY $selected";
            else
              $sql = "SELECT * FROM `mini_project_1` where `price` <= ".$_GET['filter']." ORDER BY $selected DESC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              echo "<div class='card res-cards align-items-center p-3' style='width: 18rem; height: 27em;'>
                  <img class='card-img-top' src='".$row['Image1']."' alt='Card image cap'>
                  <div class='card-body d-flex flex-column justify-content-between align-items-center text-center'>
                    <h5 class='card-title'>".$row['Company']." ". $row['model']. "</h5>
                    <a href='product.php?rows=".$row['ID']."&price=".$row['price']."' class='btn btn-primary'style='width: 12rem; '>View</a>
                  </div>
                </div> ";
          }
        }
      }
          else{
        $sql = "SELECT * FROM `mini_project_1` where `price` <= ".$_GET['filter']."";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='card res-cards align-items-center p-3' style='width: 18rem; height: 27em;'>
                <img class='card-img-top' src='".$row['Image1']."' alt='Card image cap'>
                <div class='card-body d-flex flex-column justify-content-between align-items-center text-center'>
                  <h5 class='card-title'>".$row['Company']." ". $row['model']. "</h5>
                  <a href='product.php?rows=".$row['ID']."&price=".$row['price']."' class='btn btn-primary'style='width: 12rem; '>View</a>
                </div>
              </div> ";
        }
      }    
    ?>
    </div>

<div class="foot">
    <h1 class="logo">MobileX</h1>
    <div class="footer-columns">
      <div class="col1">
      <i class="fa-sharp fa-solid fa-phone">+91 7630615368</i>
      <i class="fa-sharp fa-solid fa-envelope">example@mobileX</i>
    </div>
      <div class="col2">
        <a href="#">About Us</a>
        <a href="#">Jobs</a>
        <a href="#">Press</a>
        <a href="#">Blog</a>
      </div>
      <div class="col3">
        <a href="#">Contact Us</a>
        <a href="#">Terms</a>
        <a href="#">Privacy</a>
      </div>
      <div class="col4">
        <i><a href="https://www.facebook.com"><img src="../images/facebook.png" alt="facebook" ></a></i>
        <i><a href="https://www.twitter.com"><img src="../images/twitter.png" alt="twitter" ></a></i>
        <i><a href="https://www.instagram.com/"><img src="../images/instagram.png" alt="instagram" ></a></i>
      </div>
    </div>
    </div> 
</body>
</html>