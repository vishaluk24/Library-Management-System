<html>

<head>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
    <link rel="stylesheet" href="CSS/Bootstrap2.css" />
    <style>
        input[type="submit"] {
            background-color: #3702f4;
            padding: 5px;
            width: 90px;
            font-family: poppins;
            font-size: 14px;
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
            <a href="#" class="logo" style="padding-right: 350px;">E - Library</a>
            <div class="toggle"></div>
            <ul class="menu">
            <li><a href="Source.php" target="_self" style="text-decoration:none;">Books</a>
                </li>
                <li><a href="Users.php" target="_self" style="padding-bottom: 5px;
    border-bottom-style: solid;
    border-bottom-width: 3.1px;
    width: fit-content;text-decoration:none;">Users</a>
                </li>
                <li><a href="AddBook.php" target="_self" style="text-decoration:none;">Add Book</a>
                </li>
                <li><a href="RequestedBook.php" target="_self" style="text-decoration:none;">Requested Books</a></li>
                <li><a href="#"></a></li>
            </ul>

        </div>
    </nav>
    <section class="new-arrival">
        <div class="arrival-heading">
            <strong>Registered Users</strong>
        </div>
        <div style=" margin-left: auto; width :auto;
  margin-right: auto;"><div class="container" style="padding-top:20px;">
            <div class="row">
                <div class="col-sm-8">
                    <?php echo $deleteMsg ?? ''; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Full Name</th>
                                    <th>Mobile Number</th>
                                    <th>Street</th>
                                    <th>State</th>
                                    <th></th>
                            </thead>
                            <tbody>
                                <?php
                                require("db.php");
                                $Query = "SELECT * FROM `userdetails`";
                                $Result = mysqli_query($con , $Query);
                                $sn = 0;
                                while ($Row = $Result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $sn; ?></td>
                                            <td><?php echo $Row['FullName']; ?></td>
                                            <td><?php echo $Row['Phone'] ; ?></td>
                                            <td><?php echo $Row['Street'] ; ?></td>
                                            <td><?php echo $Row['State'] ; ?></td>
                                            <td><a href="http://localhost/E-Library-Management/UpdateUser.php?UserId=<?php echo $Row['id'];?>"><input type="submit" value="Edit"></a></td>
                                        </tr>
                                    <?php
                                        $sn++;
                                    }?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div></div>
    </section>

</body>

</html>