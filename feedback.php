<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    if (isset($_REQUEST["btnsub"])) {
        $feedname = $_REQUEST['feedname'];
        $feedemail = $_REQUEST['feedemail'];
        $feeddesc = $_REQUEST['feeddesc'];
        $addfeed = "insert into feedback(feedname,feedemail,feeddesc) values('$feedname','$feedemail','$feeddesc')";
        $done = mysqli_query($con, $addfeed);
        if ($done) {
            echo "<script>
            alert('feedback saved');
            </script>";
            header('refresh:0');
        }
    }
    ?>
    <link rel="stylesheet" href="./css/form.css">
    <style>
        .mid{
            margin-left: 40%;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Feedback Form</h2>
        <form id="registrationForm" method="post">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="feedname" pattern="[A-Za-z ]{3,30}" title="Minimum 3chars and Max 30, Chars Only" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="feedemail" required>
            </div>
            <div class="form-group">
                <label for="Desc">Feedback</label>
                <textarea class="form-control form-control-lg" id="Desc" name="feeddesc"></textarea>
            </div>
            <button type="submit" name="btnsub" class="btn btn-primary btn-block mid">Submit</button>
        </form>
    </div>
</body>

</html>