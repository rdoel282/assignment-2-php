<?php include 'includes/helper.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chapter 12</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include 'includes/css-list.php'; ?>
  

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


</head>

<body>
    <?php include 'header.inc.php'; ?>
        <main class="container">
        <div class="panel panel-default">
          <div id="jstest" class="panel-heading">Filters</div>
          <script src="js/image-filter.js"></script>
          <div class="panel-body">
            <form action="browse-images.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
                <?php /* display list of continents */
                     $db = new ContinentsGateway($connection);
                        $result = $db->joinGroupBy();
                        foreach ($result as $row) {
                        
                    // $result = sqlResult("select Continents.ContinentCode, ContinentName from Continents join ImageDetails on Continents.ContinentCode = ImageDetails.ContinentCode group by ContinentName");
                    // while ($row = $result->fetch()) {
                ?>
                         "<option value=<?php echo $row['ContinentCode'] ?>> <?php echo $row['ContinentName']?></option>
                   <?php } ?>
              </select>     
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php /* display list of continents */
                  $db = new CountriesGateway($connection);
                  $result = $db->joinGroupBy();
                  foreach ($result as $row) {
                    // generateLink("single-country.php", $row['ISO'], "list-group-item", $row['CountryName']);
                  
                    // $result = sqlResult("select ISO, CountryName from Countries join ImageDetails on ISO = CountryCodeISO group by CountryName");
                    // while ($row = $result->fetch()) {
                ?>
                         "<option value=<?php echo $row['ISO'] ?>> <?php echo $row['CountryName']?></option>
                   <?php } ?>
              </select> 
              <select name="city" class="form-control">
                <option value="0">Select City</option>
                <?php /* display list of continents */
                    $result = sqlResult("select Cities.CityCode, AsciiName from Cities join ImageDetails on Cities.CityCode = ImageDetails.CityCode group by AsciiName");
                    while ($row = $result->fetch()) {
                ?>
                         "<option value=<?php echo $row['CityCode'] ?>> <?php echo $row['AsciiName']?></option>
                   <?php } ?>
              </select> 
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              <!--<button href="browse-images.php" type="clear" class="btn btn-default">Clear</button>-->
              <a href="browse-images.php" class="btn btn-default" role="button">Clear</a>
              </div>
            </form>

          </div>
        </div>     
                                    
    <div class="panel panel-info">
      <div class="panel-heading">Images <?php echo filterUsed() ?></div>
        <div class="panel-body">
		      <ul class="caption-style-2">
			    <?php 
			    $sqlQuerry = filter();
                $result = sqlResult($sqlQuerry);
                while ($row = $result->fetch()) {
                ?>
                <li>
                    <a href=single-image.php?imgId=<?php echo $row['ImageID']; ?> class=img-responsive >
                     <img src=images/square-medium/<?php echo $row['Path']; ?> alt= <?php echo $row['Title']; ?> >
                          <div class="caption">
                            <div class="blur"></div>
                              <div class="caption-text">
                                  <p> <?php echo $row['Title']; ?> </p>
                              </div>
                          </div>
                  </a>
			  </li>        
            <?php } ?> 
       </ul>       
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