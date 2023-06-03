<?php
session_start();
if (!empty($_SESSION['email']) && !empty($_SESSION['email'])) {
    header('location: main.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sign up</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />

</head>
<?php if (isset($_GET['err'])) { ?>
    <script>alert("<?php echo $_GET['err'] ?>")</script>
<?php } ?>

<body style="background-color:black;">
    <div class="card"
        style="width: 18rem; position: relative; left: 40%; top: 15px; background-color:black; box-shadow: 0px 0px 2px 2px white;">
        <div class="card-body">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                        aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                        aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="./functions/create.php" method="post">
                        <div class="text-center mb-3" style="color: white;">
                            <p>Sign in</p>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="loginName" name="input-email" class="form-control" />
                            <label class="form-label" for="loginName" style="color: grey;">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" name="input-password" class="form-control" />
                            <label class="form-label" for="loginPassword" style="color: grey;">Password</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Login</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form action="./functions/create.php" method="post">
                        <div class="text-center mb-3" style="color: white;">
                            <p>Sign up</p>
                            <!-- Firstname input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="registerName" name="fname" class="form-control" />
                                <label class="form-label" for="registerName" style="color: grey;">Firstname</label>
                            </div>

                            <!-- Lastname input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="registerUsername" name="lname" class="form-control" />
                                <label class="form-label" for="registerUsername" style="color: grey;">Lastname</label>
                            </div>
                            <!-- Gender Number input -->
                            <div class="row" style="margin-bottom: 1.5rem;">
                                <div class="col">
                                    <div class="form-control" style="background-color: black;">
                                        <label for="female" style="color: grey;">Female</label>
                                        <a style="margin: 5px"></a>
                                        <input type="radio" name="gender" value="Female" id="female" required="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-control" style="background-color: black;">
                                        <label for="male" style="color: grey;">Male</label>
                                        <a style="margin: 10px"></a>
                                        <input type="radio" name="gender" value="Male" id="male" required="">
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Number input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="registerEmail" name="contactnumber" class="form-control" />
                                <label class="form-label" for="registerEmail" style="color: grey;">Contact
                                    Number</label>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="registerEmail" name="email" class="form-control" />
                                <label class="form-label" for="registerEmail" style="color: grey;">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="registerPassword" name="password" class="form-control" />
                                <label class="form-label" for="registerPassword" style="color: grey;">Password</label>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" name="signup" class="btn btn-primary btn-block mb-3">Sign up</button>
                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </div>

</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

</html>