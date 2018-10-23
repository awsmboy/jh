<!DOCTYPE html>
<html lang="en">
<head>
  <title>Carousal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .cur{
     margin-top: 10px;
       margin-bottom: 10px;

  }
  </style>
</head>
<body>
<div class="cur">
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner" style="height: 550px;">
    <div class="carousel-item active">
      <img src="images/b1.jpg" style="height: 550px; width: 100%;">
      <div class="carousel-caption">
        <h3>10% OFF</h3>
        <p>*ON ORDERS ABOVE 200!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/b2.jpg" style="height: 550px; width: 100%;">
      <div class="carousel-caption">
       <h3>10% OFF</h3>
        <p>*ON ORDERS ABOVE 200!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/b3.jpg" style="height: 550px; width: 100%;">
      <div class="carousel-caption">
       <h3>10% OFF</h3>
        <p>*ON ORDERS ABOVE 200!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</body>
</html>
