<?php
require_once('includes.php');
$api_brands_url = "https://laudsocialdev.azurewebsites.net/Test/GetBrands";
$brands_json = callAPI("GET", $api_brands_url);
if ($brands_json) {
    $brands = json_decode($brands_json);
}
$count = 0;
//echo "<pre>";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Brands Display Page</title>
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
            foreach ($brands as $brand) {
                $count++;
                if ($count % 3 == 1) {
                    echo '<div class="row">';
                }
                ?>
                <div class="col-md-4">
                    <p class="text-center"><a href="detail.php?brandId=<?php echo $brand->Id; ?>"><?php if($brand->Logo) echo "<img src='$brand->Logo' class='img-responsive' />"; ?></a></p>
                    <p class="text-center"><?php echo $brand->Name; ?></p>
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


