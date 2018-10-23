<?php
 
 session_start();
 if(!isset($_SESSION['mid'])){
    header('location:login.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Contact us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    include("header.php");
    ?>
<div class="container">
<br>
<div class="page-header">
    <h3>Contact</h3>
</div>

<!-- Contact with Map - START -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="" method="post">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>
                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control" pattern="[A-Za-z ]+" title="Only Letters allowed" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control" pattern="[A-Za-z ]+" title="Only Letters allowed" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <input id="email" name="email" type="email" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <input id="phone" name="phone" type="text" placeholder="Phone" pattern="[0-9]{10}" title="Enter valid Phone number" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <p style="text-align: center;color: #999;padding: 0 20px;font-family: 'gotham-book';font-size:18px;"><strong style="color:#333;">Alternatively, you can reach out to us at:</strong> <br/><a href="mailto:customercare@cafe.com" style="color:#dc4348;font-family: 'gotham-medium';" >customercare@cafecoffeeday.com</a> <br />1800 102 5093 (9 AM to 11 PM |  Monday - Sunday)</p>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="card ">
                    <div class="text-center header">Our Office</div>
                    <div class="card-block text-center">
                        <h4>Address</h4>
                        <div>
                        2217 Kothrud<br />
                        Pune MH<br />
                        #(91) 021457532<br />
                        service@cafeindia.com<br />
                        </div>
                        <hr />
                        <div id="map1" class="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script type="text/javascript">
    jQuery(function ($) {
        function init_map1() {
            var myLocation = new google.maps.LatLng(18.5074, 73.8077);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "Property Location"
            });
            var map = new google.maps.Map(document.getElementById("map1"),
                mapOptions);
            marker.setMap(map);
        }
        init_map1();
    });
</script>

<style>
    .map {
        min-width: 300px;
        min-height: 300px;
        width: 100%;
        height: 70%;
    }

    .header {
        background-color: #F5F5F5;
        color: #36A0FF;
        height: 70px;
        font-size: 27px;
        padding: 10px;
    }
</style>

<!-- Contact with Map - END -->

</div>
<?php
    include("footer.php");
?>
</body>
</html>