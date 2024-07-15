<?php
session_start();
?>
<html>

<head>
    <title>Book Details</title>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <style>
        input[type="date"] {
            background-color: #3702f4;
            padding: 15px;
            font-family: poppins;
            font-size: 12px;
            border: none;
            width: 145px;
            outline: none;
            border-radius: 5px;
            color: white;
        }

        input[type="submit"] {
            background-color: #3702f4;
            padding: 15px;
            width: 145px;
            font-family: poppins;
            font-size: 14px;
            border: none;
            outline: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        ::-webkit-calendar-picker-indicator {
            background-color: #ffffff;
            padding: 5px;
            cursor: pointer;
            border-radius: 3px;
        }

        .column {
            float: left;
            width: auto;
            padding: 10px;
            height: 300px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <nav>
        <div class="navigation">
            <a href="#" class="logo"><img src="Assets/Icon2.png"></a>
            <a href="#" class="logo" style="padding-right: 350px;">E - Library</a>
            <div class="toggle"></div>
            <ul class="menu">
            <li><a href="Source.php" target="_self">Books</a>
                </li>
                <li><a href="Users.php" target="_self">Users</a>
                </li>
                <li><a href="AddBook.php" target="_self">Add Book</a>
                </li>
                
                
                <li><a href="RequestedBook.php" target="_self">Requested Books</a></li>
                <li><a href="#"></a></li>
            </ul>
        </div>
    </nav>
    <section style="display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 50px;">
        <div class="row">
            <div class="column">
                <img height=250px src="<?php
                                        $BookId = $_GET['BookId'];
                                        require("db.php");
                                        $Query = "SELECT * from `books` where BookId = $BookId";
                                        $Result = $con->query($Query);
                                        $Row = $Result->fetch_assoc();
                                        $ImageLink = $Row['Image'];
                                        echo $ImageLink;
                                        ?>" height="200px" style="border:1px solid black" />

            </div>
            <div class="column" style="padding-left: 40px;"></div>
            <div class="column">
                <a style="font-size: 30px; font-weight:bold"><?php
                                                                $BookId = $_GET['BookId'];
                                                                require("db.php");
                                                                $Query = "SELECT * from `books` where BookId = $BookId";
                                                                $Result = $con->query($Query);
                                                                $Row = $Result->fetch_assoc();
                                                                $Title = $Row['Title'];
                                                                echo $Title;
                                                                ?></a>
                <div style="padding-top: 10px;"></div>
                <?php
                $Query = "SELECT * FROM `bookdetails` WHERE BookId = $BookId";
                $Result = mysqli_query($con, $Query)->fetch_assoc();
                $Pages = $Result['Pages'];
                $Tags = explode(',', $Result['Categories']);
                $Author = explode(',',$Result['Authors']);
                foreach ($Tags as $Name) {
                    if($Name != ""){
                ?>
                    <a style="border: 1px solid black; padding : 8px; border-radius:10px;"><?php echo $Name; ?></a>
                <?php
                    }
                }
                ?>
                <div style="padding-top:25px;"></div>
                <?php
                foreach ($Author as $Name) {
                    if($Name != ""){
                ?>
                    <a style="border: 1px solid black; padding : 8px; border-radius:10px;"><?php echo $Name; ?></a>
                <?php
                    }
                }
                ?>
                <div style="padding-top: 15px;"></div>
                <a><?php
                    $Query = "SELECT * FROM `Books` WHERE BookId = $BookId";
                    $Result = mysqli_query($con, $Query)->fetch_assoc();
                    if ($Result['Available'] == 0) {
                        $Query = "SELECT * FROM `users` WHERE id = (SELECT `StudentId` FROM `tblissuedbookdetails` WHERE BookId = $BookId);";
                        $Result = mysqli_query($con, $Query)->fetch_assoc()['username'];
                        echo "Issued By "  ?> <?php echo "<a style = " . "" . "> $Result </a>"; ?>
                        <div style="padding-top: 10px;"></div>
                        <a href="http://localhost/E-Library-Management/BookReturned.php?BookId=<?php echo $BookId;?>"><input type="submit" value="Returned" /></a>
                    <?php
                    }
                    ?>
                </a>
                <a href="http://localhost/E-Library-Management/UnlistBook.php?BookId=<?php echo $BookId;?>"><input type="submit" value="Unlist Book" /></a>
            </div>
        </div>

    </section>
</body>

</html>
<?php
unset($_SESSION['BookId']);
?>