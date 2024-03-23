<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    ?>
    <style>
        h2{
            text-align: center;
            margin-top: 2%;
        }
        table{
            text-align: center;
        }
        .middle {
            margin-left: 35%;
            margin-top: 1%;
        }
    </style>
</head>

<body>
<nav class="w-25 middle">
        <div class="input-group ml-5">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" id="myInput" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </nav>
    <div class="container">
        <h2>User</h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                $userdata = mysqli_query($con, "select * from registration");
                $num = 1;
                while ($row = mysqli_fetch_assoc($userdata)) {
                    echo "<tr>
                    <td>" . $num . " 
                    <td>" . $row['usernm'] . " 
                    <td>" . $row['email'] . "  
                    </tr>
                    ";
                    $num++;
                }
                ?>
            </tbody>
        </table>
    </div>
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