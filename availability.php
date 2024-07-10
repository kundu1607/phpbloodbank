<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ADD BLOOD FOR LOGIN HOSPITAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>save blood record
                            <a href="availability.php" class="btn btn-primary float-end">SHOW DATA</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <label for="">BLood group</label>
                            <select name="select" id="" class="form-control">
                                <option selected>A+</option>
                                <option>A-</option>
                                <option>B-</option>
                                <option>O+</option>
                                <option>O-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>B+</option>
                            </select>
                            <label for="">QTY</label>
                            <input type="tel" name="qty" id="" class="form-control">
                            <input type="submit" name="save-blood" class="btn btn-primary">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head">
                        <h4>show data
                            <a href="availability.php" class="btn btn-primary float-end">ADD BLOOD</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>id</th>
                                <th>blood_name</th>
                                <th>QTY</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            include 'dbconn.php';
                            $qry = "SELECT* FROM blood ";
                            $qry_run = mysqli_query($con, $qry);
                            if (mysqli_num_rows($qry_run) > 0) {
                                foreach ($qry_run as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $data['id']; ?></td>
                                        <td><?= $data['blood_name']; ?></td>
                                        <td><?= $data['qty']; ?></td>
                                        <td class="d-flex">
                                            <span style="padding-left:20px"><a href="" class="btn btn-info">view</a> </span>
                                            <span style="padding-left:20px"> <a href="edit.php?id=<?= $data['id']; ?>"
                                                    class="btn btn-warning">Edit</a>
                                            </span>
                                            <span style="padding-left:20px">
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="del_id" id="del_id" value="<?= $data['id']; ?>">
                                                    <input type="submit" name="delete_data" class="btn btn-danger"
                                                        value="Delete">
                                                </form>
                                            </span>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
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