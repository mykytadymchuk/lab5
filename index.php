<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab1</title>
</head>
<body>
    <h3>Запит №1</h3>
    <form action="process1.php" method="get">
        <label for="client_name">Вкажіть ім'я клієнта для пошуку сеансів:</label> <br>
        <select name="client_name" id="client_name">
            <?php
                include("connect.php");
                $select = "select name from client";
                try {
                    foreach($dbh->query($select) as $row) {
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                }
                catch(PDOException $ex) {
                    echo $ex->GetMessage();
                }
                $dbh = null;
            ?>
        </select>
        <input type="submit" value="OK">
    </form>

   <br><br><br>

    <h3>Запит №2</h3>
    <form action="process2.php" method="get">
        <label for="time">Вкажіть проміжок часу для пошуку сеансів</label> <br>
        <label for="startTime">Початок:</label>
        <input type="time" name="startTime" id="startTime" required> <br>
        <label for="stopTime">Кінець:</label>
        <input type="time" name="stopTime" id="stopTime" required> <br>
        <input type="submit" value="OK">
    </form>

    <br><br><br>

    <h3>Запит №3</h3>
    <form action="process3.php" method="get">
        <span>Пошук клієнтів з від'ємним балансом рахунку:</span> <br>
        <input type="submit" value="OK">
    </form>

    <br><br><br>

</body>
</html>