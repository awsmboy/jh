<?php
 
 session_start();
 if(!isset($_SESSION['mid'])){
    header('location:login.php');
 }
 ?>
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
    
    <title>Insertion</title>  
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
                    <h3 class="panel-title">Insert Item details</h3>     
                    <form role="form" method="post" action="insertitem.php" enctype="multipart/form-data">  
                        <fieldset>  
                            <div class="form-group">  
                               Enter Item desc/name: <input class="form-control" placeholder="name" name="name" type="text" pattern="[A-Za-z_]+" onkeypress="return AvoidSpace(event)" title="Only Letters and underscore allowed" required autofocus> 
                            </div>  
                            <div class="form-group">  
                               Enter Item price: <input class="form-control" placeholder="price" name="price" type="text" pattern="\d+(\.\d+)?" title="Enter price only"  required>  
                            </div> 
                            <div class="form-group">  
                               Upload image: <input class="form-control" name="img" type="file" required>  
                            </div>   
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add" name="submit" >  
  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
 <?php
    include("footer.php");
?> 
</body>  
  
</html>  
 
<?php  
  
include("dbcon.php");//make connection here  
if(isset($_POST['submit']))  
{  
    $name=$_POST['name'];//here getting result from the post array after submitting the form. 
    $price=$_POST['price']; 
    $imgname=$_FILES['img']['name'];
    $tmpname=$_FILES['img']['tmp_name'];

    move_uploaded_file($tmpname, "images/$imgname");
    
    $check_query="select * from item WHERE idesc='$name'";  
    $run_query=mysqli_query($con,$check_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
        echo "<script>alert('Item $name is already exist in our database, Please try another one!')</script>";  
        exit();  
    } 

//insert the emp into the database.  
    $sql="INSERT INTO `item` (`idesc`, `price`,`img`) VALUES ('$name', '$price','$imgname');";  
    $run=mysqli_query($con,$sql); 

    if($run==true)
    {  
        echo"<script>window.open('home.php','_self')</script>";  
        
    }  
  

}

  
?><script>  
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}</script>