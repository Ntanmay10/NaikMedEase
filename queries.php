<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Query</title>
    <?php include_once 'navbar.php'; ?>
    <?php
     $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $t = mysqli_query($con, "SELECT * FROM contact");
    ?>
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/table.css">
    <style>
        .mid {
            margin-left: 42%;
        }
        h2{
            text-align: center;
            margin-top: 1%;
        }
    </style>
</head>

<body>
    <h2>User Queries</h2>
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
                $num = 1;
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
            ?>
        </tbody>
    </table>
</body>

</html>