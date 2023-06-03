<?php
session_start();
if (empty($_SESSION['email']) && empty($_SESSION['email'])) {
    header('location: login-signup.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrapV5.3.0/bootstrap.min.css">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color: #474e5d;
            color: white;
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar bg-body-tertiary sticky-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="main.php">Home</a>
                </li>
            </ul>
            <a class="btn btn-danger" href="./functions/logout.php">Logout</a>
        </div>
    </nav>
    <div class="about-section">
        <h1>About Us</h1>
        <!-- <p>Some text about who we are and what we do.</p>
            <p>Resize the browser window to see that this page is responsive by the way.</p> -->
    </div>

    <h2 style="text-align:center">Our Team</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <img src="./img/jaymar.jpg" alt="Jaymar" style="width:100%">
                <div class="container">
                    <h2>Jaymar Salas</h2>
                    <p class="title">Front-End Developer</p>
                    <p>Jaymar is a highly skilled front-end developer known for his exceptional expertise and dedication
                        to creating engaging and user-friendly web interfaces. He possesses a strong understanding of
                        HTML, CSS, and JavaScript, which are the fundamental building blocks of front-end development.
                    </p>
                    <p>jaymar.salas@csucc.edu.ph</p>
                    <p><a href="https://www.facebook.com/jaymar.salas.52"><button class="button">Contact</button></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="./img/tian.jpg" alt="Christian" style="width:100%">
                <div class="container">
                    <h2>Christian Kyle Autor</h2>
                    <p class="title">Backend Developer</p>
                    <p>
                        Christian Kyle is a highly skilled backend developer renowned for his expertise in building
                        robust and efficient web applications. He possesses a deep understanding of server-side
                        programming languages, databases, and frameworks, allowing him to create scalable and reliable
                        backend systems.</p>
                    <p>christiankyle.autor@csucc.edu.ph</p>
                    <p>
                        <a href="https://www.facebook.com/riskyle14">
                            <button class="button">Contact</button></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="./img/lenard.jpg" alt="Lenard" style="width:100%">
                <div class="container">
                    <h2>Lenard Losdoce</h2>
                    <p class="title">Database Engineer</p>
                    <p>Lenard is a highly skilled database engineer with a deep understanding of data management and
                        optimization. He possesses a strong expertise in designing, developing, and maintaining robust
                        database systems that efficiently handle large volumes of data.
                        <br>
                    </p>
                    <p>lenard.losdoce@csucc.edu.ph</p>
                    <p><a href="https://www.facebook.com/lenard.losdoceii"><button class="button">Contact</button></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/bootstrapV5.3.0/bootstrap.bundle.min.js"></script>
</body>

</html>