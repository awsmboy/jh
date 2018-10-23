<?php
 
 session_start();
 if(!isset($_SESSION['mid'])){
    header('location:login.php');
 }
 ?>

<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-4.1.3-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->  
    <title>View Employee</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 50px;  
  
    }  
  
</style>  
  
<body>  
    <?php
    include("header.php");
    ?>
<div class="container">  
<div class="table-scrol">  
    <h1 align="center">All the Employee</h1>  
  <?php
    if(isset($_GET['deleted'])==true)
    {
    ?>
    <div class="alert alert-success">
      <a href="viewemp.php" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong>user has been deleted!!
    </div>
    <?php
    }
  ?>
  
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
  
  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
  
            <th>User Id</th>  
            <th>User Name</th>  
            <th>User E-mail</th>
            <th>User Phone</th>  
              
            <th>Delete User</th>  
        </tr>  
        </thead>  
  
        <?php  
        include("dbcon.php");  
        $view_users_query="select * from employee where mid=".$_SESSION['mid'];//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $user_id=$row[0];  
            $user_name=$row[1];
            $user_phone=$row[2];  
            $user_email=$row[3];  
            $user_pass=$row[4];    
  
        ?>  
  
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $user_id;  ?></td>  
            <td><?php echo $user_name;  ?></td>  
            <td><?php echo $user_email;  ?></td>  
            <td><?php echo $user_phone;  ?></td>
            
            <td><a href="deleteemp.php?del=<?php echo $user_id ?>"><button class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button></a></td> 
        </tr>  
  
        <?php } ?>  
  
    </table>  
        </div>  
</div>  
</div>  
  <?php
    include("footer.php");
?>
</body>  
  
</html>