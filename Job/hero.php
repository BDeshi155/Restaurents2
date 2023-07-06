<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../Home/logo.png" type="image/x-icon">
<title>RiderHero Account</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="../Home/index.html" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>
<!--
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
-->
  <a href="index copy.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="index copy.html" class="w3-bar-item w3-button">(2) New Message from Admin</a>
      <a href="index copy.html" class="w3-bar-item w3-button">(1) New Message from Customer #</a>
    </div>
  </div>
  <a href="index2.html" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <img src="image.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
  </a>
 </div>
</div>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      
      <br>
      
     
    </div>
    
    <div class="w3-col m7">

    <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">RiderHero Profile</h4>
         <p class="w3-center"><img src="image.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
<style>
    th, td {
        padding: 8px; /* Add padding to create space */
    }
</style>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Joined Date</th>
    </tr>
    <?php
    $conn = new mysqli("localhost", "root", "", "plate_up2");

    $email = "pqr@gmail.com";

    $sql = "SELECT first, last, email, number, CheckIn FROM job WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                   <td>".$row["first"]." ".$row["last"]."</td>
                   <td>".$row["email"]."</td>
                   <td>".$row["number"]."</td>
                   <td>".$row["CheckIn"]."</td>
                   </tr>";
        }
        echo "</table>";
    } else {
        echo "<tr><td colspan='4'>0 results</td></tr>"; // Add colspan to span across all columns
    }
    ?>
</table>


        </div>
      </div>

      <br>
      <h2>Pending Order</h2>
      <br>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Order Request</p>
          
          <span>Taco Bell</span><br>
          <h4 style="float: left;">Food Item: [Food]</h4>
          <h4 style="float: left;">Price: [Price]</h4>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Delivery History</h6>
        
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="../Home/dominos.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 Day ago</span>
        <h4>Dominos Pizza</h4><br>
        <hr class="w3-clear">
        <p>Order Placed to : <b>Customer ID:####</b></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
                <h4>Food Item: </h4>
            </div>
            <div class="w3-half">
                <h6>Price: </h6>
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="../Home/taco_bell2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 Day ago</span>
        <h4>Taco Bell</h4><br>
        <hr class="w3-clear">
        <p>Order Placed to : <b>Customer ID:####</b></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
                <h4>Food Item: </h4>
            </div>
            <div class="w3-half">
                <h6>Price: </h6>
          </div>
        </div>
         
      </div>  

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="../Home/kfc5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 Day ago</span>
        <h4>KFC</h4><br>
        <hr class="w3-clear">
        <p>Order Placed to : <b>Customer ID:####</b></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
                <h4>Food Item: </h4>
            </div>
            <div class="w3-half">
                <h6>Price: </h6>
          </div>
        </div>
         
      </div>
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      
      <br>
      
      
      
    <!-- End Right Column -->
    </div>
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-padding-16" style="margin-bottom: -25px;">
    <img src="../Home/logo.png" class="w3-circle" style="height:60px;width:60px; float: left;" alt="Avatar">
    <h5 >Plate Up!</h5>
</footer>

<footer class="w3-container w3-theme-d5">
    <a href="#" class="ga-bottom">Copyright 2023</a> by Refsnes Data. All Rights Reserved.<br>
</footer>
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html> 
