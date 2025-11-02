<?php
function recupera($inicio, $fin): void {
    for ($row = $inicio; $row <= $fin; $row++) {
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
 }
?>
