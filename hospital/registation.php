<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-3">
        <form id="signup-form" enctype="multipart/form-data" class="form" role="form" method="post"
            action="../code.php">
            <div class="input-group form-group mb-3">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" class="form-control" name="name" placeholder="hospital name" maxlength="30" required>
            </div>

            <div class="input-group form-group mb-3">
                <span class="input-group-text">
                    <i class="fa-solid fa-address-card"></i>
                </span>
                <input type="text" class="form-control" name="address" placeholder="Address" required>
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
                <input type="password" class="form-control" name="password" placeholder="Password" minlength="6"
                    required>
            </div>

            <div class="input-group form-group mb-3">
                <span class="input-group-text">
                    Upload A Valid ID Proof
                </span>
                <input type="file" class="form-control" name="aadhar_pic" placeholder="PDF">
            </div>

            <div class="form-group text-center py-3 ">
                <input name="register_hospital" type="submit" class="btn btn-block btn-primary"
                    value="Create Account"></input>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>