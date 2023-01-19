<?php


include 'conexion2.php';

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['nombre', 'cedula', 'rfid', 'equipos', 'revocar_permisos'];

/* Nombre de la tabla */
$table = "pazysalvo_aprobar";

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


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
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;


/* Mostrado resultados */
$html = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) { // fecth_assoc es con indice de nombres y fetch_Arrow con numericos 
        
        $html .= '<tr>';
        $html .= '<td>' . $row['nombre'] . '</td>';
        $html .= '<td>' . $row['cedula'] . '</td>';
        $html .= '<td>' . $row['rfid'] . '</td>';
        $html .= '<td>' . $row['equipos'] . '</td>';
        $html .= '<td>' . $row['revocar_permisos'] . '</td>';
        //AQUI POR ULTIMO DEBE PERMITIR VER EL PDF QUE SE GENERO DE CASA USUARIO
        $html .= '<td>' . $row['revocar_permisos'] . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
