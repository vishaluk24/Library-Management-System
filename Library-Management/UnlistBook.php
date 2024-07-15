<?php
    $BookId = $_GET['BookId'];
    require("db.php");
    $Query = "DELETE FROM `books` WHERE BookId = $BookId;";
    $Query .= "DELETE FROM `BookDetails` WHERE BookId = $BookId;";
    $Query .= "DELETE FROM `tblissuedbookdetails` WHERE BookId = $BookId";
    $Result = mysqli_multi_query($con , $Query);
    header("Location: Source.php");
?>