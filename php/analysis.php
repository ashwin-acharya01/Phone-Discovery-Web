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
    <link rel="stylesheet" href="../css/analysis.css">
    <title>Analysis</title>
</head>
<body>
<?php
    mysqli_select_db($conn, 'csv_db 6');
    $result = mysqli_query($conn, 'Select * from mini_project_1');
    $col = ["ID","price", "Company", "model","Image 1", "Image 2", "Image 3","Amazon_ratings","Sales","Screen_size","resolution","protection","aspect_ratio","processor","cpu","gpu","architecture","ram","nm_size","rom","camera_rear_mp","camera_front_mp","camera_sensor","camera_no","camera_depth_mp","camera_wide_mp","camera_pro_iso","batterie_mah","batterie_type","charging_port","charger_w","dimension_h","dimension_b","thickness","weight","rear_material","waterproof_ip","connectivity","price_nor","screen_size_nor","nm_size_nor","ram_nor","camera_nor","camera_depth_nor","camera_wide_nor"];
    $fp = fopen('file2.csv', 'w');
    fputcsv($fp, $col);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    fputcsv($fp, $row);
}
fclose($fp);
?>
    <!-- <h1>See Analysis</h1>
    <main class="mc">
        <img class="card" src="" data-src="../images/CPU VS sales.png" alt="CPU VS sales"/>
        <br>
        <img class="card" src="" data-src="../images/processorVSprice.png" alt="processorVSprice"/>
        <br>
        <img class="card" src="" data-src="../images/rating vs battery.png" alt="rating vs battery"/>
        <br>
        <img class="card" src="" data-src="../images/brandsVSsales.png" alt="brandsVSsales"/>
        <br>
        <img class="card" src="" data-src="../images/rating vs camera.png" alt="rating vs camera"/>
        <br>
        <img class="card" src="" data-src="../images/rating vs water resistance.png" alt="rating vs water resistance"/>
        <br>
        <img class="card" src="" data-src="../images/sales vs battery.png" alt="sales vs battery"/>
        <br>
        <img class="card" src="" data-src="../images/sales vs camera.png" alt="sales vs camera"/>
        <br>
        <img class="card" src="" data-src="../images/Sales vs RAM.png" alt="Sales vs RAM"/>
        <br>
        <img class="card" src="" data-src="../images/Sales Vs Userratings.png" alt="Sales Vs Userratings"/>
        <br>
        <img class="card" src="" data-src="../images/Sales vs water resistance.png" alt="Sales vs water resistance"/>
        <br>
        <img class="card" src="" data-src="../images/User rating VS cpu.png" alt="User rating VS cpu"/>
        <br>
        <img class="card" src="" data-src="../images/User rating VS RAM.png" alt="User rating VS RAM"/>
        <br>
        <img class="card" src="" data-src="../images/User_ratingsVSprice.png"alt="User_ratingVSprice"/>
</main>
    <script>
        document.querySelectorAll("img").forEach((item)=>{
            item.addEventListener("click", (event) => {
                const image = event.target.getAttribute("data-src");
                event.target.setAttribute("src", image);
            });
        });
        </script> -->
    <canvas>    
</body>
</html>