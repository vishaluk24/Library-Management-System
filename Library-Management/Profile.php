<html>

<head>
    <title>Profile Page</title>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
    <style>
        .SearchButton {
            font-family: poppins;
            border-radius: 10px;
            color: #fff;
            background: #3702f4;
            border: 0;
            outline: 0;
            width: 30%;
            height: 38px;
            padding: 10px;
            text-align: center;
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
                <li><a href="Profile.php" style="padding-bottom: 5px;
    border-bottom-style: solid;
    border-bottom-width: 3.1px;
    width: fit-content;" target="_self">Your Books</a></li>
                <li><a href="IssueBook.php" target="_self">Issue Book</a>
                </li>
                <li><a href="EditProfile.php" target="_self">Edit Profile</a>
                </li>
                <li><a href="Logout.php" target="_self">Log out</a></li>
            </ul>
        </div>
    </nav>
    <section class="new-arrival">
        <div class="arrival-heading">
            <strong>Your Books</strong>
        </div>
        <div class="product-container">
            <?php
            session_start();
            require("db.php");
            $UserId = $_SESSION['UserId'];
            $Query = "SELECT * FROM `tblissuedbookdetails` WHERE StudentID = $UserId";
            $Result = mysqli_query($con, $Query);
            $TotalIssuedBooks = $Result->num_rows;
            if ($TotalIssuedBooks > 0) {
                while ($TotalIssuedBooks) {
                    $QueryAns = $Result->fetch_assoc();
                    $BookId = $QueryAns['BookId'];
                    $IssueDate =  $QueryAns['IssuesDate'];
                    $IssueDate = date("d-m-Y", strtotime($IssueDate));
                    $ReturnDate =  $QueryAns['ReturnDate'];
                    $ReturnDate = date("d-m-Y", strtotime($ReturnDate));
                    $TotalFine = $QueryAns['fine'];
                    $BookQuery = "SELECT * FROM `books` where `BookId` = $BookId";
                    $ResultBook = mysqli_query($con, $BookQuery);
                    $Books = $ResultBook->fetch_assoc();
                    $BookName = $Books['Title'];
                    $BookImage = $Books['Image'];

            ?>
                    <div class="product-box">
                        <div class="product-img">
                            <a>
                                <img src="<?php echo $BookImage ?>">
                            </a>
                        </div>
                        <div class="product-details">
                            <a class="p-name"><?php echo $BookName ?></a>
                            <a class="p-name"><?php echo $IssueDate . " to " . $ReturnDate ?></a>
                            <?php
                            $date1 = new DateTime($ReturnDate);
                            $date2 = new DateTime(date("d-m-Y"));
                            if ($date1 < $date2) {
                            ?>
                                <a class="p-name" style="color: red;">Due date gone past</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            <?php
                    $TotalIssuedBooks -= 1;
                }
            } else {
                echo "<div><a>You Have 0 Issued Books</a></div>";
            }
            ?>
        </div>
    </section>
</body>

</html>