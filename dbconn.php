<?php
$con = mysqli_connect("localhost", "root", "", "bharatsoftware");
if ($con) {
    // echo ("connection succesfully");
} else {
    echo "connection failed" . mysqli_connect_error();
}
?>