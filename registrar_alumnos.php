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

// Si se envía el formulario, registrar al alumno
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['uid']) && isset($_POST['pin'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $uid = $_POST['uid'];
    $pin = $_POST['pin'];

    // Validar que el UID no esté ya registrado
    $sql_check_uid = "SELECT * FROM alumnos WHERE uid='$uid'";
    $result_uid = $conn->query($sql_check_uid);
    if ($result_uid->num_rows > 0) {
        echo "El UID ya está registrado.<br>";
    } else {
        // Validar que el PIN no esté ya registrado y que no tenga más de 4 dígitos
        $sql_check_pin = "SELECT * FROM alumnos WHERE pin='$pin'";
        $result_pin = $conn->query($sql_check_pin);
        if ($result_pin->num_rows > 0) {
            echo "El PIN ya está registrado.<br>";
        } elseif (strlen($pin) > 4) {
            echo "El PIN no puede tener más de 4 dígitos.<br>";
        } else {
            $sql = "INSERT INTO alumnos (nombre, apellido, uid, pin) VALUES ('$nombre', '$apellido', '$uid', '$pin')";
            if ($conn->query($sql) === TRUE) {
                echo "Alumno registrado con éxito.<br>";
            } else {
                echo "Error al registrar al alumno: " . $sql . "<br>" . $conn->error . "<br>";
            }
        }
    }
}

// Obtener todos los UIDs disponibles
$sql = "SELECT uid FROM registros";
$result = $conn->query($sql);
$uids = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $uids[] = $row["uid"];
    }
}


?>

<?php include('nav.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Alumno</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Registrar Alumno
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        
<div class="form-group">
    <label for="pin">PIN:</label>
    <input type="number" class="form-control" id="pin" name="pin" required minlength="4" maxlength="4" pattern="\d{4}">
</div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="uid">UID:</label>
                            <select class="form-control" id="uid" name="uid">
                                <?php foreach($uids as $uid): ?>
                                    <option value="<?php echo $uid; ?>"><?php echo $uid; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluir Bootstrap JS y Popper.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>