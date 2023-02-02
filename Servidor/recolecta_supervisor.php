<?php


include 'conexion.php';

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id', 'nombre', 'primerapellido', 'segundoapellido', 'cedula', 'ubicacion_laboral', 'tiposolicitud'];

/* Nombre de la tabla */
$table = "solicitud_sistema";



///AQUI HICE CORRECION DEL CONN
$campo = isset($_POST['campo']) ? $mysqli->real_escape_string($_POST['campo']) : null;


/* Filtrado */
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


/* Consulta */
$sql = "SELECT " . implode(", ", $columns) . "
FROM $table
$where ";
//AQUI HICE CORRECION DEL CONN
$resultado = $mysqli->query($sql);
$num_rows = $resultado->num_rows;


/* Mostrado resultados */
$html = '';


if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) { // fecth_assoc es con indice de nombres y fetch_Arrow con numericos 
        
        $html .= '<tr>';
        $html .= '<td>' . '<button type="submit" class="fas fa-eye modals btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo"></button> ' . '</td>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $row['nombre'] . '</td>';
        $html .= '<td>' . $row['primerapellido'] . '</td>';
        $html .= '<td>' . $row['segundoapellido'] . '</td>';
        $html .= '<td>' . $row['cedula'] . '</td>';
        $html .= '<td>' . $row['ubicacion_laboral'] . '</td>';
        $html .= '<td>' . $row['tiposolicitud'] . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
}

//print_r($html);
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>

