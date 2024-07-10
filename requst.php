<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Show Requst </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center"> Recent Requst </h1>
        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tr>
                        <th> Sr.No</th>
                        <th> Blood Group</th>
                        <th> User Name</th>
                        <th> Email</th>
                        <th> Hospital Name</th>
                        <th> Ation</th>
                    </tr>
                    <?php
                    $m = 1;
                    $user_name = $_SESSION['name'];
                    $qry = "SELECT * FROM bloodrequst  where `hospital_name`='$user_name' or `user_name`='$user_name'";
                    $qry_run = mysqli_query($con, $qry);
                    while ($row = mysqli_fetch_array($qry_run)) {
                        ?>
                        <tr>
                            <td><?= $m++ ?> </td>
                            <td><?= $row['blood_name'] ?></td>
                            <td> <?= $row['user_name'] ?></td>
                            <td> <?= $row['email'] ?></td>
                            <td> <?= $row['hospital_name'] ?></td>
                            <td>
                                <i class="fa fa-thumbs-up text-success mx-2"></i>
                                <i class="fa fa-trash text-danger mx-2"></i>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>