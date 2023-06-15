<?php
session_start();
if (!empty($_SESSION['username']) && !empty($_SESSION['username'])) {
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
    <style>
        body {
            background-image: url('./img/loginhacker.gif');
            text-transform: capitalize;
        }

        .card {
            background-color: black;
        }
    </style>
</head>
<?php if (isset($_GET['err'])) { ?>
    <script>alert("<?php echo $_GET['err'] ?>")</script>
<?php } ?>

<body style="background-color:black;">
    <div class="card" style="width:30%; left: 35%; top: 15px; box-shadow: 0px 0px 2px 2px white;">
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
                        <!-- create username input -->
                        <div class="form-outline mb-4">
                            <input style="color: white;" type="text" id="loginUsername" name="input-username"
                                class="form-control" />
                            <label style="color: white;" class="form-label" for="loginUsername">Username</label>
                        </div>

                        <!-- create password input -->
                        <div class="form-outline mb-4">
                            <input style="color: white;" type="password" id="loginPassword" name="input-password"
                                class="form-control" />
                            <label style="color: white;" class="form-label" for="loginPassword">Password</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Login</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form action="./functions/create.php" method="post">
                        <div class="text-center mb-3" style="color: white;">
                            <p>Sign up</p>
                            <!-- firstname input -->
                            <div class="form-outline mb-4">
                                <input style="color: white;" type="text" id="registerFirstname" name="firstname"
                                    class="form-control" />
                                <label style="color: white;" class="form-label"
                                    for="registerFirstname">Firstname</label>
                            </div>
                            <!-- lastname input -->
                            <div class="form-outline mb-4">
                                <input style="color: white;" type="text" id="registerLastname" name="lastname"
                                    class="form-control" />
                                <label style="color: white;" class="form-label" for="registerLastname">Lastname</label>
                            </div>
                            <!-- username input -->
                            <div class="form-outline mb-4">
                                <input style="color: white;" type="text" id="registerUsername" name="username"
                                    class="form-control" />
                                <label style="color: white;" class="form-label" for="registerUsername">Username</label>
                            </div>
                            <!-- password input -->
                            <div class="form-outline mb-4">
                                <input style="color: white;" type="password" id="registerPassword" name="password"
                                    class="form-control" />
                                <label style="color: white;" class="form-label" for="registerPassword">Password</label>
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
<script>
    const regex = new RegExp("[-0-9]");
    const contact = document.getElementById('registerContact');
    contact.addEventListener("beforeinput", (event) => {
        console.log(contact.value);
        if (event.data != null && !regex.test(event.data)) {
            event.preventDefault();
        }
    });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

</html>