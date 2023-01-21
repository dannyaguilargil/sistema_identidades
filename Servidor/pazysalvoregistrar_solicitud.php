<?php
//AQUI VAYA TODO LO DE PAZ Y SALVO YA SEA QUE SE REGISTRE O GENERA EL PDF
//VALIDAR AQUI SOLO EL REGISTRO Y INLCUIRLO
//EN GENERARPDF VALIDAR EL BOTON SOLO DE GENERARLO
include 'conexion.php';


// DEBO CARGAR LOS DATOS PREVIOS DEL USUARIO Y POSTERIOR A ESO HACER EL REGISTRO DEL SISTEMA
$nombre = '';
$cedula = 0;
$revocar_permisos = '';

if (isset($_POST['solicitar'])){
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"]; 
$revocar_permisos = $_POST["revocar_permisos"]; 

$sql="INSERT INTO pazysalvo_solicitud VALUES('$nombre',$cedula,'$revocar_permisos')";
$resultado=$mysqli ->query($sql);

$sql2="INSERT INTO pazysalvo_aprobar(nombre,cedula,revocar_permisos) VALUES('$nombre',$cedula,'$revocar_permisos')";
$resultado2=$mysqli ->query($sql2);
}

elseif (isset($_POST['generar'])){
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"]; 
   


require('../Cliente/docs/fpdf.php');



//CODIGO QUE GENERA EL PDF
//$nombre = '';
//$cedula = 0;
//$revocar_permisos = '';





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
    $this->Cell(0,10,utf8_decode('Page ').$this->PageNo().'/{nb}',0,0,'C');
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
$pdf->Cell(20,10,utf8_decode('Que, revisado el contrato de prestacion de servicios N° $NUMERO asignado al contratista $NOMBRE'));
$pdf->Ln(4);
$pdf->Cell(20,10,utf8_decode('Con cedula de ciudadania $CEDULA  presenta terminacion en el perodo $FECHA, por lo tanto'));
$pdf->Ln(4);
$pdf->Cell(20,10,utf8_decode('se expide el presente certificado para tramite de cuentas y procesos que se requieran.'));
$pdf->Ln(25);
$pdf->Cell(20,10,utf8_decode('$FECHAACTUAL'));
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
$pdf->Write(1,$nombre);
$pdf->Output();



}

if($resultado>0){
   // header("Location:../Vista/vuelos.html");
   

echo header("Location:../Cliente/templates/sistemas_solicitud_usuario.php");


//exit();

}else{
    echo 'EROOR AL AGREGAR REGISTRO';
}
?>