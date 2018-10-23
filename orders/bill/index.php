<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
     
    <title>Print Bills</title>
  </head>
<style>
  body{
    background: rgba(0, 0, 0, 0.2);
  }
  .card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

  }

</style>


  <body>
     <?php
    session_start();
  include("header.php");
  ?>
 <div class="container pt-5">
  <div class="row justify-content-md-center">
  
 <div class="card">
  <div class="card-body">  
<h2 align="center">Bill Genration</h2><br>
 
    </head>
      
     
<?php
include('../dbconn.php');	
if(isset($_GET['s']))
{
  if($_GET['s']==1)
    {
    echo "<script type='text/javascript'>alert( 'Sucess' );</script>";

    }
}
?>

<form action=<?php if(!isset($_POST['pno'])) echo 'index.php'; else echo "'process.php' target='_blank'";  ?> method="post">
  <!--  <div class="input-group mb-3">
  
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">Existing Customer</option>
    <option value="2">New Customer</option>
    </select> 
</div>   --> 

    
 
  <div class="form-group">
    <label for="pno">Enter Customer Phone Number</label>
    <input type="text" name="pno" required class="form-control" id="pno" placeholder="ex-888888888" pattern="[789][0-9]{9}" title="Enter 10 digit phone number starting with 7,8 or 9">
  </div>
  <?php
  if(isset($_POST['pno']))
{ 
 	$query=mysqli_query($con, "SELECT cid FROM customer WHERE pno=".$_POST['pno']);
	$row=mysqli_fetch_assoc($query);
	$cid=$row['cid'];
	//echo $cid;
$query=mysqli_query($con, "SELECT * FROM `contains` NATURAL JOIN ord HAVING cid= ".$cid." AND status='unpaid'");
       
       if(mysqli_num_rows($query)){

  ?>

    

    <table class='table table-bordered table-hover' id='tab_logic'>
        <thead>
          
            
            <th class='text-center'>SR.NO</th>
            <th class='text-center'>Item Name</th>
            <th class='text-center'>Quantity</th>
            <th class='text-center'>Price</th>
        </thead>
        <tbody>
       <?php 
       $count=1;
       $total=0;
       	$query=mysqli_query($con, "SELECT * FROM `contains` NATURAL JOIN ord HAVING cid= ".$cid." AND status='unpaid'");
       //	echo "SELECT * FROM `contains` NATURAL JOIN ord HAVING cid= ".$cid." AND status='unpaid'";
            while (  $row =  mysqli_fetch_assoc($query)    )
            {	
				//$row1=mysqli_fetch_assoc($query);
				$q1=mysqli_query($con, "SELECT * FROM `item` where iid = ".$row['iid']);
				$row2=mysqli_fetch_assoc($q1);
				$idesc=$row2['idesc'];
				$price=$row2['price']*$row['quantity'];
				$total=$total+$price;
                
      ?>
        <tr><td class='text-center'><?php echo $count; ?></td>
            
            <td class='text-center'><?php echo $idesc; ?></td>
            <td class='text-center'><?php echo $row['quantity']; ?></td>
            <td class='text-center'><?php echo $price; ?></td>
        </tr>

      <?php //endforeach; 
           $count++;
           }
      }
      ?>


    </tbody>        
</table>


        <tbody> </tbody>
       
      </table>
    </div> 
  <?php
if(mysqli_num_rows($query)){
echo "<button type='submit' class='btn btn-primary'  >Paid & Print Bill </button>";

}else{echo "<center><h3>No Pending Bill Found</center></h3><br></div>";}
?>

 <?php }else{ ?>
<button type="submit" class="btn btn-primary"  >View Bill </button>
	
</form>
</div></div></div></body>
<?Php
}
?>
<script type="text/javascript">
	document.getElementById('pno').value=<?php echo $_POST['pno']?>;
</script>
</html>
