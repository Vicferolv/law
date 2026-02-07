<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <title>Tabla</title>
    <link rel="stylesheet" href="style.css">
        </head>
            <body>
                <table>
                <tr>
                <th></th>
                <?php
                for ($col = 50; $col <= 60; $col++) {
                echo "<th>$col</th>";
                }
                ?>
                </tr>
<?php
for ($row = 1; $row <= 10; $row++) {
echo "<tr>";
echo "<th class='header-left'>$row</th>";

$rowColorClass = ($row % 2 == 0) ? 'orange' : 'yellow';

for ($col = 50; $col <= 60; $col++) {
if ($col % $row == 0) {
echo "<td class='$rowColorClass'>*</td>";
} else {
echo "<td class='$rowColorClass'>-</td>";
}
}

echo "</tr>";
}
?>

                </table>

            </body>
</html>