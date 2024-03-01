<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./css/table.css">
</head>

<body>
    <?php include_once 'navbar.php' ?>
    <div class="format">

        <table class="table table-hover">
            <thead class="table-dark">
            <tr>
                <th scope="col">Prod ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $con = mysqli_connect("localhost", "root", "", "naikmedease");
            $getdta = mysqli_query($con, "select * from product");
            while ($row = mysqli_fetch_array($getdta)) {
                echo "
                <tr>
                <th scope='row'>" . $row['prdid'] . "</th>
                <td>" . $row['prdnm'] . "</td>
                <td>" . $row['prdpri'] . "</td>
                <td>Test</td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    
</div>
</body>

</html>
<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "naikmedease");
if (isset($_REQUEST["btnupd"])) {
    $prdnm = $_REQUEST["prdnm"];
    $prodnewname = $_REQUEST["prodnewname"];
    $prdnewpri = $_REQUEST["prdnewpri"];
    $q = "SELECT * FROM product WHERE prdnm='$prdnm'";
    $t = mysqli_query($con, $q);
    if (mysqli_num_rows($t) > 0) {
        $updprd = "UPDATE product SET prdnm='$prodnewname', prdpri='$prdnewpri' where prdnm = '$prdnm'";
        $done = mysqli_query($con, $updprd);
        if ($done) {
            echo "<script>alert('Product Updated')</script>";
        }
    } else {
        echo "<script>alert('Product dosen\'t exists')</script>";
    }
}
?>