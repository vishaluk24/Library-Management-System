<html>

<head>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
    <style></style>
</head>

<body>
    <nav>
        <div class="navigation">
            <a href="#" class="logo"><img src="Assets/Icon2.png"></a>
            <a href="#" class="logo" style="padding-right: 350px;">E - Library</a>
            <div class="toggle"></div>
            <ul class="menu">
                <li><a href="Source.php" target="_self" style="padding-bottom: 5px;
    border-bottom-style: solid;
    border-bottom-width: 3.1px;
    width: fit-content;">Books</a>
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
    <section class="new-arrival">
        <div class="arrival-heading">
            <strong>Listed Books</strong>
        </div>
        <div class="product-container">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "elibrary";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * from books";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="product-box">
                        <div class="product-img">
                            <a href="http://localhost/E-Library-Management/BookDetails.php?BookId=<?php echo $row['BookId']; ?>">
                                <img src="<?php echo $row['Image'] ?>">
                            </a>
                        </div>
                        <div class="product-details">
                            <a class="p-name"><?php echo $row['Title'] ?></a>
                            <span class="p-price">
                                <a><?php
                                    if ($row['Available'] == 1)
                                        {}
                                    else
                                        echo "<a style = " . "color:red;" . ">Issued</a>";
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