<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add company</title>
    <?php include_once 'navbar.php'; ?>
    <link rel="stylesheet" href="./css/form.css">
    <?php
    $con = mysqli_connect("localhost", "root", "","naikmedease");
    if (isset($_REQUEST["btnadd"])) {
        $compname = $_REQUEST["compname"];
        $q = "SELECT * FROM company WHERE compname='$compname'";
        $t = mysqli_query($con, $q);
        if (mysqli_num_rows($t) > 0) {
            echo "<script>alert('Company already exists')</script>";
        } else {
            $addcomp = "insert into company(compname) values('$compname')";
            $done = mysqli_query($con, $addcomp);
            if ($done) {
                echo "<script>alert('Company inserted')</script>";
            }
        }
    }
    ?>
    <link rel="stylesheet" href="./css/table.css">
</head>
<body>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Add Company</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="compname">Company Name</label>
                <input type="text" class="form-control" id="compname" name="compname" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnadd">Add</button>
        </form>
    </div>

    <table class="table table-hover text-center format rounded">
        <thead class="table-dark">
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $getdta = mysqli_query($con, "select * from company");
            $num = 1;
            while ($row = mysqli_fetch_assoc($getdta)) {
                echo "<tr>
                <th scope='row'>" . $num . "</th>
                <td>" . $row['compname'] . "</td>
                </td>
                </tr>";
                $num++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>