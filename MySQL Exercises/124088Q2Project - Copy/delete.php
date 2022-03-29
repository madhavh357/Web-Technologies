<!-- 
    124088
    Deletes the account
 -->
<?php
    require "config.php";
    $username = $_SESSION["user"]["Username"];
    $sql = "DELETE FROM users WHERE username='$username'";
    mysqli_query($conn, $sql);
    session_unset();
    header("Location: index.php");
?>