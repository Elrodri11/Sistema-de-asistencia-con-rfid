<!-- nav.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Simple navigation bar styling */
        .navbar {
            background-color: #0180C8;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #0583CB;
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">Dashboard</a>
        <a href="registrar_alumnos.php">Registo alumnos</a>
        <a href="registrar_profesores.php">Registo profesores</a>
        <!-- Add more links as needed -->
    </div>
</body>
</html>
