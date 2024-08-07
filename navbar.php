<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">NaikMedEase</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if (isset($_SESSION['usernm']) and $_SESSION['usernm'] != "Admin") {
                        echo "<li class='nav-item'><a class='nav-link' href='#' onclick='home();'>Home</a></li>";
                    } elseif (isset($_SESSION['usernm'])) {
                        echo "<a class='nav-link active' aria-current='page' href='#' onclick='Admin();'>Home</a>";
                    } else {
                        echo "";
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['usernm']) and ($_SESSION['usernm'] != "Admin")) {
                        echo "<li class='nav-item'><a class='nav-link' href='#' onclick='medecine();'>medecine</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='#' onclick='cart();'>Cart</a></li>";
                    } elseif (isset($_SESSION['usernm'])) {
                        echo "<li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Medecine</a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='#' onclick='comp();'>Add Company</a>
                            <a class='dropdown-item' href='#' onclick='meds();'>Add Medecine</a>
                            <a class='dropdown-item' href='#' onclick='manage();'>manage medecine</a>
                        </div>
                    </li>";
                    } else {
                        echo "";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="aboutus();">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>

                        <ul class="dropdown-menu">
                            <?php
                            if (isset($_SESSION['usernm'])) {
                                echo "<li><a class='dropdown-item' href='#' onclick='logout();'>Logout</a></li>";
                            } else {
                                echo "<li><a class='dropdown-item' href='#' onclick='login();'>Login/Sign Up</a></li>";
                            }
                            ?>
                            <li><a class="dropdown-item" href="#" onclick="manageprofile();">Manage Profile</a></li>
                        </ul>
                    </li>
                    <?php
                    if (!isset($_SESSION['usernm'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#' onclick='contus();'>Contact Us</a></li>";
                    }
                    ?>
                </ul>
                <?php
                if (isset($_SESSION['usernm'])) {
                    echo "<span><span class='fa'>&#xf007; </span> Hello " . $_SESSION['usernm'] . "</span>";
                }
                ?>
            </div>
        </div>
    </nav>
    <script>
        function logout() {
            window.location.href = "logout.php"
        }

        function manage() {
            window.location.href = "managemedicine.php"
        }

        function Admin() {
            window.location.href = "Admin.php"
        }

        function comp() {
            window.location.href = "Addcompany.php"
        }

        function meds() {
            window.location.href = "Addmeds.php"
        }

        function cart() {
            window.location.href = "cart.php"
        }

        function contus() {
            window.location.href = "contactus.php"
        }
    </script>
    <script src="./js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>