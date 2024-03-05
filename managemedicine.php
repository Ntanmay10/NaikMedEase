<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <?php include_once 'navbar.php' ?>
    <link rel="stylesheet" href="./css/table.css">
    <?php
    if (isset($_REQUEST["btnupd"])) {
        $_SESSION['prdid'] = $_REQUEST["btnupd"];
        header('location:updatemedecine.php');
    }
    ?>
</head>

<body>
    <table class="table table-hover text-center format rounded">
        <thead class="table-dark">
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $con = mysqli_connect("localhost", "root", "", "naikmedease");
            $getdta = mysqli_query($con, "select * from product");
            $num = 1;
            while ($row = mysqli_fetch_assoc($getdta)) {
                echo "<tr>
                <th scope='row'>" . $num . "</th>
                <td>" . $row['prdnm'] . "</td>
                <td>" . $row['prdpri'] . "</td>
                <td>
                <form method='post'>
                <button type='submit' class='btn btn-primary' name='btnupd' value=" . $row['prdid'] . ">Update</button>
                </form>
                </td>
                </tr>";
                $num++;
            }
            ?>
        </tbody>
    </table>

    <script src="./js/nav.js"></script>
</body>

</html>