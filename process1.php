<?php
    include("connect.php");
    $client_name = $_GET["client_name"];
    // print($_GET["client_name"]);

    try {
        $sqlSelect = "select id_seanse, client.name, start, stop,
        in_traffic, out_traffic from seanse inner join client on
        seanse.fid_client = client.id_client where client.name = :client_name";

        $stmt = $dbh->prepare($sqlSelect);
        $stmt->bindValue(":client_name", $client_name);
        $stmt->execute();
        $res = $stmt->fetchAll();

        echo "<table border='1'>";
        echo "<thead><tr><th>id_sense</th><th>client_name</th>
        <th>start</th><th>stop</th><th>in_traffic</th><th>out_traffic</th></tr></thead>";
        foreach($res as $row) {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
            <td>$row[4]</td><td>$row[5]</td></tr>";
        }
        echo "</table>";
    }

    catch(PDOException $ex) {   // Обробка виключень
        echo $ex->GetMessage();     // Виведення повідомлення про помилку
    }

    $dbh = null;
?>