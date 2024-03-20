<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    ?>
    <style>
        h2{
            text-align: center;
            margin-top: 2%;
        }
        table{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>User</h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userdata = mysqli_query($con, "select * from registration");
                $num = 1;
                while ($row = mysqli_fetch_assoc($userdata)) {
                    echo "<tr>
                    <td>" . $num . " 
                    <td>" . $row['usernm'] . " 
                    <td>" . $row['email'] . "  
                    </tr>
                    ";
                    $num++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>