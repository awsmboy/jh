<?php 
include('dbconn.php');
$data=json_decode($_POST['item']);
$cid;
$quantity;
$oid;
$iid;
session_start();
$eid=$_SESSION['eid'];
if(isset($_POST['pno'])){
	$query=mysqli_query($con, "SELECT  COUNT(*) as c FROM customer WHERE pno=".$_POST['pno']);
	//echo "SELECT COUNT(*) as c FROM customer WHERE pno=".$_POST['pno'];
	$row=mysqli_fetch_assoc($query);
	//echo (sizeof($row));
	//echo "select * from customer where pno =".$_POST['pno'];
	echo $row['c'];
	if($row['c']==0)
	{	 
		$query=mysqli_query($con, "INSERT INTO `customer`(`name`, `pno`, `address`) VALUES ('".$_POST['name']."',".$_POST['pno'].",'".$_POST['Address']."')");
		//$con->query($query);
		var_dump($query);
	$query=mysqli_query($con,"select cid from customer where pno=".$_POST['pno']);
	$row=mysqli_fetch_assoc($query);
	$cid=$row['cid'];
		
	}else
	{		$query=mysqli_query($con,"select cid from customer where pno=".$_POST['pno']);
	$row=mysqli_fetch_assoc($query);
	$cid=$row['cid'];
			$query=mysqli_query($con, "UPDATE `customer` SET `name`= '".$_POST['name']."' , `address`='".$_POST['Address']."' where `pno` = ".$_POST['pno']." ");

//echo "UPDATE `customer` SET `name`= '".$_POST['name']."' , `pno` = ".$_POST['pno']." , `address`='".$_POST['Address']."'";
	}
}
if(isset($_SESSION['eid']))
{
	$query=mysqli_query($con, "INSERT INTO `ord`(`no_of_item`, `eid`, `cid`) VALUES (".sizeof($data).",".$_SESSION['eid'].",".$cid.")");
	$query=mysqli_query($con,"select oid from `ord` where no_of_item=".sizeof($data)." AND eid=".$eid." AND cid=".$cid." AND status='unpaid'");
	$row=mysqli_fetch_assoc($query);
	$oid=$row['oid'];
//echo "INSERT INTO `ord`(`no_of_item`, `eid`, `cid`) VALUES (".sizeof($data).",".$_SESSION['eid'].",".$cid.")";
}
//var_dump( $data);
for($i=0;$i<sizeof($data);$i++)
{	$query=mysqli_query($con,"select iid from `item` where idesc='".$data[$i]->idesc."'");
	//echo "select iid from `item` where idesc=".$data[$i]->idesc;
	$row=mysqli_fetch_assoc($query);
	$iid=$row['iid'];
	$query=mysqli_query($con, "INSERT INTO `contains`(`oid`, `iid`, `quantity`) VALUES (".$oid.",".$iid.",".$data[$i]->quantity.")");
	// $data[i]->idesc;
	echo "INSERT INTO `contains`(`oid`, `iid`, `quantity`) VALUES (".$oid.",".$iid.",".$data[$i]->quantity.")";
}?>

<script>
     <?php if(!isset($_SESSION['eid'])){ ?>alert('Username or password is incorrect !!');
    window.open('../employee/login.php','_self');
    
    </script>
    <?php
}

    header('location:index.php?s=1');
    ?>