<?php
session_start();
?>
<?php
if (isset($_POST['SubmissionDate'])) {
    $CurrentDate = date('Y-m-d');
    $Date = date('Y-m-d', strtotime($_POST['SubmissionDate']));
    if ($Date < $CurrentDate) {
        
    } else {
        $BookId = $_GET['BookId'];
        $StudentId = $_SESSION['UserId'];
        $Query = "INSERT INTO `tblissuedbookdetails`(`BookId`, `StudentID`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES ($BookId,$StudentId,'$Date' , 0 , 0)";
        $UpdateQuery = "UPDATE `books` SET `Available` = 0 where `BookId` = $BookId";
        require("db.php");
        $Update = mysqli_query($con, $Query);
        $Update = mysqli_query($con, $UpdateQuery);
        header("Location: Profile.php");
    }
}
?>
<html>

<head>
    <title>Profile Page</title>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
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
            font-size: 12px;
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
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
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
            <a href="#" class="logo" style="padding-right:450px;">E - Library</a>
            <div class="toggle"></div>
            <ul class="menu">
                <li><a href="Profile.php" target="_self">Your Books</a></li>
                <li><a href="EditProfile.php" style="padding-bottom: 5px;
    border-bottom-style: solid;
    border-bottom-width: 3.1px;
    width: fit-content; " target="_self">Issue Book</a>
                </li>
                <li><a href="EditProfile.php" target="_self">Edit Profile</a>
                </li>
                <li><a href="Logout.php" target="_self">Log out</a></li>
            </ul>
        </div>
    </nav>
    <section style="display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 50px;">
        <div class="row">
            <div class="column">
                <img height=280px src="<?php
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
                <h2><?php
                    $BookId = $_GET['BookId'];
                    require("db.php");
                    $Query = "SELECT * from `books` where BookId = $BookId";
                    $Query2 = "SELECT * FROM `bookdetails` where BookId = $BookId";
                    $Result2 = $con->query($Query2);
                    $Result = $con->query($Query);
                    $Row = $Result->fetch_assoc();
                    $Row2 = $Result2->fetch_assoc();
                    $Title = $Row['Title'];
                    echo $Title;
                    ?></h2>
                <?php
                $Tags = explode(',', $Row2['Categories']);
                $Author = explode(',', $Row2['Authors']);
                foreach ($Tags as $Name) {
                    if ($Name != "") {
                ?>

                        <a style="border: 1px solid black; padding : 8px; border-radius:10px;"><?php echo $Name; ?></a>
                <?php

                    }
                }
                ?>
                <div style="padding-top: 25px;"></div>
                <?php
                foreach ($Author as $Name) {
                    if ($Name != "") {
                ?>

                        <a style="border: 1px solid black; padding : 8px; border-radius:10px;"><?php echo $Name; ?></a>
                <?php

                    }
                }
                ?>
                <div style="padding-top: 25px;"></div>
                <form method="post">
                    <input type="date" name="SubmissionDate">
                    <div style="padding-top: 5px;"></div>
                    <input type="submit" value="Issue Book">
                </form>

            </div>
        </div>

    </section>
</body>

</html>
<?php
unset($_SESSION['BookId']);
?>