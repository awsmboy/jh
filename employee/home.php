<?php
 
 session_start();
 if(!isset($_SESSION['eid'])){
	header('location:login.php');
	
 }
?>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<html>
 <head>
	<title></title>
	
</head>
<style>
.fixed-bg {
    background-image: url("images/cafe.jpg");
    min-height: 500px;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<body class="fixed-bg">
	<?php
	include("header.php");
	?>
	<div class="container">	
		<h2 class="text-center text-success">Welcome <?php echo $_SESSION['uname']; ?></h2>
	</div><hr>
	<div class="container">
	 <div class="row">

      <div class="col-sm-4 py-2">
            <div class="card border-primary">
                <div class="card-body">
                    <h3 class="card-title">Check availability</h3>
                    <p class="card-text">View Item details.</p>
                    <a href="itemlist.php" class="btn btn-outline-secondary" >View</a>
                </div>
                <div class="card-footer">
                 <small>Click on button to view</small>
                </div>
            </div>
        </div>
      <div class="col-sm-4 py-2">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h3 class="card-title">Add order</h3>
                    <p class="card-text">Add a new customer and order</p>
                    <a href="../orders" class="btn btn-outline-light">Add</a>
                </div>
                <div class="card-footer">
                 <small class="text-white">Click on button to insert</small>
                </div>
            </div>
        </div>
    <div class="col-sm-4 py-2">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h3 class="card-title">Generate Bill</h3>
                    <p class="card-text">Paid and Generate bill</p>
                    <a href="../orders/bill" class="btn btn-outline-light">Add</a>
                </div>
                <div class="card-footer">
                 <small class="text-white">Click on button to add</small>
                </div>
            </div>
        </div>
  
   
  
</div>
</div>
<br><br><br><br><br><br><br><br>
<?php
    include("footer.php");
?>
</body>
</html>	