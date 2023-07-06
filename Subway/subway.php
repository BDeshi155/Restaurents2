<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="icon" href="../Home/logo.png" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  
  background-image: url("");
  min-height: 75%;
}

.menu {
  display: none;
}

.cart {
  margin-top: 40px;
}

.cart-items {
  list-style-type: none;
  padding: 0;
}

.cart-item {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.cart-total {
  font-weight: bold;
}

.checkout-btn {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  cursor: pointer;
}

.checkout-btn:hover {
  background-color: #45a049;
}
table{
    border-collapse:collapse;
    width: 100%;
    color: grey;
    font-family: monospace;
    font-size: 25px;
    text-align: left;
}
th{
    background-color: black;
    color : white; 
}
tr:nth-child(even){background-color:#f2f2f2}
</style>
</head>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-light-grey w3-border w3-padding">
    <a href="../Home/index.html" class="w3-bar-item w3-button w3-mobile">HOME</a>
    <a href="#about" class="w3-bar-item w3-button w3-mobile">ABOUT</a>
    <a href="#menu" class="w3-bar-item w3-button w3-mobile">MENU</a>
    <div class="w3-dropdown-hover">
      <button class="w3-button">Login</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="../Login/login.html" class="w3-bar-item w3-button">Login</a>
        <a href="../Login/signup.html" class="w3-bar-item w3-button">Sign Up</a>
      </div>
    </div>
    
  </div>
</div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  
  <div class="w3-display-bottomleft w3-center">
    <span style="background-color: black; padding: 10px; font-size: 90px; font-weight: bold;" class="w3-text-white">Subway</span>
  </div>
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag">--Open from 6am to 5pm</span>
  </div>
  
  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-text-white">15 Adr street, 5015</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT THE CAFE</span></h5>
    <p>The Cafe was founded in blabla by Mr. Smith in lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <p>In addition to our full espresso and brew bar menu, we serve fresh made-to-order breakfast and lunch sandwiches, as well as a selection of sides and salads and other good stuff.</p>
    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"Use products from nature for what it's worth - but never too early, nor too late." Fresh is the new sweet.</i></p>
      <p>Chef, Coffeeist and Owner: Liam Brown</p>
    </div>
    <img src="kfc2.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>Opening hours:</strong> everyday from 6am to 5pm.</p>
    <p><strong>Address:</strong> Bashundhara,Dhaka</p>
  </div>
</div>

<!-- Menu Container -->
<div class="w3-container" id="menu">
  <div class="w3-content" style="max-width:700px">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">THE MENU</span></h5>
  
    <div class="w3-row w3-center w3-card w3-padding">
    <table>
    <tr>
        <th>No.</th>
        <th>Items</th>
        <th>Price</th>
        <th></th>
    </tr>
    <?php
$conn = new mysqli("localhost", "root", "", "plate_up2");

$sql = "SELECT id, item, price FROM subway";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
               <td>".$row["id"]."</td>
               <td>".$row["item"]."</td>
               <td>".$row["price"]."Tk</td>
               <td>
                   <form action=\"\" method=\"POST\">
                       <input type=\"hidden\" name=\"item\" value=\"".$row["item"]."\">
                       <input type=\"hidden\" name=\"price\" value=\"".$row["price"]."\">
                       <input type=\"submit\" class=\"btn\" value=\"+\" name=\"add_to_cart\">
                   </form>
               </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

echo '<a href="../Cart/cart.php" target="_blank" rel="noopener noreferrer"><button class="w3-button w3-round-xxlarge">Go To Cart</button></a>';



@include '../Cart/config.php';

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['item'];
    $product_price = $_POST['price'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart` (name, price, quantity) VALUES ('$product_name', '$product_price', '$product_quantity')");
        $message[] = 'Product added to cart successfully';
    }
}
?>


</table>

    
    
    
</div>



<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <a href="#" class="ga-bottom">Copyright 2023</a> by PlateUp! Data. All Rights Reserved.<br>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}


</script>

</body>
</html>