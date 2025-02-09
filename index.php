<?php
// Configuración de la base de datos
$host = "127.0.0.1"; // Servidor de MySQL
$dbname = "sinergia_12"; // Nombre de la base de datos
$username = "root"; // Usuario de MySQL
$password = ""; // sin contraseña

// Conectar a MySQL
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h2>✅ Conexión exitosa a la base de datos: $dbname</h2>";

    // Consulta de prueba para obtener pacientes
    $stmt = $conn->query("SELECT p.id, p.nombre1, p.apellido1, d.nombre AS departamento, m.nombre AS municipio 
                          FROM pacientes p
                          JOIN departamentos d ON p.departamento_id = d.id
                          JOIN municipios m ON p.municipio_id = m.id
                          LIMIT 5");

    echo "<h3>Lista de Pacientes:</h3>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Departamento</th>
                <th>Municipio</th>
            </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre1']}</td>
                <td>{$row['apellido1']}</td>
                <td>{$row['departamento']}</td>
                <td>{$row['municipio']}</td>
              </tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "<h2>❌ Error de conexión: " . $e->getMessage() . "</h2>";
}
?>
