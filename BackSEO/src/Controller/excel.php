<?php

require 'conexion.php';
$query=mysqli_query($con, "SELECT * FROM ".");
$docu="nombredearchivo.xls";
header('Content-type: aplication/vnd.ms-excel')
header('Content-Disposition: attachmen; filename='.$docu);
header(Pragma: no-cache);
header('Expires: 0');

echo '<table border=1>';
echo '<tr>';
echo '<th colspan=numero de columnas> Título de documento (ejem: datos de amenazas)</th>';
echo '</tr>';
echo '<tr>
<th>nombres de las columnas</th>
<th></th>
<th></th>
</tr>;

while ($row=mysqli_fetch_array($query)){
echo '<tr>';
echo'<td>.$row[nombre de fila].</td>;
echo'<td>.$row[mismos que en columnas].</td>;
echo '</tr>';
}

echo</table>;
