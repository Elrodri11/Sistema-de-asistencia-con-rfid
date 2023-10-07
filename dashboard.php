<?php
// Connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rfid_db";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch alumnos
    $stmtAlumnos = $conn->prepare("SELECT id, nombre, apellido, uid FROM alumnos"); 
    $stmtAlumnos->execute();
    $alumnos = $stmtAlumnos->fetchAll();

    // Fetch profesores
    $stmtProfesores = $conn->prepare("SELECT id, nombre, apellido, uid FROM profesores"); 
    $stmtProfesores->execute();
    $profesores = $stmtProfesores->fetchAll();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

<?php include('nav.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <h1>Dashboard</h1>

    <h2>Alumnos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>UID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($alumnos as $alumno): ?>
            <tr>
                <td><?php echo $alumno['id']; ?></td>
                <td><?php echo $alumno['nombre']; ?></td>
                <td><?php echo $alumno['apellido']; ?></td>
                <td><?php echo $alumno['uid']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Profesores</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>UID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($profesores as $profesor): ?>
            <tr>
                <td><?php echo $profesor['id']; ?></td>
                <td><?php echo $profesor['nombre']; ?></td>
                <td><?php echo $profesor['apellido']; ?></td>
                <td><?php echo $profesor['uid']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
