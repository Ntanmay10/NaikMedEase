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

        <table class="table table-hover text-center">
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
                while ($row = mysqli_fetch_assoc($getdta)) {
                    echo "<tr>
                <th scope='row'>" . $row['prdid'] . "</th>
                <td>" . $row['prdnm'] . "</td>
                <td>" . $row['prdpri'] . "</td>
                <td>
                <form method='post'>
                <button type='submit' class='btn btn-primary' name='btnupd'>Update</button>
                </form>
                </td>
                </tr>
                ";

                    if (isset($_REQUEST["btnupd"])) {
                        $_SESSION['prdid'] = $row['prdid'];
                        $_SESSION['prdnm'] = $row['prdnm'];
                        $_SESSION['prdpri'] = $row['prdpri'];
                        header('location:updatemedecine.php');
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
    <script src="./js/nav.js"></script>
</body>

</html>