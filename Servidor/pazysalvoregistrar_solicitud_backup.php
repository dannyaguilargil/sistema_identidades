<?php

include 'conexion.php';


// DEBO CARGAR LOS DATOS PREVIOS DEL USUARIO Y POSTERIOR A ESO HACER EL REGISTRO DEL SISTEMA
$nombre = '';
$segundonombre = '';
$primerapellido = '';
$segundoapellido = '';
$cedula = 0;
$revocar_permisos = '';
$aplicativo2 = '';


//AQUI VA LA MAGIA DE COMO REALIZAR UNA INSERCCIONES DEPENDIENDO DEL CICLO RECORRIDO POR INPUTS
$j=1; //para saber si toma valor de j
$k=2;
$l=3;
$m=4;

//$aplicativo = '';

if (isset($_POST['solicitar'])){
$nombre = $_POST["nombre"];
$segundonombre = $_POST["segundonombre"];
$primerapellido = $_POST["primerapellido"];
$segundoapellido= $_POST["segundoapellido"];
$cedula = $_POST["cedula"]; 
$revocar_permisos = $_POST["revocar_permisos"]; 


$aplicativo1 = $_POST["aplicativo$j"]; 
$aplicativo2 = $_POST["aplicativo$k"]; 
$aplicativo3 = $_POST["aplicativo$l"];
$aplicativo4 = $_POST["aplicativo$m"];
$tiposolicitud1 = $_POST["tiposolicitud$j"];
$tiposolicitud2 = $_POST["tiposolicitud$k"];
$tiposolicitud3 = $_POST["tiposolicitud$l"];
$perfil1 = $_POST["perfil$j"]; 

//SE HARAN CAMBIOS EN EL REGISTRO DE LA SOLICITUD 04/03/2023
$sql="INSERT INTO pazysalvo_solicitud (nombre,segundonombre,primerapellido,segundoapellido,cedula,revocar_permisos,aplicativo1,aplicativo2,aplicativo3,aplicativo4,tiposolicitud1,tiposolicitud2,tiposolicitud3,perfil1) VALUES('$nombre','$segundonombre','$primerapellido','$segundoapellido',$cedula,'$revocar_permisos','$aplicativo1','$aplicativo2','$aplicativo3','$aplicativo4','$tiposolicitud1','$tiposolicitud2','$tiposolicitud3','$perfil1')";
$resultado=$mysqli ->query($sql);


//SE HARAN CAMBIOS EN EL REGISTRO DEL PAZ Y SALVO APROBADOS 02/03/2023
$sql2="INSERT INTO pazysalvo_aprobar(nombre,segundonombre,primerapellido,segundoapellido,cedula,revocar_permisos) VALUES ('$nombre','$segundonombre','$primerapellido','$segundoapellido',$cedula,'$revocar_permisos')";
$resultado2=$mysqli ->query($sql2);
}

elseif (isset($_POST['generar'])){
    $nombre = $_POST["nombre"];
    //AGREGUE CAMPOS PARA EL PAZ Y SALVO
    $segundonombre = $_POST["segundonombre"];
    $primerapellido = $_POST["primerapellido"];
    $segundoapellido = $_POST["segundoapellido"];
    ////////////////////////////
    $cedula = $_POST["cedula"]; 
   


require('../Cliente/docs/fpdf.php');

//FECHA ACTUAL
$fechaActual = date('d-m-Y');
$fechaEntera = time();
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);
$dia = date("d", $fechaEntera);


if($mes==01){
    $mes='ENERO';
}
elseif($mes==02){
    $mes='FEBRERO';
}
elseif($mes==03){
    $mes='MARZO';
}
elseif($mes==04){
    $mes='ABRIL';
}
elseif($mes==05){
    $mes='MAYO';
}
elseif($mes==06){
    $mes='JUNIO';
}
elseif($mes==07){
    $mes='JULIO';
}//
//elseif($mes==08){
//    $mes='AGOSTO';
//}






class PDF extends FPDF
{
// Cabecera de página




function Header()
{
    // Logo

    //ancho,
    $this->Ln(3);
    $this->Image('../Cliente/imgs/logocompleto.png',80,2,30);
    // Arial bold 15
    $this->SetFont('Arial','I',12);

    $this->Ln(5);

    // Movernos a la derecha
    $this->Cell(35);
    //anchura,altura,0 O 1 para borde,padding
    $this->Cell(20,10,'EMPRESA SOCIAL DEL ESTADO E.S.E IMSALUD',0,5);
    //$this->Ln(10);
   // $this->Cell(80,30,'IMSALUD',0,1,'C');
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Sistema de identidad ©').$this->PageNo().'/{nb}',0,0,'C');
}
}

//PRINCIPAL
// Creación del objeto de la clase heredada
//NECESITO SABER COMO ME TRAIGO LAS VARIABLES DEL PHP
$pdf = new PDF();
$title = 'PAZ Y SALVO GENERADO';
$pdf->SetTitle($title);
$pdf->SetAuthor('Danny Aguilar');
$pdf->AliasNbPages();//pie de pagina
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(30);
$pdf->Cell(20,10,utf8_decode('EL JEFE DE OFICINA DE INFORMACIÓN SISTEMAS Y PROCESOS DE LA'));
$pdf->Ln(3);
$pdf->Cell(45);
$pdf->Cell(20,10,utf8_decode('EMPRESA SOCIAL DEL ESTADO ESE IMSALUD'));
$pdf->Ln(35);
$pdf->Cell(69);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,utf8_decode('HACE CONSTAR'));
$pdf->Ln(20);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,10,utf8_decode('Que, revisado el contrato de prestacion de servicios  asignado al contratista '.$nombre." ".$primerapellido." ".$segundoapellido));
$pdf->Ln(4);
$pdf->Cell(20,10,utf8_decode('Con cedula de ciudadania '.$cedula.'  presenta terminacion en el periodo de ' .$mes.' por lo tanto se expide el presente '));
$pdf->Ln(4);
$pdf->Cell(20,10,utf8_decode('certificado para tramite de cuentas y procesos que se requieran en la entidad.'));
$pdf->Ln(25);
$pdf->Cell(20,10,utf8_decode('San josé de Cúcuta '.$dia. ' de '.$mes.' del '.$anio));
$pdf->Ln(50);
$pdf->Cell(55);
$pdf->Cell(20,10,utf8_decode('LUCAS AUGUSTO LIENDO ROMERO '));
$pdf->Ln(4);
$pdf->Cell(35);
$pdf->Cell(20,10,utf8_decode('Jefe oficina de informacion Sistemas y Procesos ESE IMSALUD '));
$pdf->Ln(4);
$pdf->Cell(65);
$pdf->Cell(20,10,utf8_decode('Supervisor de contrato'));
$pdf->Ln(40);
$pdf->Cell(55);
$pdf->Cell(20,10,utf8_decode('Avenida Libertadores #0-124 Barrio Blanco'));
$pdf->Ln(4);
$pdf->Cell(30);
$pdf->Cell(20,10,utf8_decode('San José de Cúcuta, Norte de santander -Colombia, Telefono (7) 57849800'));
$pdf->Ln(4);
$pdf->Cell(55);
$pdf->Cell(20,10,utf8_decode('Linea nacional gratuita 018000118950'));
$pdf->Ln(4);
$pdf->Cell(67);
$pdf->Cell(20,10,utf8_decode('http://.imsalud.gov.co'));
$pdf->Ln(4);
$pdf->Output();



}

if($resultado>0){
   // header("Location:../Vista/vuelos.html");
   

echo header("Location:../Cliente/templates/paz.php");


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>