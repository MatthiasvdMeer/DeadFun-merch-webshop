<?php
// gemaakt door: Erkin Yilmaz

// Database connectie
function ConnectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "deadfun merch";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    return $conn;
}

// Haal alle data op uit een tabel
function GetData($table) {
    $conn = ConnectDB();
    $sql = "SELECT * FROM $table";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;

    return $data;
}

// Haal een specifieke klant op met een gegeven id
function GetKlantById($id) {
    $conn = ConnectDB();
    $sql = "SELECT * FROM klant WHERE klantID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch();
    $conn = null;

    return $data;
}

// Print de CRUD tabel voor klanten
function PrintCrudKlanten($result) {
    if (empty($result)) {
        echo "<p>Geen data gevonden.</p>";
        return;
    }

    $table = "<table border='1'>";
    $table .= "<tr>";
    foreach (array_keys($result[0]) as $columnName) {
        $table .= "<th>" . htmlspecialchars($columnName) . "</th>";
    }
    $table .= "<th>Wijzigen</th><th>Verwijderen</th>";
    $table .= "</tr>";

    foreach ($result as $row) {
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>" . htmlspecialchars($cell) . "</td>";
        }
        $table .= "<td><form action='Update-Klanten.php' method='get'>
        <input type='hidden' name='id' value='" . $row['klantID'] . "'>
        <button type='submit'>Wijzigen</button>
        </form></td>";
        $table .= "<td><form action='Delete-Klanten.php' method='get' onsubmit=\"return confirm('Weet je zeker dat je deze klant wilt verwijderen?');\">
        <input type='hidden' name='id' value='" . $row['klantID'] . "'>
        <button type='submit'>Verwijderen</button>
        </form></td>";
        $table .= "</tr>";
    }

    $table .= "</table>";
    echo $table;
}

// Toon de CRUD pagina voor klanten
function CrudKlanten() {
    echo "<h1>CRUD: Klanten</h1>";
    echo "<nav><a href='Insert-Klanten.php'>Klant toevoegen</a></nav>";

    $result = GetData("klant");
    PrintCrudKlanten($result);
}

// Voeg een nieuwe klant toe aan de database
function InsertKlant($post) {
    $conn = ConnectDB();
    $sql = "INSERT INTO klant (voornaam, achternaam) VALUES (:voornaam, :achternaam)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':voornaam', $post['voornaam'], PDO::PARAM_STR);
    $stmt->bindParam(':achternaam', $post['achternaam'], PDO::PARAM_STR);
    $stmt->execute();
    $conn = null;
}

// Verwijder een klant uit de database met een gegeven id
function DeleteKlant($id) {
    $conn = ConnectDB();
    $sql = "DELETE FROM klant WHERE klantID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $conn = null;
}

// Werk een bestaande klant bij in de database
function UpdateKlant($post) {
    $conn = ConnectDB();
    $sql = "UPDATE klant SET voornaam = :voornaam, achternaam = :achternaam WHERE klantID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $post['id'], PDO::PARAM_INT);
    $stmt->bindParam(':voornaam', $post['voornaam'], PDO::PARAM_STR);
    $stmt->bindParam(':achternaam', $post['achternaam'], PDO::PARAM_STR);
    $stmt->execute();
    $conn = null;
}

?>