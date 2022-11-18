<?php

namespace App\Controller;

require 'ConexionController.php';
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExcelController
{
    #[Route('/descarga', name: 'app_descarga')]
    public function index(): Response
    {
        return $this->render('inicio/index.html.twig', [
            'controller_name' => 'ExcelController',
        ]);
    }
}
$query=mysqli_query($con, "SELECT * FROM alerta");
$docu="Amenazas.xls";
header('Content-type: aplication/vnd.ms-excel');
header('Content-Disposition: attachmen; filename='.$docu);
header(Pragma: no-cache);
header('Expires: 0');

echo '<table border=1>';
echo '<tr>';
echo '<th colspan=14> Reporte de amenazas </th>';
echo '</tr>';
echo '<tr>
<th>id</th>
<th>niveldegravedad_id</th>
<th>superficie_afectada_id</th>
<th>tiempo_desarrollo_id</th>
<th>nombre_tipo_de_amenaza_id</th>
<th>ubicacion</th>
<th>foto</th>
<th>descripcion</th>
<th>combre_contacto</th>
<th>email_contacto</th>
<th>telefono_contacto</th>
<th>espacio_protegido</th>
<th>plan_de_gestion</th>
<th>actividades_de_conservacion</th>
<th>organizaciones</th>
<th>observaciones</th>
<th>iba</th>
</tr>';

while ($row=mysqli_fetch_array($query)){
    echo "<tr";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["niveldegravedad_id"]."</td>";
    echo "<td>".$row["superficie_afectada_id"]."</td>";
    echo "<td>".$row["tiempo_desarrollo_id"]."</td>";
    echo "<td>".$row["nombre_tipo_de_amenaza_id"]."</td>";
    echo "<td>".$row["ubicacion"]."</td>";
    echo "<td>".$row["foto"]."</td>";
    echo "<td>".$row["descripcion"]."</td>";
    echo "<td>".$row["combre_contacto"]."</td>";
    echo "<td>".$row["email_contacto"]."</td>";
    echo "<td>".$row["telefono_contacto"]."</td>";
    echo "<td>".$row["espacio_protegido"]."</td>";
    echo "<td>".$row["plan_de_gestion"]."</td>";
    echo "<td>".$row["actividades_de_conservacion"]."</td>";
    echo "<td>".$row["organizaciones"]."</td>";
    echo "<td>".$row["observaciones"]."</td>";
    echo "<td>".$row["iba"]."</td>";
    echo "</tr>";
}

echo "</table>";


