<?php
require('./dbconfig.php');

$userName= $_POST['username'];
$usergmail= $_POST['gmail'];
$userpassword= $_POST['password'];
$usermobile= $_POST['mobile'];

// $userName = "Satyajit";
// $usergmail = "satyajitmanna35@gmail.com";
// $userpassword = "Satyajit@1234";
// $usermobile = 8967104521;

$query = "SELECT * FROM userinformation WHERE Gmail='$usergmail' ";

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo "Already exists User";
    mysqli_close($conn);
} else {
    $query = "INSERT INTO userinformation(UserName,Gmail,Password,Mobile) 
VALUES
('$userName','$usergmail','$userpassword','$usermobile')";

    $result = mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "usersets";
        mysqli_close($conn);
    } else
        echo "users not set";
}
?>