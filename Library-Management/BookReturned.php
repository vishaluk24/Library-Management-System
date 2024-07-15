<?php
    require("db.php");
    $BookId = $_GET['BookId'];
    $Query = "DELETE FROM `tblissuedbookdetails` WHERE BookId = $BookId";
    $Query2 = "UPDATE `books` SET `Available`= 1 WHERE BookId = $BookId";
    $Result = mysqli_query($con , $Query);
    $Result = mysqli_query($con , $Query2);
    header("Location: http://localhost/E-Library-Management/BookDetails.php?BookId=$BookId");
?>