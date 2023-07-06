<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../Home/logo.png" type="image/x-icon">
<title>Admin-01 Account</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

table{
    border-collapse:collapse;
    width: 100%;
    color: #588c7e;
    font-family: monospace;
    font-size: 25px;
    text-align: left;
}
th{
    background-color: #588c7e;
    color : white; 
}
tr:nth-child(even){background-color:#f2f2f2}

.modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="../Home/index.html" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>

  <a href="index copy.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="index copy.html" class="w3-bar-item w3-button">(2) New Message from Admin</a>
      <a href="index copy.html" class="w3-bar-item w3-button">(1) New Message from Customer #</a>
    </div>
  </div>
  <a href="index2.html" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <img src="../Login/ishmam3.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Admin-01 Profile</h4>
         <p class="w3-center"><img src="../Login/ishmam3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Hasan Muhtasim Ishmam</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Dhaka, Bangladeh</p>
         
        </div>
      </div>
      <br>
      
     
    </div>
    
    <div class="w3-col m7">


      <h2>Pull Order</h2>
      <br>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
        <p>Order Request</p>

<?php
$conn = new mysqli("localhost", "root", "", "plate_up2");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, res_name, method, total_products, total_price FROM `order` WHERE res_name = 'kfc'";

$result = $conn->query($sql);

if ($result === false) {
    die("Query failed: " . $conn->error);
}

$rows = array(); // Store the rows

if ($result->num_rows > 0) {
    // Check if res_name is "kfc"
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row; // Store the row in the array
    }

    // Check if there are rows for "kfc" and display the table
    if (!empty($rows)) {
        echo "<table>
              <tr>
                  <th>Order ID</th>
                  <th>Name</th>
                  <th>Method</th>
                  <th>Foods</th>
                  <th>Price</th>
              </tr>";

        foreach ($rows as $row) {
            echo "<tr>
                  <td>" . $row["id"] . "</td>
                  <td>" . $row["name"] . "</td>
                  <td>" . $row["method"] . "</td>
                  <td>" . $row["total_products"] . "</td>
                  <td>" . $row["total_price"] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No results for kfc";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<div class="w3-row w3-opacity">
    <div class="w3-half">
    <form action="" method="post">
        <button type="submit" name="accept" class="w3-button w3-block w3-green w3-section" title="Accept" >
            <i class="fa fa-check"></i> Pull
        </button>
    </form>
    </div>
    <div class="w3-half">
        <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i> Decline</button>
    </div>
      </div>

      <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modalMessage"></p>
        </div>
    </div>

    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Feedback History</h6>
               
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        
        <span class="w3-right w3-opacity">1 Day ago</span>
        <h4>Person Name *****</h4><br>
        <hr class="w3-clear">
        
          <div class="w3-row-padding" style="margin:0 -16px">
            
                <h4>Feedback: </h4>
            
            
        </div>
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity">1 Day ago</span>
        <h4>Person Name *****</h4><br>
        <hr class="w3-clear">
        
          <div class="w3-row-padding" style="margin:0 -16px">
            
                <h4>Feedback: </h4>
              
        </div>
         
      </div>

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity">1 Day ago</span>
        <h4>Person Name *****</h4><br>
        <hr class="w3-clear">
          <div class="w3-row-padding" style="margin:0 -16px">
            
                <h4>Feedback: </h4>
              
        </div> 
      </div>
      
    <!-- End Middle Column -->
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

function showModal() {
            var modal = document.getElementById("myModal");
            var modalMessage = document.getElementById("modalMessage");
            modal.style.display = "block";
            modalMessage.textContent = "The order will be pulled to RiderHero ID: 01";
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
</script>

</body>
</html> 
