<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
include 'dbconn.php';


if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}



if (isset($_POST['requst-btn'])) {
    $bldreq = $_POST['blood_name'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $hospital_name = $_POST['hospital_name'];


    $qq = "INSERT INTO bloodrequst(blood_name,user_name ,email,hospital_name)VALUE('$bldreq','$name','$email','$hospital_name')";
    $qq_go = mysqli_query($con, $qq);
    if ($qq_go) {
        ?>
        echo '
        <script>
            Swal.fire({
                title: "Success!",
                text: "Your request has been submitted successfully.",
                icon: "success",
                showConfirmButton: true,
                allowOutsideClick: false
            })
        </script>';
        <?php
    } else {
        echo "data not save";
    }

}




?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container my-5 py-3">
        <h5>Check Out The Availabilities In </h5>
        <div class="row">
            <?php

            $qry = "SELECT * FROM bold where `type`='hospital' ";
            $qry_run = mysqli_query($con, $qry);
            $i = 0;
            while ($row = mysqli_fetch_array($qry_run)) {
                ?>
                <div class="col-md-4 my-2">
                    <div class="card">
                        <img src="./uploadsimage/<?php if ($row['proof']) {
                            echo $row['proof'];
                        } else {
                            echo 'notFound.png';
                        } ?>
                        " width="100%" height="300px" />
                        <div class=" card-body">
                            <p> <?= $row['full_name'] . " , ",
                                $row['Address'] ?></p>

                            <div>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample<?= $i ?>" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Check Availability
                                </button>
                            </div>
                            <div class="collapse mt-2" id="collapseExample<?= $i ?>">
                                <div class="card card-body">
                                    <table class="table table-striped text-center table-hover">
                                        <thead>
                                            <tr>
                                                <th colspan="2"> Blood Group </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $hospital_name = $row['full_name'];
                                            $qry2 = "SELECT * FROM blood  where `hospital_name`='$hospital_name' ";
                                            $qry_run2 = mysqli_query($con, $qry2);
                                            while ($data = mysqli_fetch_array($qry_run2)) {
                                                ?>
                                                <tr>
                                                    <td> <?= $data['blood_name'] ?> </td>
                                                    <td> <?= $data['qty'] ?> </td>
                                                    <?php
                                                    if ($_SESSION['type'] == "hospital" || $_SESSION['blood'] != $data['blood_name']) {
                                                        ?>
                                                        <td> <button disabled class="btn btn-danger">Requst</button> </td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                                            method="POST">
                                                            <input type="hidden" name="hospital_name"
                                                                value="<?= $hospital_name ?>" />
                                                            <input type="hidden" name="blood_name"
                                                                value="<?= $data['blood_name'] ?>" />
                                                            <td> <button class="btn btn-danger" type="submit"
                                                                    name="requst-btn">Requst</button>
                                                            </td>
                                                        </form>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>