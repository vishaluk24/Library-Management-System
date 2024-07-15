<?php
    require("db.php");
    $RequestId = $_GET['RequestId'];
    $Query = "DELETE FROM `requests` WHERE RequestId = $RequestId";
    $Result = mysqli_query($con , $Query);
    header("Location: RequestedBook.php");
?>