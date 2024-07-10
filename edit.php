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
    <title>EDIT BLOOD RECORD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>update blood record
                            <a href="view.php" class="btn btn-primary float-end">SHOW DATA</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $editid = $_GET['id'];
                        $qry = "SELECT * FROM blood WHERE id='$editid'";
                        $qry_run = mysqli_query($con, $qry);


                        if ($row = mysqli_fetch_array($qry_run)) {
                            ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="blood_id" id="blood_id" value="<?= $row['id']; ?>">
                                <label for="">BLood group</label>
                                <select name="select" id="" class="form-control" value="">
                                    <option><?= $row['blood_name']; ?></option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="B+">B+</option>
                                </select>
                                <label for="">QTY</label>
                                <input type="tel" name="qty" id="" class="form-control" value="<?= $row['qty'] ?>">
                                <input type="submit" name="update-blood" class="btn btn-primary" value="Update blood">
                            </form>
                            <?php
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>