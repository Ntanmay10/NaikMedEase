<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Medecine</title>
    <?php include_once 'navbar.php'; ?>
    <?php
    if (isset($_REQUEST["btnupd"])) {
        $_SESSION['prdid'] = $_REQUEST["btnupd"];
        header('location:updatemedecine.php');
    }
    ?>
    <link rel="stylesheet" href="./css/table.css">
    <style>
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
    <table class="table table-hover text-center format rounded">
        <thead class="table-dark">
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">stock</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody class="table-group-divider" id="myTable">
            <?php
            $con = mysqli_connect("localhost", "root", "", "naikmedease");
            $getdta = mysqli_query($con, "select * from product");
            $num = 1;
            while ($row = mysqli_fetch_assoc($getdta)) {
                echo "<tr>
                <th scope='row'>" . $num . "</th>
                <td> <img src='./medimage/" . $row['prdimg'] . "' alt='Card " . $num . " Image' width='25%'  height='50px'> </td>
                <td>" . $row['prdnm'] . "</td>
                <td>" . $row['prdpri'] . "</td>
                <td>" . $row['stock'] . "</td>
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