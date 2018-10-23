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
     
    <title>Add Employee</title>  
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
                    <h3 class="panel-title"> <img class="mb-6" src="images\u2.png" alt="" width="40" height="40"> ADD Employee details</h3> 
                    <form role="form" method="post" action="insertemp.php">  
                			<fieldset>
                        	<div class="form-group ">
                               Enter name: <input class="form-control" placeholder="name" name="name" type="text" pattern="[A-Za-z ]+" title="Only Letters allowed" required autofocus>
                            </div>  
                            <div class="form-group">  
                               Enter phone: <input class="form-control" placeholder="phone" name="phone" type="text" pattern="[789][0-9]{9}" title="Enter valid Phone number" required>  
                            </div> 
                            <div class="form-group">  
                               Enter email: <input class="form-control" placeholder="E-mail" name="email" type="email" required>  
                            </div>  
                            <div class="form-group">  
                               Enter password: <input class="form-control" placeholder="Password" name="pass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>  
                            </div>  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add" name="register" >  
  							
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
if(isset($_POST['register']))  
{  
    $emp_name=$_POST['name'];//here getting result from the post array after submitting the form. 
    $emp_phone=$_POST['phone']; 
    $emp_pass=md5($_POST['pass']);//same  
    $emp_email=$_POST['email'];//same  
  
//here query check weather if emp already registered so can't register again.  
    $check_email_query="select * from employee WHERE mail='$emp_email'";  
    $run_query=mysqli_query($con,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $emp_email is already exist in our database, Please try another one!')</script>";  
exit();  
    }  
    $mid=$_SESSION['mid'];
//insert the emp into the database.  
    $sql="INSERT INTO `employee` (`name`, `phone`, `mail`, `password`, `mid`) VALUES ('$emp_name', '$emp_phone', '$emp_email', '$emp_pass', '$mid');";  
    $run=mysqli_query($con,$sql); 

    if($run==true)
    {  
        echo"<script>window.open('home.php','_self')</script>";  
        
    }  

}  
  
?>