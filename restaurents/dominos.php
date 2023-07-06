<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../Home/logo.png" type="image/x-icon">
  <title>Dominos-Admin</title>
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
</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <img src="../Home/kfc5.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
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
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Restaurant Admin <br> Profile</h4>
         <p class="w3-center"><img src="../Home/kfc5.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Dominos</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Dhaka, Bangladesh</p>
         <p><i>Joined:</i> April 1, 2023</p>
        </div>
      </div>
      <br>
      
      
      
      
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity"></h6>
              <p contenteditable="true" class="w3-border w3-padding">Status:Ajker Offer!</p>
              <form action="upload.php" method="POST" enctype="multipart/form-data">
                <label for="imageUpload">Select an image:</label>
                <input type="file" id="imageUpload" name="imageUpload">
                <input class="w3-button w3-theme" type="submit" value="Upload">
              </form> 
            </div>
          </div>
        </div>
      </div>

      <br>
      <br>
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
        <p>Order Request</p>

<?php
$conn = new mysqli("localhost", "root", "", "plate_up2");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, res_name, method, total_products, total_price FROM `order` WHERE res_name = 'dominos'";

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
        <form action="../Admin/index2.html" method="post">
            <button type="submit" name="accept" class="w3-button w3-block w3-green w3-section" title="Accept">
                <i class="fa fa-check"></i> Accept
            </button>
        </form>
    </div>
    <div class="w3-half">
        <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i> Decline</button>
    </div>
</div>
</div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h4>Menu</h4><br>
        <table>
            <tr>
                <th>No.</th>
                <th>Items</th>
                <th>Price</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root","", "plate_up2");

            $sql = "SELECT id,item,price from kfc";
            $result = $conn-> query($sql);

            if ($result-> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                   echo "<tr>
                   <td>".$row["id"]."</td>
                   <td>".$row["item"]."</td>
                   <td>".$row["price"]."</td>
                   </tr>";
                }
                echo"</table>";
            }
            else{
                echo "0 result";
            }
            ?>
        </table>

        <br>

        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">ADD</button>  
      </div>

      <br>
      <br>
      
      
      
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
