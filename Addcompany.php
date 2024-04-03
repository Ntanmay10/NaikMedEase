<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add company</title>
    <?php include_once 'navbar.php'; ?>
    <link rel="stylesheet" href="./css/form.css">
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    if (isset($_REQUEST["btnadd"])) {
        $compname = $_REQUEST["compname"];
        $q = "SELECT * FROM company WHERE compname='$compname'";
        $t = mysqli_query($con, $q);
        if (mysqli_num_rows($t) > 0) {
            echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
            <strong>Company already exists</strong>
            <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        } else {
            $addcomp = "insert into company(compname) values('$compname')";
            $done = mysqli_query($con, $addcomp);
            if ($done) {
                echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
                <strong>Company Inserted</strong>
                <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            }
        }
    }
    ?>
    <link rel="stylesheet" href="./css/table.css">
    <style>
        .mid {
            margin-left: 45%;
        }

        .middle {
            margin-left: 35%;
            margin-top: 1%;
        }
    </style>
    <link rel="stylesheet" href="./css/vieworder.css">
</head>

<body>
    <div class="box">
        <nav>
            <div class="lbl">Search</div>
            <div class="input-group ml-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control w-25" id="myInput" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </nav>
    </div>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Add Company</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="compname">Company Name</label>
                <input type="text" class="form-control" id="compname" name="compname" pattern="[A-z a-z]{3,25}" title="Only aplhabets minimum 3 and maximum 25" required>
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
        <tbody class="table-group-divider" id="myTable">
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
    <script src="./js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>