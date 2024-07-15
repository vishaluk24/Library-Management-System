<?php
        require("db.php");
        $BookId = $_POST['BookId'];
        $Query = "DELETE FROM `tblissuedbookdetails` WHERE BookId = $BookId;";
        $Query2 = "UPDATE `tblissuedbookdetails` SET `Available` = 1;";
        $Update = mysqli_query($con , $Query);
        $Update = mysqli_query($con , $Query2);
        header("Location: Profile.php");
?>