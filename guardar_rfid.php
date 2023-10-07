<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rfid_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Si se recibe un UID, insertarlo en la base de datos
if(isset($_POST['uid'])) {
    $uid = $_POST['uid'];

    $sql = "INSERT INTO registros (uid) VALUES ('$uid')";

    if ($conn->query($sql) === TRUE) {
        echo "UID recibido y almacenado: " . $uid . "<br>";
    } else {
        echo "Error al almacenar el UID: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

// Consultar y mostrar todos los UIDs almacenados
$sql = "SELECT uid, fecha FROM registros ORDER BY fecha DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>UIDs almacenados:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "UID: " . $row["uid"] . " - Fecha: " . $row["fecha"] . "<br>";
    }
} else {
    echo "No hay UIDs almacenados.";
}

$conn->close();

?>
