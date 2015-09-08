<?php
require_once('includes.php');
if(isset($_GET['brandId']) && !empty($_GET['brandId'])){
$api_url = "https://laudsocialdev.azurewebsites.net/Test/GetPosts?brandId=".$_GET['brandId'];    
}else{
    header("Location: index.php");
}

$result_json = callAPI("GET", $api_url);
if ($result_json) {
    $brands = json_decode($result_json);
}else{
    die("Problem with API. Please check.");
}
$count = 0;
//echo "<pre>";
//print_r($brands);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Brands Detail Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
       

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    </head>
    <body>
        <div class="container">

                
                
            
            <?php
            if(!count($brands)) echo '<p class="text-center">No Data</p>';
            foreach ($brands as $brand) {
                $count++;
                if ($count % 3 == 1) {
                    echo '<div class="row">';
                }
                ?>
                <div class="col-md-4">
                    <p class="text-center detail-img"><a href="<?php echo $brand->Link; ?>"><?php if($brand->Image) echo "<img src='$brand->Image' class='img-responsive'  />"; ?></a></p>
                    <h4 class="text-left"><?php echo $brand->Title; ?></h4>
                    <p class="text-left"><?php echo $brand->Description; ?></p>
                </div>
                <?php
                if ($count % 3 == 0) {
                    echo '</div>';
                }
            }
            ?>
        </div>
    </body>
</html>


