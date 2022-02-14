<?php
session_start();
if (isset($_SESSION['email'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>E-Learning Sign In</title>
</head>

<body class="body">
    <div style="max-width: 600px;" class="container">
        <div class="row px-3">
            <div class="shadow rounded-sign col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="card-body">
                    <div class="border-bottom-0 p-3">
                        <a href="index.php" class="text-decoration-none text-reset">
                            <h2 class="fw-bold mx-3 mb-0 b-left px-2 text-nowrap">E-classe</h2>
                        </a>
                    </div>
                    <div class="text-center py-3">
                        <h5 class="fw-bold mb-0">SIGN IN</h5>
                        <p class="text-muted">Enter your credentials to access your account</p>
                    </div>
                    <div class="p-0">
                        <form method="POST" class="text-muted">
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="text-dark border border-2 border-danger pt-1 pb-2 text-center bg-warning bar"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <?php if (isset($_GET['close'])) { ?>
                                <p class="text-light border border-2 border-warning pt-1 pb-2 text-center bg-danger bar"><?php echo $_GET['close']; ?></p>
                            <?php } ?>
                            <label class="py-1" for="email">Email</label>
                            <input type="email" name="email" class="form-control rounded-4 py-2 ps" id="floatingInput" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"] ?>" placeholder="Enter your email">
                            <label class="py-1" for="email">Password</label>
                            <input type="password" name="password" class="form-control rounded-4 py-2 ps" id="floatingPassword" value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"] ?>" placeholder="Enter your password">
                            <input type="checkbox" name="remember_me" class="mt-2">
                            <label class="ps" for="remember_me">Remember me</label>
                            <button class="w-100 mb-3 mt-4 btn btn-lg rounded-4 standard text-white ps" name="submit" type="submit">SIGN IN</button>
                        </form>
                        <div class="mb-2 mt-0 text-center text-muted">
                            <small>Forgot your password? <a class="text-info text-nowrap" href="#">Reset Password</a></small>
                        </div>
                        <?php
                        include('connect.php');
                        if (isset($_POST['submit'])) {
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } else {
                                $sign = "SELECT * FROM compte WHERE email = '" . $email . "' AND password = '" . $password . "' limit 1";
                                $success = mysqli_query($conn, $sign);
                                $row = mysqli_num_rows($success);
                                $ar = mysqli_fetch_assoc($success);
                                if ($row > 0) {
                                    session_start();
                                    $_SESSION['email'] = $_POST['email'];
                                    $_SESSION['name'] = $ar['name'];
                                    $_SESSION['last_login_timestamp'] = time();
                                    if (!empty($_POST["remember_me"])) {
                                        setcookie("email", $_POST["email"], time() + (310));
                                        setcookie("password", $_POST["password"], time() + (310));
                                    } else {
                                        if (isset($_COOKIE["email"])) {
                                            setcookie("email", "");
                                        }
                                        if (isset($_COOKIE["password"])) {
                                            setcookie("password", "");
                                        }
                                    }
                                    header("location:index.php");
                                } else {
                                    header("location:signin.php?error=Email or Password is incorrect!");
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>