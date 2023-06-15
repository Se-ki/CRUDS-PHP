<!-- READ -->
<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    header('location: login-signup.php');
}
$i = 0;
$search = '';
require "./functions/database.php";
$connection = connect();
if (!empty($_GET['search'])) {
    $search = $_GET['search'];
}
$column = 'id';
$sort = 'DESC';
if (isset($_GET['column']) && isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $column = $_GET['column'];
    if ($sort == 'ASC') {
        $sort = 'DESC';
    } else {
        $sort = 'ASC';
    }
}
$sql = "SELECT * FROM tbl_info WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR gender LIKE '$search' OR contact LIKE '%$search%' OR email LIKE '%$search%' ORDER BY $column $sort";
$query = mysqli_query($connection, $sql);

if (isset($_GET['success'])) {
    echo "<script>alert('Updated!')</script>";
}

if (isset($_GET['delete'])) {
    echo "<script>alert('Deleted!')</script>";
}
function search($query, $search)
{
    if (isset($_GET['search-submit'])) {
        return is_empty($query, $search);
    }
    return mysqli_fetch_assoc($query);
}
function is_empty($query, $search)
{
    if (!empty($search)) {
        return mysqli_fetch_assoc($query);
    } else if (empty($search)) { ?>
            <script>alert('Search bar is empty!')</script>
        <?php return false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrapV5.3.0/bootstrap.min.css">
    <title>User |
        <?php echo $_SESSION['username'] ?>
    </title>
    <style>
        body {
            background-image: url('./img/hackermode.gif');
            background-size: cover;
        }

        th td {
            background-color: black;
        }

        th {
            color: black;
            font-weight: 900;
            text-align: center;
            text-transform: uppercase;
        }

        a {
            display: flex;
            justify-content: center;
        }

        td,
        h5 {
            color: white;
        }

        .th-row {
            background-color: black;
        }

        .navbar {
            background-color: transparent;
        }

        .nav-item:hover {
            text-decoration: underline;
            text-decoration-color: aliceblue;
        }

        .refresh:hover {
            color: black;
            border-radius: 5px;
            background-color: aquamarine;
        }

        .refresh {
            color: white;
            border-radius: 5px;
        }

        #search {
            background-color: transparent;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn {
            border-radius: 20px;
            border-color: white;
        }

        .btn:hover {
            border-radius: 20px;
            border-color: white;
        }

        .capz,
        .session-name {
            text-transform: capitalize;
        }

        .vis {
            background-color: black;
            color: white;
        }

        .table-header {
            text-decoration: none;
            color: white;
        }

        .table-header:hover {
            text-decoration: underline;
            color: pink;
        }

        .num {
            text-align: center;
        }

        #scroll {
            overflow-y: scroll;
            height: 415px;
        }

        .add-btn {
            width: 100px;
            border-radius: 5px;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong"">
        <div class=" container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-lg-0">
                <a class="navbar-brand" href="#">
                    Hi,
                    <p class="session-name ms-2">
                        <?php echo $_SESSION['firstname'] ?>
                    </p>
                </a>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./aboutus.php">About Us</a>
                </li>
            </ul>
            <a style="text-decoration: none;" class="refresh mx-auto mr-2" href="main.php">
                <button class="refresh" style="border:0px; color: black;" type="button" class="btn btn-dark">
                    Refresh
                </button>
            </a>
            <a class="btn btn-danger" href="./functions/logout.php">Logout</a>

        </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./functions/add.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="firstname" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Firstname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="lastname" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Lastname</label>
                        </div>
                        <div class="row form-floating mb-3"">
                        <div class=" col">
                            <div class="form-control">
                                <label for="female">Female</label>
                                <input type="radio" name="gender" value="Female" id="female" required="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-control">
                                <label for="male">Male</label>
                                <input type="radio" name="gender" value="Male" id="male" required="">
                            </div>
                        </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="contact" class="form-control" id="floatingInput"
                        placeholder="name@example.com" maxlength="11">
                    <label for="floatingInput">Contact Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="save" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- end modal -->
    <form class=" navbar-nav mx-auto mt-3 mb-lg-2" role="search" action="" method="get">
        <div class="d-flex justify-content-center">
            <div class="input-group mb-3 w-25">
                <input class="form-control w-25" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary w-20" id="button-addon2" class="btn btn-secondary" name="search-submit"
                    type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
    <!-- Button trigger modal -->
    <a class="add-btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add
    </a>
    <div class="table-responsive" id="scroll">
        <table class="table table-bordered align-middle align-text-top">
            <thead>
                <tr class="th-row">
                    <th scope="col"><a class="table-header" href="?column=id&sort=<?php echo $sort ?>">#</a></th>
                    <th scope="col"><a class="table-header"
                            href="?column=firstname&sort=<?php echo $sort ?>">Firstname</a></th>
                    <th scope="col"><a class="table-header"
                            href="?column=lastname&sort=<?php echo $sort ?>">Lastname</a></th>
                    <th scope="col"><a class="table-header" href="?column=gender&sort=<?php echo $sort ?>">Gender</a>
                    </th>
                    <th scope="col"><a class="table-header" href="?column=contact&sort=<?php echo $sort ?>">Contact
                            Number</a></th>
                    <th scope="col"><a class="table-header" href="?column=email&sort=<?php echo $sort ?>">Email</a></th>
                    <th colspan="2" scope="col" class="table-header">Action</th>
                </tr>
            </thead>
            <tbody class="vis">
                <?php if (!empty(mysqli_num_rows($query))) { ?>
                    <?php while ($row = search($query, $search)) { ?>
                        <tr>
                            <td scope="row" class="num">
                                <?php echo $i = $i + 1; ?>
                            </td>
                            <td class="capz">
                                <?php echo $row['firstname'] ?>
                            </td>
                            <td class="capz">
                                <?php echo $row['lastname'] ?>
                            </td>
                            <td class="capz">
                                <?php echo $row['gender'] ?>
                            </td>
                            <td class="capz">
                                <?php echo $row['contact'] ?>
                            </td>
                            <td class="email">
                                <?php echo $row['email'] ?>
                            </td>
                            <td>
                                <a href="update.php?get_id=<?php echo $row['id'] ?>">
                                    <button type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure! want to delete?')"
                                    href="./functions/delete.php?get_id=<?php echo $row['id'] ?>">
                                    <button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                </tbody>
            </table>
            <h4 style="color:seashell; display: flex; justify-content:center;">Info not found!</h4>
        <?php } ?>
    </div>
    <script src="./js/bootstrapV5.3.0/bootstrap.bundle.min.js"></script>
</body>

</html>