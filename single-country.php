<?php include 'includes/helper.inc.php'; 
    // error checking for empty and if its anything but a ecpected ISO string 
    
    if(empty($_GET['id'])){
        header("Location: error.php");
    }
    $result = sqlResult("SELECT ISO FROM Countries INNER JOIN ImageDetails ON Countries.ISO = ImageDetails.CountryCodeISO GROUP BY CountryName");
    while ($row = $result->fetch()) {
        $ISOID = $row['ISO'];
        if($_GET['id'] == $ISOID){
            break;
        }
    }
    
    if($_GET['id'] != $ISOID){ 
        header("Location: error.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Single Country</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
   

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
    
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" href="css/captions.css" />

</head>

<body>
    <?php include 'header.inc.php'; ?>
    <main class="container">
    <?php 
    $id = $_GET['id'];
    $db = new CountriesGateway($connection);
    $result = $db->findById($id);
    $row = $result;
    // $result = sqlResult("select CountryName, Area, Capital, Population, CurrencyName, CountryDescription from Countries where ISO = '$id'");
    // $row = $result->fetch();
    ?>
    <div class="row col-md-12">
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Country Information</div>
                        <div class="panel-body">
                            <h3><?php echo $row['CountryName'] ?></h3>
                            <p>Capital: <b><?php echo $row['Capital'] ?></b></p>
                            <p>Area: <b><?php echo number_format($row['Area']) ?> </b>sq km.</p>
                            <p>Population: <b><?php echo number_format($row['Population']) ?></b></p>
                            <p>Currency Name: <b><?php echo $row['CurrencyName'] ?></b></p>
                            <p><?php echo $row['CountryDescription'] ?></p>
                            
                            <div id="map"></div>
                            
                                <script>
                                  function initMap() {
                                      <?php
                                        $id = $_GET['id'];
                                        $db = new ImagesGateway($connection);
                                        $result = $db->findById2($id, "CountryCodeISO"); 
                                        ?>
                                        
                                    
                                    var bounds = new google.maps.LatLngBounds();
                                    
                                    
                                    //var uluru = {lat: 51.1769596, lng: -115.5858991 };
                                    
                                    //bounds.extend(uluru);
                                    var initPoint = {lat: <?php echo $result["Latitude"]?>, lng: <?php echo $result["Longitude"]?> };
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        center: initPoint
                                        
                                    });
                                    var marker = new google.maps.Marker({
                                     position: initPoint,
                                     map: map
                                     });
                                    for( i = 0; i < <?php echo count($result); ?>; i++ ) {
                                            //var position = new google.maps.LatLng(<?php echo $result[i]['Latitude']?>, <?php echo $result[i]['Longitude']?>);
                                            var uluru = {lat: <?php echo $result["Latitude"]?>, lng: <?php echo $result["Longitude"]?> };
                                            bounds.extend(uluru);
                                            marker = new google.maps.Marker({
                                                position: uluru,
                                                map: map,
                                            });
                                        
                                        };
                                    map.fitBounds(bounds);
 
                                  };
                                </script>
                                <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp5osxw8q_Yscu2o6OV48ZcBR3yr4-NAM&callback=initMap">
                                </script>
                        
                    </div>
                    
                    
                </div>
            </div>    
            <div class="row">
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Images from <?php echo $row['CountryName'] ?> </div>
                        <div class="panel-body">
                        <?php
                        $id = $_GET['id'];
                        $db = new ImagesGateway($connection);
                        $result = $db->findById2($id, "CountryCodeISO");
                        foreach ($result as $row) {
                          $img = "images/square-small/" . $row['Path'];
                            generateLink("single-image.php", $row['ImageID'], "list-group-item", $row['Title']);
                            //generateLinkwImg("single-image.php?imgId=$imgId", "col-md-1", "", $img, $row['Description'], "");
                         }
                        
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        </main>    

<footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>