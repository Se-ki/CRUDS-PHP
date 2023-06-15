<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
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
    <style>
        body {
            background-image: url('./img/ricardo.gif');
            background-repeat: repeat;
        }

        .card {
            background-color: transparent;
        }

        .cancel:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="card"
        style="width: 18rem; position: relative; left: 40%; top: 40px; box-shadow: 0px 0px 2px 2px white;">
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
                            <!-- ID -->
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <!-- Firstname input -->
                            <div class="form-outline mb-4">
                                <input style="color: white;" type="text" id="registerFirstname" name="fname"
                                    class="form-control" value="<?php echo $row['firstname'] ?>" />
                                <label class="form-label" for="registerFirstname"
                                    style="color: white;">Firstname</label>
                            </div>

                            <!-- Lastname input -->
                            <div class="form-outline mb-4">
                                <input style="color: white;" type="text" id="registerLastname" name="lname"
                                    class="form-control" value="<?php echo $row['lastname'] ?>" />
                                <label class="form-label" for="registerLastname" style="color: white;">Lastname</label>
                            </div>
                            <!-- Gender Number input-->
                            <div class="row" style="margin-bottom: 1.5rem;">
                                <div class="col">
                                    <div class="form-control" style="background-color: black;">
                                        <label for="female" style="color: white;">Female</label>
                                        <a style="margin: 5px"></a>
                                        <input style="color: white;" type="radio" name="gender" value="Female"
                                            id="female" required="" <?php if ($row['gender'] == 'Female') {
                                                echo "checked";
                                            } ?>>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-control" style="background-color: black;">
                                        <label for="male" style="color: white;">Male</label>
                                        <a style="margin: 10px"></a>
                                        <input style="color: white;" type="radio" name="gender" value="Male" id="male"
                                            required="" <?php if ($row['gender'] == 'Male') {
                                                echo "checked";
                                            } ?>>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Number input style="color: white;" -->
                            <div class="form-outline mb-4">
                                <input style="color: white;" type="text" id="registerContact" name="contactnumber"
                                    class="form-control" value="<?php echo $row['contact'] ?>" maxlength="11" />
                                <label class="form-label" for="registerContact" style="color: white;">Contact
                                    Number</label>
                            </div>
                            <!-- Email input style="color: white;" -->
                            <div class="form-outline mb-4">
                                <input style="color: white;" type="email" id="registerEmail"
                                    value="<?php echo $row['email'] ?>" name="email" class="form-control" />
                                <label class="form-label" for="registerEmail" style="color: white;">Email</label>
                            </div>
                            <!-- Submit button -->

                            <button type="submit" name="update"
                                class="btn btn-primary btn-block m-auto mb-3 s-5">Update</button>
                            <a class="cancel" href="./main.php">
                                Cancel
                            </a>

                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </div>

</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
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

</html>