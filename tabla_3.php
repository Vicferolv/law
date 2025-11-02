<?php include 'recupera.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla</title>
    <link rel="stylesheet" href="style_2.css">
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
         recupera(inicio: 5, fin: 16);
     ?>
 </table>

 </body>
 </html>
