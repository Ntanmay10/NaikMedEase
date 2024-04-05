<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Query</title>
    <?php include_once 'navbar.php'; ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $t = mysqli_query($con, "SELECT * FROM contact where cntstatus!='pending'");
    ?>
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/table.css">
    <style>
        .mid {
            margin-left: 42%;
        }

        h2 {
            text-align: center;
            margin-top: 1%;
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
        <tbody class="table-group-divider" id="myTable">
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