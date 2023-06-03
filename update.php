<?php
session_start();
if (empty($_SESSION['email']) && empty($_SESSION['email'])) {
    header('location: login-signup.php');
}
require "./functions/database.php";
$connection = connect();
$id = $_GET['get_id'];
if (empty($id)) {
    header('location: main.php');
}
$sql = "SELECT * FROM tbl_info WHERE id=$id";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />

    <title>Update User:
        <?php echo $row['firstname'] ?>
    </title>
</head>

<body style="background-color:black;">
    <div class="card"
        style="width: 18rem; position: relative; left: 40%; top: 40px; background-color:black; box-shadow: 0px 0px 2px 2px white;">
        <div class="card-body">
            <ul class="nav nav-justified mb-3">
                <li class="nav-item">
                    <a class="nav-link" id="tab-register">Update</a>
                </li>
            </ul>
            <!-- Pills content -->
            <div>
                <div class="tab-pane" id="pills-register">
                    <form action="./functions/update.php" method="post">
                        <div class="text-center mb-3" style="color: white;">
                            <!-- Firstname input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="registerName" name="fname" class="form-control"
                                    value="<?php echo $row['firstname'] ?>" />
                                <label class="form-label" for="registerName" style="color: grey;">Firstname</label>
                            </div>

                            <!-- Lastname input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="registerUsername" name="lname" class="form-control"
                                    value="<?php echo $row['lastname'] ?>" />
                                <label class="form-label" for="registerUsername" style="color: grey;">Lastname</label>
                            </div>
                            <!-- Gender Number input -->
                            <div class="row" style="margin-bottom: 1.5rem;">
                                <div class="col">
                                    <div class="form-control" style="background-color: black;">
                                        <label for="female" style="color: grey;">Female</label>
                                        <a style="margin: 5px"></a>
                                        <input type="radio" name="gender" value="Female" id="female" required="" <?php if ($row['gender'] == 'Female') {
                                            echo "checked";
                                        } ?>>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-control" style="background-color: black;">
                                        <label for="male" style="color: grey;">Male</label>
                                        <a style="margin: 10px"></a>
                                        <input type="radio" name="gender" value="Male" id="male" required="" <?php if ($row['gender'] == 'Male') {
                                            echo "checked";
                                        } ?>>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Number input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="registerEmail" name="contactnumber" class="form-control"
                                    value="<?php echo $row['contact'] ?>" />
                                <label class="form-label" for="registerEmail" style="color: grey;">Contact
                                    Number</label>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="registerEmail" value="<?php echo $row['email'] ?>" name="email"
                                    class="form-control" />
                                <label class="form-label" for="registerEmail" style="color: grey;">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="registerPassword" name="password" class="form-control"
                                    value="<?php echo $row['password'] ?>" />
                                <label class="form-label" for="registerPassword" style="color: grey;">Password</label>
                            </div>
                            <input type="hidden" name=id value="<?php echo $row['id']; ?>">
                            <!-- Submit button -->
                            <button type="submit" name="update" class="btn btn-primary btn-block mb-3">Update</button>
                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </div>

</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

</html>