<?php include 'includes/helper.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Browse Posts</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    <link rel="stylesheet" href="css/captions.css" />

    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    
</head>

<body>
    <?php include 'header.inc.php'; ?>
    <main class="container">
        <div class="row">
            
            <div class="col-md-10">
                <div class="postlist">
                    <!--replace each of these rows with a function call -->
                    <?php
                    $db = new PostGateway($connection);
                    $result = $db->joinGroupBy();
                    foreach ($result as $row) {
                    ?>
                    <div class="row">
                       <div class="col-md-4"> 
                           <a href="single-image.php?imgId=<?php echo $row['ImageID'] ?>" class=""><img src="images/square-medium/<?php echo $row['Path'] ?>" alt="<?php echo $row['Title'] ?>" class="img-responsive"/></a> 
                       </div>
                       <div class="col-md-8"> 
                          <h2><?php echo $row['Title'] ?></h2>
                          <div class="details">
                            Posted by <a href="single-user.php?id=<?php echo $row['UserID'] ?>"><?php echo $row['FirstName'] . " " . $row['LastName'] ?></a>
                            <span class="pull-right"><?php $time = $row['PostTime']; echo substr("$time", 0, -8); ?></span>
                          </div>
                          <br>
                          <div>
                            <?php $excr=$row['Message']; echo $row['Message']; ?>
                          </div>
                          <p class="pull-right"><a href="single-post.php?id=<?php echo $row['PostID'] ?>" class="btn btn-primary btn-sm">Read more</a></p>
                       </div>
                   </div>  <!-- /.row -->
                   <hr/>
                   <?php } ?>
                </div>   <!-- end postlist -->         
                            
            </div>  <!-- end col-md-10 -->
        </div>   <!-- end row -->
    </main>
  
    <!--<main class="container">  -->
    <!--    <div class="row">-->
    <!--        <div class="col-md-12">-->
    <!--            <div class="panel panel-info">-->
    <!--                <div class="panel-heading">Posts</div> -->
    <!--                    <div class="panel-body">-->
                              
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>    -->
    <!--    </main>-->
        
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