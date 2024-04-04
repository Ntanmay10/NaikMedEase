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
        .mid {
            margin-left: 42%;
        }

        body {
            background-image: url(images/bg16.png);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .opa {
            opacity: 0.80;
        }

        .cent {
            margin-top: 5%;
            margin-left: 37%;
        }
    </style>
</head>

<body>
    <div class="form-container opa" method="post">
        <h2 class="text-center mb-4">Query finder</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="compname">Contact Code</label>
                <input type="text" class="form-control" id="compname" pattern="[0-9]{4}" title="Enter the 4 digit unique contact code" name="cntcode" required>
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
                if (mysqli_num_rows($t) > 0) {
                    while ($row = mysqli_fetch_assoc($t)) {
                        echo "<tr>
                        <th scope='row'>" . $num . "</th>
                        <td>" . $row['cntname'] . "</td>
                        <td>" . $row['cntdesc'] . "</td>
                        <td>" . $row['cntstatus'] . "</td>
                        </td>
                        </tr>";
                        $num++;
                    }
                } else {
                    echo "
                    <div class='alert alert-warning alert-dismissible text-center fixed-top cent w-25 fade show' role='alert'>
      <strong>NO queries fetched</strong>
      <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>