<?php
if (isset($_REQUEST['confirm'])) {
    require("db.php");
    $Userid = $_POST['Id'];
    $FullName = $_POST['fullName'];
    $EmailId = $_POST['eMail'];
    $PhoneNum = $_POST['phone'];
    $Street = $_POST['Street'];
    $State = $_POST['sTate'];
    $Zip = $_POST['zIp'];
    $Query = "REPLACE INTO `userdetails`(`id`, `FullName`, `Phone`, `Street`, `State`, `ZipCode`) VALUES ($Userid,'$FullName',$PhoneNum,'$Street','$State','$Zip')";
    $result  = mysqli_query($con, $Query);
    header("Location: Users.php");
}
?>
<html>

<head>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
    <link rel="stylesheet" href="Css/bootstracp.css" />
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
            <a href="#" class="logo" style="padding-right: 350px;">E - Library</a>
            <div class="toggle"></div>
            <ul class="menu">
                <li><a href="Source.php" target="_self">Books</a>
                </li>
                <li><a href="Users.php" target="_self" >Users</a>
                </li>
                <li><a href="MenShopping.php" target="_self">Add Book</a>
                </li>


                <li><a href="WomenShopping.php" target="_self">Categories</a></li>
                <li><a href="#"></a></li>
            </ul>

        </div>
    </nav>
    <section class="new-arrival">
        <div class="arrival-heading">
            <strong>Edit User</strong>
        </div>
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
                                    <h5 class="user-name">
                                        <?php
                                        require("db.php");
                                        $Userid = $_GET['UserId'];
                                        $Query = "SELECT * FROM `userdetails` WHERE id = $Userid";
                                        $Query2 = "SELECT * FROM `users` WHERE id = $Userid";
                                        $Result = mysqli_query($con, $Query)->fetch_assoc();
                                        $Result2 = mysqli_query($con, $Query2)->fetch_assoc();
                                        $UserName = $Result2['username'];
                                        $Email  = $Result2['email'];
                                        $FullName = $Result['FullName'];
                                        $Phone = $Result['Phone'];
                                        $Street = $Result['Street'];
                                        $State = $Result['State'];
                                        $ZipCode = $Result['ZipCode'];
                                        echo $UserName;
                                        ?>
                                    </h5>
                                    <h6 class="user-email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dda4a8b6b49d90bca5aab8b1b1f3beb2b0"><?php echo $Email; ?></a></h6>
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
                                    </div><div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">User Id</label>
                                            <input type="text" class="form-control" name="Id" placeholder=""  value="<?php echo $Userid; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" name="fullName" placeholder="your full name" value="<?php echo $FullName; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control" name="eMail" placeholder="" value="<?php echo $Email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Enter phone number" value="<?php echo $Phone; ?>">
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
                                            <input type="name" class="form-control" name="Street" placeholder="Enter Street" value="<?php echo $Street; ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="sTate">State</label>
                                            <input type="text" class="form-control" name="sTate" placeholder="Enter State" value="<?php echo $State; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="zIp">Zip Code</label>
                                            <input type="text" class="form-control" name="zIp" placeholder="Zip Code" value="<?php echo $ZipCode; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group" style="padding-top: 33px;">
                                            <label for="zIp">Confirm Update?</label>
                                            <input type="checkbox" name="confirm">
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

</body>

</html>