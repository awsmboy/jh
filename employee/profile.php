<?php
 
 session_start();
 if(!isset($_SESSION['eid'])){
    header('location:login.php');
 }
?>

<?php  
 
include("dbcon.php");

    $pid=$_GET['eid'];  
    $sql="SELECT * FROM `employee` WHERE `eid`='$pid'";//delete query  
    $run=mysqli_query($con,$sql);  

    $data=mysqli_fetch_assoc($run);
?>
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
      
    <title>Profile</title>  
</head>  
 
<body>  
<?php
    include("header.php");
    ?>
<div class="container pt-5">
    <div class="row justify-content-md-center">
        <div class="col-md-5  ">
            <div class="card">
                <div class="card-body">  
                    <h3 class="panel-title">Employee Profile</h3>     
                    <form role="form">  
                        <fieldset>  
                            <div class="form-group">  
                              Your name: <input class="form-control" name="name" type="text" value=<?php echo $data['name']; ?> readonly="readonly">  
                            </div>  
                            <div class="form-group">  
                              Your phone: <input class="form-control" name="phone" type="text" value=<?php echo $data['phone']; ?> readonly="readonly">  
                            </div> 
                            <div class="form-group">  
                              Your email: <input class="form-control" name="email" type="email" value=<?php echo $data['mail']; ?> readonly="readonly">  
                            </div>  
                            <div class="form-group">  
                               Your password: <input class="form-control" name="pass" type="password" value=<?php echo $data['password']; ?> readonly="readonly">  
                            </div>
                           
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
</body>  
  
</html>  