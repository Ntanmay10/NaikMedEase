<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <?php include_once 'navbar.php' ?>
    <link rel="stylesheet" href="./css/form.css">
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    if (isset($_REQUEST["btnsub"])) {
        $cntname = $_REQUEST['cname'];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['msg'];
        $addque = "insert into contact(cntname,cntemail,cntdesc) values('$cntname','$email','$message')";
        $done = mysqli_query($con, $addque);
        if ($done) {
            echo "<script>alert('Query Raised')</script>";
            header('refresh:0');
        }
    }
    ?>
</head>

<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Contact Us</h2>
        <form id="registrationForm" method="post">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="cname" pattern="[A-Za-z ]{3,30}"
        title="Minimum 3chars and Max 30, Chars Only" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="Desc">Description</label>
                <textarea class="form-control form-control-lg" id="Desc" name="msg"></textarea>
            </div>
            <button type="submit" name="btnsub" class="btn btn-primary btn-block mid">Submit</button>
        </form>
    </div>
</body>

</html>