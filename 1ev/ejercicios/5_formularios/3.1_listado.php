<?php
    $data = file_get_contents(
        "temazos.csv"
    );

    $lines = explode("\n", $data);
    print_r($lines);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Temazo</th>
                <th>Hora</th>
                <th>Minuto</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($lines as $line) {
                    $fields = explode($line, ";");
                    echo "<tr>";
                    echo "<td>$fields[0]</td>";
                    echo "<td>$fields[1]</td>";
                    echo "<td>$fields[2]</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>