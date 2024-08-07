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
        $cntstatus = $_REQUEST['cntstatus' . $cntid];
        $sql = "update contact set cntstatus='$cntstatus' where cntid='$cntid'";
        $res = mysqli_query($con, $sql);
        header('refresh:0');
    }
    ?>
    <link rel="stylesheet" href="./css/Admin.css">
    <style>
        .center {
            align-items: center;
            justify-content: center;
            margin-top: 1%;
            margin-bottom: 1%;
        }
    </style>
</head>

<body>
    <form method='post'>
        <div class="container">
            <div class="nav center gap-5">
                <a href="userfeedback.php" class="btn btn-dark">Feedback</a>
                <a href="queries.php" class="btn btn-dark">Queries</a>
                <a href="userinfo.php" class="btn btn-dark">View User</a>
                <a href="vieworders.php" class="btn btn-dark">New Orders</a>
                <a href="conforders.php" class="btn btn-dark">placed Orders</a>
                <a href="addsubadmin.php" class="btn btn-dark">Add Admin</a>
                <a href="adddoc.php" class="btn btn-dark">Add Doctor</a>
                <a href="managedoc.php" class="btn btn-dark">Manage Doctor</a>
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
                        <td> <input type='text' name='cntstatus" . $row['cntid'] . "' class='form-control'>
                        <td><button type='submit' class='btn btn-primary' name='btnsub' value=" . $row['cntid'] . ">Reply</button>
                        </tr>
                        ";
                            $num++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</body>

</html>