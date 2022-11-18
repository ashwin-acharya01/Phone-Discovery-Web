<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../css/compare.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" media="screen and (min-width: 426px) and (max-width: 768px)" href="../css/tablet.css">
    <link rel="stylesheet" media="screen and (max-width: 425px)" href="../css/mobile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/561064de78.js" crossorigin="anonymous"></script>
    <title>Compare</title>
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
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php">MOBILE FINDER</a></li>
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
    </header>
    <main>
        <div class="compare-text">
            <h1>Compare Your Favourite Phones</h1>
            <p>Select the phones you want to compare from the dropdown</p>
        </div>
        <div class="compare-box">
        <form class="dw" action="" method = "post">
            <select class="form-select" name="d1" aria-label="Default select example">
                <?php
                $sql = "SELECT ID,Company,model FROM `mini_project_1`";
                $result = mysqli_query($conn, $sql);
        
                while($row = mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['ID']."'>".$row['Company']." ".$row['model']
                     ."</option>
                   ";
            }
            ?>
            </select>
            <select class="form-select" name="d2" aria-label="Default select example">
                <?php
                $sql = "SELECT ID,Company,model FROM `mini_project_1`";
                $result = mysqli_query($conn, $sql);
        
                while($row = mysqli_fetch_assoc($result)){
                     echo "
                     <option value='".$row['ID']."'>".$row['Company']." ".$row['model']."</option>
                   ";
            }
            ?>
            </select>

            <input type="submit" name="submit" value="Compare">
        </form>
        <h2 class="head2-text">Comparison Results...</h2>
        </div>
        <?php 
        if(isset($_POST['submit'])){
            if(!empty($_POST['d1']) && !empty($_POST['d2'])) {
                $selected1 = $_POST['d1'];
                $selected2 = $_POST['d2'];
                $sql1 = "SELECT * FROM `mini_project_1` WHERE `id` = '$selected1'";
                $sql2 = "SELECT * FROM `mini_project_1` WHERE `id` = '$selected2'";
                $res1 = mysqli_query($conn, $sql1);
                $res2 = mysqli_query($conn, $sql2);
                $result1 = mysqli_fetch_array($res1);
                $result2 = mysqli_fetch_array($res2);
                echo"
                <table class = 'comp-table'>
                        <tr>
                            <th style='width:20%'>Features</th>
                            <th style='width:40%'>".$result1['Company']." ".$result1['model']."</th>
                            <th style='width:40%'>".$result2['Company']." ".$result2['model']."</th>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src = '".$result1['Image1']."' alt = 'Phone1 img' height = 300></td>
                            <td><img src = '".$result2['Image1']."' alt = 'Phone1 img' height = 300></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>Rs. ".$result1['price']."</td>
                            <td>Rs. ".$result2['price']."</td>
                        </tr>
                        <tr>
                            <td>Camera</td>
                            <td>".$result1['camera_front_mp']."+".$result1['camera_rear_mp']."</td>
                            <td>".$result2['camera_front_mp']."+".$result2['camera_rear_mp']."</td>
                        </tr>
                        <tr>
                            <td>Processor</td>
                        </tr>
                        <tr>
                            <td>RAM/ROM</td>
                            <td>".$result1['ram (GB)']."/".$result1['rom']."</td>
                            <td>".$result2['ram (GB)']."/".$result2['rom']."</td>
                        </tr>
                        <tr>
                            <td>CPU/GPU</td>
                            <td>".$result1['cpu']."/".$result1['gpu']."</td>
                            <td>".$result2['cpu']."/".$result2['gpu']."</td>
                        </tr>
                        <tr>
                            <td>Battery</td>
                            <td>".$result1['batterie_mah']."maH</td>
                            <td>".$result2['batterie_mah']."maH</td>
                        </tr>
                        <tr>
                            <td>Display</td>
                        </tr>
                        <tr>
                            <td>Dimensions</td>
                            <td>".$result1['Dimension (b)(cm)']." x ".$result1['dimension (h)(cm)']."</td>
                            <td>".$result2['Dimension (b)(cm)']." x ".$result2['dimension (h)(cm)']."</td>
                        </tr>
                        <tr>
                            <td>Camera Score</td>
                            <td>".number_format((float)$result1['camera_nor']*5,1,'.','')."</td>
                            <td>".number_format((float)$result2['camera_nor']*5,1,'.','')."</td>
                        </tr>
                        <tr>
                            <td>Display Score</td>
                            <td>".number_format((float)$result1['screen_size_nor']*5,1,'.','')."</td>
                            <td>".number_format((float)$result2['screen_size_nor']*5,1,'.','')."</td>
                        </tr>
                        <tr>
                            <td>Processor Score</td>
                            <td>".number_format((1-(float)$result1['nm_size_nor'])*5,1,'.','')."</td>
                            <td>".number_format((1-(float)$result2['nm_size_nor'])*5,1,'.','')."</td>
                        </tr>
                        <tr>
                            <td>RAM Score</td>
                            <td>".number_format((float)$result1['ram_nor']*5,1,'.','')."</td>
                            <td>".number_format((float)$result2['ram_nor']*5,1,'.','')."</td>
                        </tr>";
                                       
                    
                //echo number_format((float)$var_name,1,'.',''); 
                $cam = $result1['camera_nor'];
                $proc = 1 - $result1['nm_size_nor'];
                $screen = $result1['screen_size_nor'];
                $ram = $result1['ram_nor'];
                $cam2 = $result2['camera_nor'];
                $proc2 = $result2['nm_size_nor'];
                $screen2 = $result2['screen_size_nor'];
                $ram2 = $result2['ram_nor'];
                $phone1 = $cam + $proc + $screen + $ram;
                $phone2 = $cam2 + $proc2 + $screen2 + $ram2;

                if($phone1 > $phone2){
                    echo "
                        <tr>
                            <td>Winner/Loser</td>
                            <td><i class='fa-sharp fa-solid fa-check'></i></td>
                            <td><i class='fa-sharp fa-solid fa-xmark'></i></td>
                        </tr>
                        </table>
                    ";
                }
                else{
                    echo "
                    <tr>
                    <td>Winner/Loser</td>
                    <td><i class='fa-sharp fa-solid fa-xmark'></i></td>
                    <td><i class='fa-sharp fa-solid fa-check'></i></td>
                        </tr>
                        </table>
                    ";
                }
 
            } else {
                echo 'Please select Both devices for comparison.';
            }
            }
        ?>
    </main>
    
</body>
</html>