<!-- 124088 -->
<?php
    session_start();
    session_unset();
    // unsets the session and goes to the main page
    header("Location: index.php");
?>