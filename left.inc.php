
            <aside class="col-md-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Continents</div>
                    <ul class="list-group">
                       
                       <?php   
                       $result = sqlResult("select ContinentName, ContinentCode from Continents");
                        while ($row = $result->fetch()) {
                        // generateLink("browse-images.php", $row['ContinentCode'], "list-group-item", $row['ContinentName']);
                        echo "<a href='browse-images.php?continent=" . $row['ContinentCode'] . "' class='list-group-item' >" . $row['ContinentName'] . "</a>";
                        }
                       ?>
                       
                    </ul>
                </div>
                <!-- end continents panel -->

                <div class="panel panel-info">
                    <div class="panel-heading">Popular</div>
                    <ul class="list-group">
                      
                       <?php   
                       $result = sqlResult("select CountryName,ISO from Countries inner join ImageDetails on Countries.ISO = ImageDetails.CountryCodeISO group by CountryName");
                        while ($row = $result->fetch()) {
                        generateLink("single-country.php", $row['ISO'], "list-group-item", $row['CountryName']);
                        }
                       ?>
                        
                    </ul>
                </div>
                <!-- end continents panel -->
            </aside>