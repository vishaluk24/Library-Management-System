<?php
session_start();
unset($_SESSION['BookId']);
?>
<html>

<head>
    <title>Profile Page</title>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
    <link rel="stylesheet" href="CSS/style.css" />
    <style>
        .BookSearch {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 40px;
        }

        .SearchBar {
            font-family: poppins;
            border-radius: 10px;
            font-size: 15px;
            border: 2px solid black;
            padding: 10px;
            height: 38px;
            width: auto;
        }

        .SearchButton {
            font-family: poppins;
            border-radius: 10px;
            color: #fff;
            background: #3702f4;
            border: 0;
            outline: 0;
            width: auto;
            height: 38px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        .SearchBar:focus {

            outline: none;
        }

        .Space {
            padding-left: 10px;
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
    <section>
        <div class="BookSearch">
            <form method="post"><input type="text" placeholder="Enter a book title" class="SearchBar" name="SearchTitle"/>
                <input type="submit" class="SearchButton" value="Search" />
            </form>
            <?php
                if(isset($_POST['SearchTitle'])){
                    $_SESSION['Title'] = $_POST['SearchTitle'];
                    header("Location: SearchResult.php");
                }
            ?>
        </div>
    </section>
    <section class="new-arrival">
        <div class="product-container">
            <?php
            require("db.php");
            $Id = $_SESSION['UserId'];
            $sql = "SELECT * FROM `books` WHERE BookId not in (SELECT  BookId  from `tblissuedbookdetails`);";
            $result = mysqli_query($con , $sql);
            if ($result->num_rows > 0) {
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
                            <span class="p-price">
                                <a><?php
                                    if ($row['Available'] == 1)
                                        echo "<a style = " . "color:green;" . ">Available</a>";
                                    else
                                    echo "<a style = " . "color:red;" . ">Not Available</a>";
                                    ?></a>
                            </span>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<a>Nothing to show here</a>";
            }
            ?>
        </div>
    </section>
</body>

</html>