<?php
        require("db.php");
        $UserId = $_GET['UserId'];
        $title = $_GET['title'];
        $Queries = "INSERT INTO `requests`(`UserId`, `Title`) VALUES ($UserId , '$title')";
        $result = mysqli_query($con, $Queries);
        header("Location: Profile.php");
?>