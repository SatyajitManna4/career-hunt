<?php
    session_start(); 
    unset($_SESSION['userid']);
    echo"
    <script>
    localStorage.removeItem('userid');
    window.alert('Logout successfully');
    window.location.href = './index.php';
    </script>
    ";
?>