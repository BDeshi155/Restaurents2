<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "plate_up2";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
            echo "<script>alert('Email or password is incorrect!')</script>";
            echo "<script>window.open('login.html','_self')</script>";
            exit();
        } else {
            $check_user = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
            $run = mysqli_query($conn, $check_user);

            if (mysqli_num_rows($run) > 0) {
                echo "<script>alert('You are successfully logged in!')</script>";
                $_SESSION['email'] = $email;

                // Check email for redirect
                if ($email === 'xyz@gmail.com' ) {
                    echo "<script>window.open('../Admin/index2 copy.html','_self')</script>";
                }
                elseif ( $email === 'abc@gmail.com') {
                    echo "<script>window.open('../Admin/index2.html','_self')</script>";
                }
                elseif ( $email === 'kfc@gmail.com') {
                    echo "<script>window.open('../restaurents/kfc_admin.php','_self')</script>";
                }
                else {
                    echo "<script>window.open('../Customer_account/index2.html','_self')</script>";
                }
            } else {
                echo "<script>alert('Email or password is incorrect!')</script>";
                echo "<script>window.open('login.html','_self')</script>";
            }
        }
    } else {
        echo "<script>alert('Email or password is empty!')</script>";
        echo "<script>window.open('login.html','_self')</script>";
    }
} else {
    echo "<script>alert('Email or password not set!')</script>";
    echo "<script>window.open('login.html','_self')</script>";
}

?>