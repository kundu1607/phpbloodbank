<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Website </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--============== navbar ==================-->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./uploadsimage/bloodbanklogo.png" alt="" height="30px" width="30px">
                True Friend
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if (isset($_SESSION['type']) && $_SESSION['type'] == "hospital") {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="hospital.php">Availability </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-disabled="true" href="availability.php"> Add Bloog INfo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-disabled="true" href="requst.php">View Requst</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="hospital.php">Availability </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-disabled="true">Donate</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="mb-2">
                    <?php
                    if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
                        ?>
                        <a class="btn btn-outline-success px-4">
                            <i class="fa-regular fa-circle-user"></i> <?= $_SESSION['name']; ?>
                        </a>
                        <a href="logout.php" class="btn btn-outline-success px-4" value="">
                            <i class="fas fa-sign-in-alt mx-1"></i> Logout
                        </a>
                        <?php
                    } else {
                        ?>
                        <button class="btn btn-outline-success px-4" type="button" data-bs-toggle="modal"
                            data-bs-target="#signup-modal">
                            <i class="fas fa-user mx-1"></i>SignUp</button>
                        <button class="btn btn-outline-success px-4" type="button" data-bs-toggle="modal"
                            data-bs-target="#login-modal">
                            <i class="fas fa-sign-in-alt mx-1"></i>LogIn</button>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </nav>

    <div class="modal fade" id="signup-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Signup with True Friend</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="signup-form" enctype="multipart/form-data" class="form" role="form" method="post"
                        action="code.php">
                        <div class="input-group form-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" maxlength="30"
                                required>
                        </div>

                        <div class="input-group form-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                maxlength="10" minlength="10" required>
                        </div>

                        <div class="input-group form-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        <div class="input-group form-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                minlength="6" required>
                        </div>

                        <div class="input-group form-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-calendar"></i>
                            </span>
                            <input type="date" class="form-control" name="dob" maxlength="150" required>
                        </div>

                        <div class="input-group form-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-droplet"></i>
                            </span>
                            <select class="form-select" name="bloodGroup" required>
                                <option selected>A+</option>
                                <option>A-</option>
                                <option>B-</option>
                                <option>O+</option>
                                <option>O-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>B+</option>
                            </select>
                        </div>

                        <div class="input-group form-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-id-card"></i>
                            </span>
                            <input type="text" class="form-control" name="aadhar" placeholder="Valid Aadhar Number"
                                maxlength="30" required>
                        </div>

                        <div class="input-group form-group mb-3">
                            <span class="input-group-text">
                                Upload A Valid ID Proof
                            </span>
                            <input type="file" class="form-control" name="aadhar_pic" placeholder="PDF">
                        </div>

                        <div class="form-group text-center py-3 ">
                            <input name="register_reciever" type="submit" class="btn btn-block btn-primary"
                                value="Create Account"></input>
                        </div>
                    </form>
                </div>

                <div class="modal-footer justify-content-center">
                    <div>
                        Already have an account?
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal"
                            data-bs-target="#login-modal">Login</a>
                    </div>
                    <div>
                        Wanna Join True Friend As A Blood Bank ?
                        <a href="hospital/registation.php">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-heading"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login-heading">Login with True Friend</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="login-form" class="form" role="form" method="post" action="code.php">
                        <div class="input-group form-group  mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        <div class="input-group form-group  mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                minlength="6" required>
                        </div>

                        <div class="form-group text-center">
                            <input name="login" type="submit" class="btn btn-block btn-primary" value="Login"></input>
                        </div>
                    </form>
                </div>

                <div class="modal-footer justify-content-center">
                    <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signup-modal">Click
                        here</a>
                    to register a new account
                </div>
            </div>
        </div>
    </div>

    <!--============== slide ====================-->

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://healthmatters.nyp.org/wp-content/uploads/2021/12/nybc-blood-donation-hero.jpg"
                    class="d-block w-100" style="height: 640px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Every 2 seconds someone needs blood</h5>
                    <p>And we are here to help.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://s7d2.scene7.com/is/image/TWCNews/0706_blood_bags_pixabayjpg" class="d-block w-100"
                    style="height: 640px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Check out blood availability</h5>
                    <p>Check out blood availability in the hospitals near you.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.hopkinsmedicine.org/-/media/images/health/2_-treatment/pathology/blood-banking-hero.ashx?h=500&iar=0&mh=500&mw=1300&w=1297&hash=8FE7D60CC3BFA31566598DAE13D91331"
                    style="height: 640px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-dark">
                    <h5>We are at your service</h5>
                    <p>You can return the favour by donating blood later. It can save someone's life.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>