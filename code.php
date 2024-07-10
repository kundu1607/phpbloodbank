<?php
include 'dbconn.php';
session_start();


// registriction

if (isset($_POST['register_reciever'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $bloodGroup = $_POST['bloodGroup'];
    $aadhar = $_POST['aadhar'];


    $filename = $_FILES["aadhar_pic"]["name"];
    $tmpname = $_FILES["aadhar_pic"]["tmp_name"];

    move_uploaded_file($tmpname, "uploadsimage/" . $filename);


    $qry = "INSERT INTO Bold(full_name,phone_number,email,password,date,blood,aadhar_number,proof,type)VALUE('$name' ,'$phone', '$email', '$password', '$dob', '$bloodGroup' ,'$aadhar' ,'$filename','reciver')";
    $qry_run = mysqli_query($con, $qry);

    if ($qry_run) {
        ?>
        <script>
            alert("your data save succesfully");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("your data not save ");
        </script>
        <?php
    }
}


// login

if (isset($_POST['login'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM bold where email='$email_login' and password='$password_login' ";
    $run_query = mysqli_query($con, $query);
    $run = mysqli_num_rows($run_query);
    $data = mysqli_fetch_array($run_query);


    if ($run == 1) {
        $_SESSION['type'] = $data['type'];
        $_SESSION['login'] = 1;
        $_SESSION['name'] = $data['full_name'];
        $_SESSION['blood'] = $data['blood'];
        $_SESSION['email'] = $data['email'];
        header("Location: index.php");

    } else {
        echo "invalid email and password";
    }

}

// save

if (isset($_POST['save-blood'])) {

    $name = $_POST['select'];
    $qty = $_POST['qty'];
    $hospital_name = $_SESSION['name'];

    $qry = "INSERT INTO  blood(blood_name,hospital_name,qty)VALUE('$name','$hospital_name','$qty')";
    $qry_run = mysqli_query($con, $qry);

    if ($qry_run) {
        // echo "data save succesfully";
        header("Location: availability.php");
    } else {
        echo "data not save";
    }
}


// update data

if (isset($_POST['update-blood'])) {

    $blood_id = $_POST['blood_id'];
    $name = $_POST['select'];
    $qty = $_POST['qty'];


    $qry = "UPDATE blood SET blood_name='$name', qty='$qty'  WHERE id='$blood_id'";
    $qry_run = mysqli_query($con, $qry);

    if ($qry_run) {
        echo 'blood update succesfully';
    } else {
        echo 'blood not update ';
    }

}

// delete data
if (isset($_POST['delete_data'])) {

    $del_id = $_POST['del_id'];

    $qry = "DELETE FROM `blood` WHERE id='$del_id'";
    $qry_run = mysqli_query($con, $qry);
    if ($qry_run) {
        // echo "data delect succesfully";
        header("Location: view.php");
    } else {
        echo "no data delect";
    }
}

// hospital save data

if (isset($_POST['register_hospital'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $filename = $_FILES["aadhar_pic"]["name"];
    $tmpname = $_FILES["aadhar_pic"]["tmp_name"];

    $upld = move_uploaded_file($tmpname, "uploadsimage/" . $filename);
    $qry = "INSERT INTO bold(full_name,address,email,password,proof,type)VALUE('$name' ,'$address', '$email', '$password' ,'$filename','hospital')";
    $qry_run = mysqli_query($con, $qry);
    if ($qry_run) {
        // echo "save data";
        ?>
        <script>
            alert("Hospital create succesfully");
        </script>
        <?php
        header("Location: index.php");
    } else {
        echo "data not save";
    }
}



?>