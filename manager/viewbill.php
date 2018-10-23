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
    <title>View Bill</title>  
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
    <h1 align="center">Bills</h1> 

    <div align="center">
	<div class="panel-body">
		<form method="post">
			<div class="form-group">
				
			<input type="Date" name="startdate"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>&nbsp
			<input type="Date" name="enddate"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                         &nbsp&nbsp 
			<input class="btn btn-primary" type="submit" name="submit" value="Search"> 
			</div>

		</form>
	</div>
	</div>

<center> 
<div class="table-responsive" id="tbl"><!--this is used for responsive display in mobile and other devices-->  
  
  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
  
            <th>Bill Id</th>  
            <th>Customer Name</th>  
            <th>Amount</th>
            <th>Date & Time</th>  
               
        </tr>  
        </thead>  
  
    <?php  
    if (isset($_POST['submit'])) 
	{  
		include("dbcon.php");

		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];

        $view_users_query="SELECT * FROM `bill` natural join `customer` WHERE btime between '$startdate' and '$enddate' order by btime";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  		if(mysqli_num_rows($run)<1)
        {
            echo "NO record found";
        }
			else
			{	
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $name=$row['name'];  
            $bid=$row['bid'];
            $amount=$row['amount'];  
            $time=$row['btime'];  
           
  
        ?>  
  
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $bid;  ?></td>  
            <td><?php echo $name;  ?></td>  
            <td><?php echo $amount;  ?></td>  
            <td><?php echo $time;  ?></td>
            </tr>  
  
        <?php
         } 
}
}
         ?>  
  
    </table>  
        </div>
        <input type="button" class="btn btn-primary" value="Print" name="print" onclick="printrep()"></center> 

</div>  
</div>
<script type="text/javascript"> 
function printrep()
{
var prtContent = document.getElementById("tbl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
 WinPrint.document.write(' <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> <center> <h2><b>Report</B></h2></center>');
 
 WinPrint.document.write(prtContent.innerHTML);

WinPrint.document.close();
WinPrint.print();
WinPrint.close();
}

</script>

  <?php
    include("footer.php");
?>
</body>  
  
</html>