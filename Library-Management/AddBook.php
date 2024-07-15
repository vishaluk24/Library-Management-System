<html>

<head>
    <script src="https://kit.fontawesome.com/b31238ed9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Navigation.css" />
    <link rel="stylesheet" href="CSS/Products.css" />
    <link rel="stylesheet" href="CSS/Banner.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: poppins;
        }

        .formbold-main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }

        .formbold-form-wrapper {
            margin: 0 auto;
            max-width: 550px;
            width: 100%;
            background: white;
        }

        .formbold-input-flex {
            display: flex;
            gap: 20px;
            margin-bottom: 22px;
        }

        .formbold-input-flex>div {
            width: 50%;
            display: flex;
            flex-direction: column-reverse;
        }

        .formbold-textarea {
            display: flex;
            flex-direction: column-reverse;
        }

        .formbold-form-input {
            width: 100%;
            padding-bottom: 10px;
            border: none;
            border-bottom: 1px solid #DDE3EC;
            background: #FFFFFF;
            font-weight: 500;
            font-size: 16px;
            color: #07074D;
            outline: none;
            resize: none;
        }

        .formbold-form-input::placeholder {
            color: #536387;
        }

        .formbold-form-input:focus {
            border-color: #6A64F1;
        }

        .formbold-form-label {
            color: #07074D;
            font-weight: 500;
            font-size: 14px;
            line-height: 24px;
            display: block;
            margin-bottom: 18px;
        }

        .formbold-form-input:focus+.formbold-form-label {
            color: #6A64F1;
        }

        .formbold-input-file {
            margin-top: 30px;
        }

        .formbold-input-file input[type="file"] {
            position: absolute;
            top: 6px;
            left: 0;
            z-index: -1;
        }

        .formbold-input-file .formbold-input-label {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .formbold-filename-wrapper {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 22px;
        }

        .formbold-filename {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 14px;
            line-height: 24px;
            color: #536387;
        }

        .formbold-filename svg {
            cursor: pointer;
        }

        .formbold-btn {
            font-size: 16px;
            border-radius: 5px;
            padding: 12px 25px;
            border: none;
            font-weight: 500;
            background-color: #6A64F1;
            color: white;
            cursor: pointer;
            margin-top: 25px;
        }

        .formbold-btn:hover {
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
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
                <li><a href="AddBook.php" target="_self" style="padding-bottom: 5px;
    border-bottom-style: solid;
    border-bottom-width: 3.1px;
    width: fit-content;">Add Book</a>
                </li>
                <li><a href="RequestedBook.php" target="_self">Requested Books</a></li>
                <li><a href="#"></a></li>
            </ul>

        </div>
    </nav>
    <?php
    if (isset($_REQUEST['title'])) {
        require("db.php");
        $Query = mysqli_query($con, "SELECT * FROM `books`");
        $Id = mysqli_num_rows($Query) + 50;
        $title = $_POST['title'];
        $imagelink = $_POST['link'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $page = $_POST['page'];
        $Query = "INSERT INTO `books`(`BookId`, `Title`, `Image`, `Available`) VALUES ($Id, '$title' , '$imagelink' , 1)";
        $Query2 = "INSERT INTO `bookdetails`(`BookId`, `Categories`, `Pages`, `Authors`) VALUES ($Id, '$category' , $page , '$author')";
        $result = mysqli_query($con, $Query);
        $result = mysqli_query($con, $Query2);
        echo "<div class="."arrival-heading".">
        <strong style="."background-color:green;".">Book Successfuly Added</strong>
    </div>";
    } else {
    ?>
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="post">
                    <div class="formbold-input-flex">
                        <div>
                            <input type="text" name="title" id="firstname" placeholder="Dune" class="formbold-form-input" />
                            <label for="firstname" class="formbold-form-label"> Title </label>
                        </div>
                        <div>
                            <input type="text" name="category" id="lastname" placeholder="Science, Novel" class="formbold-form-input" />
                            <label for="lastname" class="formbold-form-label"> Category </label>
                        </div>
                    </div>

                    <div class="formbold-input-flex">
                        <div>
                            <input type="text" name="author" id="email" placeholder="Frank Herbert" class="formbold-form-input" />
                            <label for="email" class="formbold-form-label"> Authors </label>
                        </div>
                        <div>
                            <input type="text" name="link" id="phone" placeholder="" class="formbold-form-input" />
                            <label for="phone" class="formbold-form-label"> Thumbnail Link </label>
                        </div>
                    </div>
                    <div class="formbold-input-flex">
                        <div>
                            <input type="text" name="page" id="phone" placeholder="" class="formbold-form-input" />
                            <label for="phone" class="formbold-form-label"> Page </label>
                        </div>
                    </div>

                    <div class="formbold-textarea">
                        <textarea rows="1" name="message" id="message" placeholder="Write book description" class="formbold-form-input"></textarea>
                        <label for="message" class="formbold-form-label"> Description </label>
                    </div>
                    <button class="formbold-btn">
                        Add Book
                    </button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>