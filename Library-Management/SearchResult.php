<html>

<head>
    <title>Profile Page</title>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
    <style>
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
    <section class="new-arrival">
        <div class="arrival-heading">
            <div class="product-container">
                <?php
                require("db.php");
                session_start();
                $UserId = $_SESSION['UserId'];
                $Search = $_SESSION['Title'];
                $Search = $_SESSION['Title'];
                $sql = "SELECT * from `books` where Title = '$Search' and Available = 1;";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="product-box">
                            <div class="product-img">
                                <a href="http://localhost/E-Library-Management/IssueBookSelected.php?BookId=<?php echo $row['BookId']; ?>">
                                    <img src="<?php echo $row['Image'] ?>">
                                </a>
                            </div>
                            <div class="product-details">
                                <a class="p-name"><?php echo $row['Title'] ?></a>

                            </div>
                        </div>
                    <?php
                    }
                } else {
                    $title = $_SESSION['Title'];
                    echo "<a>No book available with title " . $title . ", kindly contact admin to request book</a>";
                    ?>
                    <div style="padding-top: 100px;"></div>
                    <a href="http://localhost/E-Library-Management/RequestBook.php?UserId=<?php echo $UserId;?>&title=<?php echo $title;?>"><input type="submit" value="Request book" /></a>
                <?php
                }
                ?>
            </div>

    </section>
</body>

</html>