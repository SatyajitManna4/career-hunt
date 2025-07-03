<?php
    require('./dbconfig.php');

    $email = $_POST['gmail'];
    $password = $_POST['password'];

    $query = "SELECT Id FROM userinformation WHERE Gmail='$email' AND Password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $userid = $row['Id'];
        session_start();
        $_SESSION['userid'] = $userid;
        echo "<script>
            window.alert('Logged in successfully');
            localStorage.setItem('userid',$userid);
            window.location.href = './index.php'
        </script>";
    }
    else{
        echo "<script>
            window.alert('Invalid Credentials');
        </script>";
    }


?>