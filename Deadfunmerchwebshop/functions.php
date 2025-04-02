<?php

function Crudbestellingen() {
    echo "
    <h1>Crud bestellingen</h1>
    <nav>
        <a href='insert_bestellingen.php'>Insert NEW Order</a>
    </nav>";

    $result = getdata("bestellingen");
    

    // Print the results in a table
    PrintCrudbestellingen($result);
}

function getdata($table) {
    // Connect to database
    $conn = ConnectDb();

    // Prepare and execute query
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function ConnectDb() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "deadfun merch";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
}

function PrintCrudbestellingen($result) {
    if (empty($result)) {
        echo "<p>Geen data gevonden.</p>";
        return;
    }

    $table =  "<table border='1px'>";

    // Print header table
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=darkcyan>" . $header . "</th>"; 
    }
    $table .= "</tr>";

    // Loop door de rijen heen
    foreach ($result as $row) {
        $table .= "<tr>";

        // Loop door de cellen van de rij heen
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }

        // Extra kolommen toevoegen
        // een form om bestellingen te wijzigen
        $table .= "<td>
            <a href='update_bestellingen.php?bestellingID={$row['bestellingID']}'>Change</a>
        </td>";

        $table .= "<td>
            <a href='delete_bestellingen.php?bestellingID={$row['bestellingID']}'>Delete</a>
        </td>";

        $table .= "</tr>";
    }

    // Sluit de tabel na de loop
    $table .= "</table>";
    echo $table;
}

function Insertbestellingen($post) {

    
    try {
        $conn = ConnectDb();

        $query = $conn->prepare(
        "INSERT INTO bestellingen (bestellingID, klantID, prodID, datum, aantal, prijs) 
        VALUES (:bestellingID, :klantID, :prodID, :datum, :aantal, :prijs)");

    

        $status = $query->execute(
            [
            
            'bestellingID' => $post['bestellingID'],
            'klantID' => $post['klantID'],
            'prodID' => $post['prodID'],
            'datum' => $post['datum'],
            'aantal' => $post['aantal'],
            'prijs' => $post['prijs']
            ]);


            echo "insert status: " . $status;
            echo $query->rowCount() . " records inserted";  
    }
    catch(PDOException $e) {
        echo "insert failed: " . $e->getMessage();
    }
}

function Deletebestellingen($bestellingID) {
    try {
        $conn = ConnectDb();
        
        $query = $conn->prepare("DELETE FROM bestellingen WHERE bestellingID = :bestellingID");
        $query->bindParam(':bestellingID', $bestellingID, PDO::PARAM_INT);
        
        if ($query->execute()) {
            return true; // Deletion successful
        } else {
            return false; // Deletion failed
        }
    } catch (PDOException $e) {
        echo "Deletion failed: " . $e->getMessage();
        return false;
    }
}

function Updatebestellingen($data) {
    $conn = ConnectDb();
    
    $sql = "UPDATE bestellingen 
            SET klantID = :klantID, 
                prodID = :prodID, 
                datum = :datum, 
                aantal = :aantal, 
                prijs = :prijs 
            WHERE bestellingID = :bestellingID";

    $stmt = $conn->prepare($sql);

    $status = $stmt->execute([
        'klantID' => $data['klantID'],
        'prodID' => $data['prodID'],
        'datum' => $data['datum'],
        'aantal' => $data['aantal'],
        'prijs' => $data['prijs'],
        'bestellingID' => $data['bestellingID']
    ]);

    return $stmt->rowCount() > 0; // Returns true if rows were updated, false if nothing changed
}

function Getbestellingen($bestellingID) {
    $conn = ConnectDb();
    $sql = "SELECT * FROM bestellingen WHERE bestellingID = :bestellingID";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['bestellingID' => $bestellingID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

?>
<style>
    a {
        text-decoration: none;
        font-weight: bold;
        background-color: darkcyan;
        color: white;
        border-style: solid;
        border-width: 2px;
        border-color: black;
        padding-left: 5px;
        padding-right: 5px;
        }

</style>