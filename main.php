<!-- READ -->
<?php
session_start();
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
    header('location: login-signup.php');
}
$num = 0;
$search = '';
require "./functions/database.php";
$connection = connect();
if (!empty($_GET['search'])) {
    $search = $_GET['search'];
}
$sql = "SELECT * FROM tbl_info WHERE id < 30 AND firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR gender LIKE '$search' OR contact LIKE '%$search%' OR email LIKE '%$search%' OR password LIKE '%$search%'";
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
        <?php echo $_SESSION['firstname'] ?>
    </title>
    <style>
        th {
            color: pink;
            font-weight: 900;
            text-align: center;
            letter-spacing: 1px;
        }

        a {
            display: flex;
            justify-content: center;
        }

        td,
        h5 {
            color: pink;
        }
    </style>
</head>

<body style="background-color:black;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php echo $_SESSION['firstname'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./aboutus.php">About Us</a>
                    </li>
                </ul>
                <a class="mx-auto mr-2" href=" main.php"><button type="button" class="btn btn-dark"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                            <path
                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                        </svg><br>Refresh</button></a>
                <a class="btn btn-danger" href="./functions/logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <form style="width:30rem" class="d-flex navbar-nav mx-auto mb-2 mt-3 mb-lg-2" role="search" action="" method="get">
        <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search-submit" type="submit">Search</button>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered align-middle align-text-top ">
            <thead>
                <tr>
                    <th row">ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th colspan="2" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty(mysqli_num_rows($query))) { ?>
                    <?php while ($row = search($query, $search)) { ?>
                        <tr>
                            <th scope="row">
                                <?php echo $num = $num + 1; ?>
                            </th>
                            <td>
                                <?php echo $row['firstname'] ?>
                            </td>
                            <td>
                                <?php echo $row['lastname'] ?>
                            </td>
                            <td>
                                <?php echo $row['gender'] ?>
                            </td>
                            <td>
                                <?php echo $row['contact'] ?>
                            </td>
                            <td>
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
            <h4 style="color:pink; display: flex; justify-content:center;">Info not found!</h4>
        <?php } ?>
    </div>
    <script src="./js/bootstrapV5.3.0/bootstrap.bundle.min.js"></script>
</body>

</html>