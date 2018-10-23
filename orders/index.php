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
     <script src="typeahead.min.js"></script>
    <title>Hello, world!</title>
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
  <div c
 <div class="container pt-5">
  <div class="row justify-content-md-center">
  <div class="col-md-5  ">
 <div class="card">
  <div class="card-body">  
    <?php
    if(isset($_GET['s'])==1)
    {
    ?>
    <div class="alert alert-success" style="text-align: center;">
      <a href="/bill" class="close" data-dismiss="alert">&times;</a>
        <strong>Order Added!! </strong><hr> <a href="./bill" > Click to genrate bill  </a>
    </div>
    <?php
    }
  ?>
<h2 align="center">Add Order</h2><br>
 
    </head>
    <body>
     


<form action="process.php" method="post">
     <div class="form-group ">
  <!--  <div class="input-group mb-3">
  
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">Existing Customer</option>
    <option value="2">New Customer</option>
    </select> 
</div>   --> 

      <label for="name">Customer Name</label>
      <input type="text" name="name" pattern="[A-Za-z]+" title="Enter Valid Name" required class="form-control" id="name" placeholder="Name">
    </div>
    
 
  <div class="form-group">
    <label for="pno">Phone Number</label>
    <input type="text" name="pno" required class="form-control" id="pno" placeholder="ex-888888888" pattern="[789][0-9]{9}" title="Enter valid Phone number">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address </label>
    <input type="text" name ="Address" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
  </div><!--
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  -->

 <div class="form-group">
   <label for="iname">Item Name</label>
     <input type="text"  class="form-control typeahead" id="idesc" data-show-subtext="true" data-live-search="true" autocomplete="off">
 <label for="qty">Quantity</label>
  <input type="Number" class="form-control" id="quantity" name="quantity" value =1>
  <input type="hidden" class="form-control" id="item" name="item">
 </div>
 
<div class="form-group">
    

    <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          
            
            <th class="text-center">
              Name
            </th>
            <th class="text-center">
              quantity
           </th>
          <th class="text-center">
              Delete
           </th>
        </thead>
        <tbody> </tbody>
       
      </table>
    </div>
  </div>
  <a  id="add_row"  class="btn btn-primary " style="text-decoration-color: red">Add Item</a>
<div class="form-group"></div>

  <button='delete_row1' type="submit"class="btn btn-primary "  onclick="deleteAllRows()">Delete All</button='delete_row1'>



<div class="form-group"></div>

<button type="submit" onclick="tbltoarr()"class="btn btn-primary    ">Add Order</button>
 <!-- <button type="submit" class="btn btn-primary">Sign in</button>
-->
</div>
</form>
        
 
</div>
</div>  
</div>
</div>
<script >
       $(document).ready(function(){
      var i=0;
     $("#add_row").click(function(){ 
      if((document.getElementById("idesc").value)!="")
     { 
      $('#tab_logic').append("<tr> <td><input name='name1' type='text' placeholder='Name' class='form-control' value="+document.getElementById('idesc').value+"> </td><td><input  name='quantity' type='text'   value="+document.getElementById('quantity').value+"  class='form-control'></td><td><a id='delete_row' class='btn btn-primary pull-left'onclick='deleteRow(this)'>Delete</a></td></tr>");
      i++; 
  document.getElementById("idesc").value = "";
  document.getElementById("quantity").value = 1;
  document.getElementById("idesc").focus();
  } });
     
});
</script>
<script>
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("tab_logic").deleteRow(i);
}
function deleteAllRows()
{var tableHeaderRowCount = 1;
var table = document.getElementById('tab_logic');
var rowCount = table.rows.length;
for (var i = tableHeaderRowCount; i < rowCount; i++) {
    table.deleteRow(tableHeaderRowCount);
}
  }
</script>
<script>
var $input = $(".typeahead");
$input.typeahead({
  source: [<?php 
       $array = array();
    $con=mysqli_connect("localhost","root","","cafemgmt");
    $query=mysqli_query($con, "select * from item ");
    while($row=mysqli_fetch_assoc($query))
    { echo "{id:"."'".$row['iid']."'".",name:"."'".$row['idesc']."'"."},";
      
    }
echo "],";
?>
  autoSelect: true
});
$input.change(function() {
  var current = $input.typeahead("getActive");
  if (current) {
    // Some item from your model is active!
    if (current.name == $input.val()) {
      // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
    } else {
      // This means it is only a partial match, you can either add a new item
      // or take the active if you don't want new items
    }
  } else {
    // Nothing is active so it is a new value (or maybe empty value)
  }
});
</script>
<script >
var arr=[];
  function tbltoarr()
  { var i=0;
    $("#tab_logic").find('tr').each(function(){
      if(i!=0){
         var val1 = $(this).find('td:eq(0) input[type="text"]').val();
         var val2 = $(this).find('td:eq(1) input[type="text"]').val();
         var obj= {idesc:val1,quantity:val2};
          arr.push(obj);
        console.log(obj);
            }
            i++;
       })
        console.log(document.getElementById("tab_logic").rows.length) 
  $('#item').val(JSON.stringify(arr)); 
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  
<script src="bootstrap3-typeahead.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
<style type="text/css">
  .btn:not(:disabled):not(.disabled) {

    cursor: pointer;
    color: white;

}
</style>
</script>  
<br>
<?php
  include("../manager/footer.php");
  ?>
  <div>
</html>
