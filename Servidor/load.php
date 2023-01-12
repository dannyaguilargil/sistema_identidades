<?php


include 'conexion.php';

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['nombre', 'cedula', 'cargo', 'fechafinalcontrato', 'supervisor', 'email', 'rol'];

/* Nombre de la tabla */
$table = "usuarios_registrados";



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
        $html .= '<td>' . $row['nombre'] . '</td>';
        $html .= '<td>' . $row['cedula'] . '</td>';
        $html .= '<td>' . $row['cargo'] . '</td>';
        $html .= '<td>' . $row['fechafinalcontrato'] . '</td>';
        $html .= '<td>' . $row['supervisor'] . '</td>';
        $html .= '<td>' . $row['email'] . '</td>';
        $html .= '<td>' . $row['rol'] . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
