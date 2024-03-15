<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <?php include_once 'navbar.php'; ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $qry = mysqli_query($con, "select * from contact");
    if (isset($_REQUEST['btnsub'])) {
        $cntid = $_REQUEST['btnsub'];
        $cntstatus = $_REQUEST['cntstatus'];
        $sql = "update contact set cntstatus='$cntstatus' where cntid='$cntid'";
        $res = mysqli_query($con, $sql);
        header('refresh:0');
    }
    ?>
    <link rel="stylesheet" href="./css/Admin.css">
    <style>
        hr {
            width: 80%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <button class="btn btn-primary mt-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Manage Data</button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <p class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Hello Admin</p>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                
            </div>
        </div>
        <h2>Queries to be answered</h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Query</th>
                    <th>Reply</th>
                    <th>Handel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                while ($row = mysqli_fetch_assoc($qry)) {
                    if ($row['cntstatus'] == "pending") {
                        echo "<tr>
                        <td>" . $num . " 
                        <td>" . $row['cntname'] . " 
                        <td>" . $row['cntemail'] . " 
                        <td>" . $row['cntdesc'] . " 
                        <form method='post'>
                        <td> <input type='text' name='cntstatus' class='form-control' required>
                        <td><button type='submit' class='btn btn-primary' name='btnsub' value=" . $row['cntid'] . ">Reply</button>
                        </form>
                        </tr>
                        ";
                        $num++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="container">
        <h2>Feedbacks</h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $feedqry = mysqli_query($con, "select * from feedback");
                $num = 1;
                while ($rowfeed = mysqli_fetch_assoc($feedqry)) {
                    echo "<tr>
                        <td>" . $num . " 
                        <td>" . $rowfeed['feedname'] . " 
                        <td>" . $rowfeed['feedemail'] . " 
                        <td>" . $rowfeed['feeddesc'] . " 
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