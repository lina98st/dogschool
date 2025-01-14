<?php

// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = ""; // Standard-Passwort bei XAMPP ist leer
$dbname = "hundeschule"; //database Name

// Verbindung aufbauen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung prüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Prüfen, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten sicher holen
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $kurs = $_POST['kurs'];
    $message = $_POST['message'];

    // SQL-Befehl vorbereiten (Prepared Statement)
    $stmt = $conn->prepare("INSERT INTO kontakt (name, email, phone, kurs, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $kurs, $message);

    // Ausführen und prüfen
    if ($stmt->execute()) {
        echo "Vielen Dank! Ihre Anfrage wurde erfolgreich gespeichert.";
    } else {
        echo "Fehler: " . $stmt->error;
    }

    // Statement schließen
    $stmt->close();
}

// Verbindung schließen
$conn->close();
?>
