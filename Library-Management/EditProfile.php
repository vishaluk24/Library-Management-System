<html>

<head>
    <title>Edit Profile Page</title>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
    <link rel="stylesheet" href="Css/bootstracp.css" />
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <style>
        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solname #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
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
                <li><a href="Profile.php" target="_self" style="text-decoration: none;">Your Books</a></li>
                <li><a href="IssueBook.php" target="_self" style="text-decoration: none;">Issue Book</a>
                </li>
                <li><a href="EditProfile.php" target="_self" style="text-decoration: none; padding-bottom: 5px;
    border-bottom-style: solid;
    border-bottom-width: 3.1px;
    width: fit-content;">Edit Profile</a>
                </li>
                <li><a href="Logout.php" target="_self" style="text-decoration: none;">Log out</a></li>
            </ul>
        </div>
    </nav>
    <section class="new-arrival">
        
        <div style="padding-top: 40px;"></div>
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                    </div>
                                    <h5 class="user-name"><?php
                                                            session_start();
                                                            echo $_SESSION['username'];
                                                            ?></h5>
                                    <h6 class="user-email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dda4a8b6b49d90bca5aab8b1b1f3beb2b0">[email&#160;protected]</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Personal Details</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" name="fullName" placeholder="your full name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control" name="eMail" placeholder="<?php
                                                                                                                require("db.php");
                                                                                                                $Userid = $_SESSION['UserId'];
                                                                                                                $Query = "SELECT * FROM `users` WHERE id = $Userid";
                                                                                                                $Result = mysqli_query($con, $Query);
                                                                                                                $Email = $Result->fetch_assoc()['email'];
                                                                                                                echo $Email;
                                                                                                                ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Street">Street</label>
                                            <input type="name" class="form-control" name="Street" placeholder="Enter Street">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="ciTy">City</label>
                                            <input type="name" class="form-control" name="ciTy" placeholder="Enter City">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="sTate">State</label>
                                            <input type="text" class="form-control" name="sTate" placeholder="Enter State">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="zIp">Zip Code</label>
                                            <input type="text" class="form-control" name="zIp" placeholder="Zip Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="button" name="submit" class="btn btn-secondary">Cancel</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </section>
    <?php
    if (isset($_REQUEST['phone'])) {
        require("db.php");
        $Userid = $_SESSION['UserId'];
        $FullName = $_POST['fullName'];
        $EmailId = $_POST['eMail'];
        $PhoneNum = $_POST['phone'];
        $Street = $_POST['Street'];
        $City = $_POST['ciTy'];
        $State = $_POST['sTate'];
        $Zip = $_POST['zIp'];
        $Query = "REPLACE INTO `userdetails`(`id`, `FullName`, `Phone`, `Street`, `State`, `ZipCode`) VALUES ($Userid,'$FullName',$PhoneNum,'$Street','$State','$Zip')";
        $result  = mysqli_query($con, $Query);
    }
    ?>
</body>

</html>