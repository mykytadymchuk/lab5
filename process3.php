<?php
    include("connect.php");

    try {
        $sqlSelect = "select * from client where balance < ?";

        $stmt = $dbh->prepare($sqlSelect);
        $stmt->bindValue(1, 0);
        $stmt->execute();
        $res = $stmt->fetchAll();

        echo "<table border='1'>";
        echo "<thead><tr><th>id_client</th><th>client_name</th>
        <th>login</th><th>password</th><th>ip</th><th>balance</th></tr></thead>";
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