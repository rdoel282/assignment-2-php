<!--Currently a copy of single image-->



<?php include 'includes/helper.inc.php'; 
    // error checking for empty and if its anything but a ecpected ISO string 
    
    if(empty($_GET['id'])){
        header("Location: error.php");
    }
    $result = sqlResult("select UserID from Users group by LastName");
    while ($row = $result->fetch()) {
        $ISOID = $row['UserID'];
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
    <title>Single Post</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" href="css/captions.css" />

</head>

<body>
    <?php include 'header.inc.php'; ?>
    <main class="container">
        <div class="row col-md-12">
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Post Information</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="postlist">
                                    <?php
                                    $id = $_GET['id'];
                        
                                    $db = new PostGateway($connection);
                                    $result = $db->findByIdJoin($id);
                                    $row = $result;
                                    ?>
                                <div class="row">
                                   <div class="col-md-12"> 
                                      <h2><?php echo $row['Title'] ?></h2>
                                          <div class="details">
                                            Posted by <a href="single-user.php?id=<?php echo $row['UserID'] ?>"><?php echo $row['FirstName'] . " " . $row['LastName'] ?></a>
                                            <span class="pull-right"><?php $time = $row['PostTime']; echo substr("$time", 0, -8); ?></span>
                                          </div>
                                          <br>
                                          <div>
                                            <?php echo $row['Message']; ?>
                                          </div>  <!-- /.row -->
                                           <hr/>
                                    </div>   <!-- end postlist -->         
                            
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Images for Post <?php echo $row['Title'] ?></div>
                        <div class="panel-body">
                        <?php     
                            $db = new PostimagesGateway($connection);
                            $result = $db->findByIdJoin2($id);
                            foreach ($result as $row) {
                                $img = "images/square-small/" . $row['Path'];
                                $imgId = $row['ImageID'];
                                //generateLink("single-image.php", $row['ImageID'], "list-group-item", $row['Title']);
                                generateLinkwImg("single-image.php?imgId=$imgId", "col-md-1", "", $img, $row['Description'], "");
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

