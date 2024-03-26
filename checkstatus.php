<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Contact</title>
    <?php include_once 'navbar.php'; ?>
    <?php $con = mysqli_connect("localhost", "root", "", "naikmedease"); ?>
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/table.css">
    <style>
        .mid{
            margin-left: 42%;
        }
        body {
      background-image: url(images/bg16.png);
      background-repeat:no-repeat;
      background-size:cover;
    }

    .opa{
      opacity:  0.80;
    }

    </style>
</head>
<body>
    <div class="form-container opa" method="post">
        <h2 class="text-center mb-4">Query finder</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="compname">Contact Code</label>
                <input type="text" class="form-control" id="compname" name="cntcode" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btncnt">Find</button>
        </form>
    </div>

    <table class="table table-hover text-center format rounded">
        <thead class="table-dark">
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Query</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            if (isset($_REQUEST["btncnt"])) {
                $cntcode = $_REQUEST["cntcode"];
                $t = mysqli_query($con, "SELECT * FROM contact WHERE cntcode='$cntcode'");
                $num = 1;
                while ($row = mysqli_fetch_assoc($t)) {
                    echo "<tr>
                    <th scope='row'>" . $num . "</th>
                    <td>" . $row['cntname'] . "</td>
                    <td>" . $row['cntdesc'] . "</td>
                    <td>".$row['cntstatus']."</td>
                    </td>
                    </tr>";
                    $num++;
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>