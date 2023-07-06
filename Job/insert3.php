<?php
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$number = $_POST['number'];
$CheckIn = $_POST['CheckIn'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];


if (!empty($first) || !empty($last) || !empty($email) || !empty($number) ||!empty($CheckIn) || !empty($password) || !empty($confirmPassword)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "plate_up2";

    // Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    // Check connection
    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
}
    else{
        $SELECT = "SELECT email From job Where email = ? Limit 1";
        $INSERT = "INSERT Into job (first,last,email,number,CheckIn,password,confirmPassword) values(?,?,?,?,?,?,?)";

        //Prepare Statement
        $stmt = $conn->prepare($SELECT);
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt -> bind_result($email);
        $stmt -> store_result();
        $rnum = $stmt -> num_rows;

        if ($rnum == 0) {
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssisss", $first, $last, $email, $number, $CheckIn, $password, $confirmPassword);
            $stmt->execute();
            echo "New record inserted successfully.";
        } else {
            echo "Someone already registered using this email.";
        }
        
    }
}
else{ 
    echo"Selected Fields are required.";
    die();
}
?>