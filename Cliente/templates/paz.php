
<?php
//FORMULARIO ANTERIOR A ESTE PAZ_SALVO.PHP, ESTE TIENE LA GESTION DE PERMISOS
session_start();
include '../../Servidor/conexion.php'; 
$tomador=$_SESSION['nombre'];
$rolex=$_SESSION['rol'];

//VALIDACION DEL ROL Y NOMBRE DE USUARIO POR SEGURIDAD POR FORMULARIO CON EL FIN DE ACCESOS NO AUTORIZADOS
$totalr = ''; 
$consulta3="SELECT COUNT(*) FROM usuarios_registrados WHERE nombre='$tomador';";
$resultado3=mysqli_query($mysqli,$consulta3);
   if($resultado3){ while($row = $resultado3->fetch_array()){
      $totalr = $row['COUNT(*)'];
      }
    } 
if($totalr<1){
  header("Location: ../../index.php");
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kodchasan">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/pazysalvo.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Paz y salvo</title>
</head>
<body>
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >

            <div class="container-fluid">
              <a class="fas fa-id-card navbar-brand " href="paz.php"><span style="font-family: Kodchasan;"> Paz y salvo </span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="fas fa-phone-laptop nav-link" aria-current="page" href="sistemas_solicitud_usuario.php"><span style="font-family: Kodchasan;"> Sistemas </span></a>
                  </li>
                  <li class="nav-item">
                    <a class="far fa-user-cog nav-link" href="perfil.php" disabled><span style="font-family: Kodchasan;"> Mi perfil </span></a>
                  </li>
                </ul>
              </div>
            

              <div class="user">
                <?php $tomador=$_SESSION['nombre']?>
               <!--  Bienvenido  --><?php //echo $_SESSION['nombre']; ?>
                <?//php echo $tomador; ?>
              </div>



            <!-- NO QUIERO MODO OSCURO EN PAZ Y SALVO 
              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"> 
               </div>
-->
            
               <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          
          </nav>
         
                    
    </header>


<div class="centrar">


 

        <div class="centrar1 col-sm-6 col-md-6 col-lg-6 col-xl-6">

         
            <div class="form-control form-contro" >
        <center><h5 class="" style="font-family: Kodchasan">Generar paz y salvo</h5></center>
            
        <div class="imagen">
            <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 200px; text-align: center;">
        </div>
           
            <!-- AQUI DEBO CARGAR LOS DATOS ANTERIORES DEL MISMO USUARIO-->

           


<!--
  CONSULTAS PARA EL FORMULARIO 
  $resultado = $conn->query($sql);
  $num_rows = $resultado->num_rows;


  -->
<?php include '../../Servidor/conexion.php'; 

$segundonombrer = '';
$primerapellidor = '';
$segundoapellidor = '';



$consulta="SELECT nombre,segundonombre,primerapellido,segundoapellido,cedula from usuarios_registrados WHERE nombre = '$tomador';";
$resultado=mysqli_query($mysqli,$consulta);
        if($resultado){ while($row = $resultado->fetch_array()){
            $nombrer = $row['nombre'];
            $segundonombrer = $row['segundonombre'];
            $primerapellidor = $row['primerapellido'];
            $segundoapellidor = $row['segundoapellido'];
            $cedular = $row['cedula'];
          
          }
    
        } 
?>

<?php
//GENERADOR DEL BOTON DE DESCARGA DEL PDF
$rfid='';
$equipos='';
$revocar_permisos='';


// CODIGO PHP PARA HACER LA CONSULTA Y REVISAR SI LOS EQUIPOS Y RFID FUERON GENERADOS
$consulta="SELECT * from pazysalvo_aprobar WHERE nombre = '$tomador';";
$resultado=mysqli_query($mysqli,$consulta);
if($resultado){ while($row = $resultado->fetch_array()){
 $rfid = $row['rfid'];
 $equipos = $row['equipos'];
 $revocar_permisos = $row['revocar_permisos'];
}
} 
?>

<?php
/*
AQUI GESTIONARE LA CONSULTA DE LA BD DE LOS SISTEMAS APROBADOS QUE TIENE EL PERFIL
ANTES DE REALIZAR LA SOLICITUD Y LUEGO EN ESA SOLICITUD REGISTRARE LOS APLICATIVOS
//DEBO TOMAR DE AQUI APLICATIVO,TIPO DE SOLICITUD, PERFIL, CONTRASEÑA, OBSERVACIONES FECHA FINAL ES OPCIONAL
*/
//por ahora lo intentare solo con un sistema, la idea es con 5 , colocandole limites
//por ahora lo guardare en un boton oculto, despues miro como lo guardo en json o xml esa consulta


//AQUI PUEDO HACER EL CICLO QUE RECORRA LA 5 CANTIDADES DE LOS INPUTS
//primero debo saber cuantos sistemas tiene
//segundo debo crear el ciclo dependiento de los sistemas que tiene 
//tercero muestro esos inputs
//Debo mostrar la consulta dependiendo del la cantidad de interacciones
//primero haga la interaccion para saber cuantos hay
//luego haga la consulta dependiendo del la cantidad de interacciones
//y guarde esa consulta en cada interaccion
//resgistrar la las interacciones en la base de datos

//SELECT COUNT(*) FROM sistema_validado_admin WHERE nombre='DANNY';


$cantidad_inputs = ''; 
$consulta_cant="SELECT COUNT(*) FROM sistema_validado_admin WHERE nombre='$tomador';";
$resultado_cant=mysqli_query($mysqli,$consulta_cant);
   if($resultado_cant){ while($row = $resultado_cant->fetch_array()){
      $cantidad_inputs = $row['COUNT(*)'];
      }
    } 
if($totalr<1){
  echo 'No tiene sistemas creados';
}
else{
  //echo $cant; //cantidad de sistemas que tiene la persona
}
?>


            <form action="../../Servidor/pazysalvoregistrar_solicitud.php" method="POST" id="form" style="font-family: Lato">
            <div class="row">
             
                <?php
  // Creamos el input
  $i = 0;
  $cadena = '';
  $cadena2 = '';
  $j=0;  
  //SOLUCIONADO ERROR DE TRUNCAMIENTO DE DATOS CON LA NUEVA VARIABLE
$consultas="SELECT aplicativo,tiposolicitud,perfil from sistema_validado_admin WHERE nombre = '$tomador';";
$resultados=mysqli_query($mysqli,$consultas);
if($resultados){ 
  while($row = $resultados->fetch_array()){
  //CICLO QUE RECORRE SEGUN LA CANTIDAD DE INTERACCIONES DE LOS APLICATIVOS

  for ($i = 1; $i <= $cantidad_inputs; $i++) {
    
    for ($k = 1; $k <= $cantidad_inputs; $k++) {
      for ($l = 1; $l <= $cantidad_inputs; $l++) {

    //AQUI VOY A TRATAR DE OPTIMIZAR ESTE CODIGO DE BLUCES ANIDADOS PARA EVITAR EL CALCULO REPETIDO
    $i = $row['aplicativo'];
    $k = $row['tiposolicitud'];
    $l = $row['perfil'];
    $cadena = $i; //esta variable evita error de truncamiento de datos
    $cadena2 = $k; 
    $cadena3 = $l; 
    $j++;//auxiliar de contador para darle una variable al input

   }
  }

   //MANERA RPROVISIONAL DE HACER LA INSERCCION A LA BD, PENDIIENTE EL GUARDADO POR JSON
   ?>
  <div class="col"><?php
   echo "<input type='hidden' name='aplicativo$j' id='aplicativo$j' Value='$cadena' style=''>"; //primero lo intentare con este
   ?>
  </div>
  
   <div class="col"> <?php
   echo "<input type='hidden' name='tiposolicitud$j' id='tiposolicitud$j' Value='$cadena2' style=''><br>"; 
   ?>
   </div>
  
   <div class="col"> <?php
   echo "<input type='hidden' name='perfil$j' id='perfil$j' Value='$cadena3' style=''><br>"; //para gestionar el perfil del sistema creado anteriormente
   ?>
   </div>

 <?php
}
}
}
?>
</div>
  

         
           <!-- <input style="text-align: center;" type="text" class="form-control" name="aplicativo" id="aplicativo" value="<?php //echo $cadena ?>"> 
            

                LOS OCULTO PARA PODER LLEVAR ESA SOLICITUD AL REGISTRO -->
               <input  style="text-align: center;" type="hidden" class="form-control" name="nombre" id="nombre" value="<?php echo $nombrer?>">  
               <input style="text-align: center;" type="hidden" class="form-control" name="segundonombre" id="segundonombre" value="<?php echo $segundonombrer ?>">
               <input style="text-align: center;" type="hidden" class="form-control" name="primerapellido" id="primerapellido" value="<?php echo $primerapellidor ?>">
               <input style="text-align: center;" type="hidden" class="form-control" name="segundoapellido" id="segundoapellido" value="<?php echo $segundoapellidor ?>">
                <!-- LOS OCULTO PARA PODER LLEVAR ESA SOLICITUD AL REGISTRO -->
                <input style="text-align: center;" type="hidden" class="form-control" name="cedula" id="cedula" value="<?php echo $cedular ?>">

                <label for="revocar_permisos">Revocar permisos</label> <br>
                <?php
                //CODIGO PHP PARA DESABILITAR EL DISABLED O HABILITARLO
                if($revocar_permisos=='SI' or $revocar_permisos=='INACTIVO'){
                  ?><input class=""  type="checkbox"  value="SI" disabled checked id="revoca_permisos"><br>
                  <?php
                }
                else{
                  ?><input class=""  type="checkbox" name="revocar_permisos" value="SI" id="revocar_permisos" onclick="envioo();"><br>
                  <?php
                }
                ?>


                
       
             
                <label for="">Entrega de tarjeta RFID</label> <br>
               <!-- <input class=""  type="checkbox" value=""> AQUI PUEDE HABER UN PROBABLE ERROR-->
                <?php
                //AQUI VAN VALIDACIONES DE LOS SELECTED
                if($rfid=='SI' && $cedular=$cedular){
                  ?><input class=""  type="checkbox"  value="" disabled checked><br>
                  <?php
                }
                else{
                  ?><input class=""  type="checkbox" value="" disabled><br>
                  <?php
                }
                ?>
                
            
             
              <!-- CHECKED ES PARA HABILIAR EL BOTON DE CHEK -->
          
                <label for="">Entrega de Carnet</label><br>
               
                <?php
                //AQUI VAN VALIDACIONES DE LOS SELECTED
                if($equipos=='SI' && $cedular=$cedular){
                  ?><input class=""  type="checkbox"  value="" disabled checked><br>
                  <?php
                }
                else{
                  ?><input class=""  type="checkbox" value="" disabled><br>
                  <?php
                }


                ?>
<br> 
              <!--BOTON QUE APARECE SOLO SI EL PAZ Y SALVO ESTA APROBADO -->
          <?php

              if($rfid=='SI'){
                ?> 
                <!-- ANTIGUO DESCARGA DEL PAZ Y SALVO
                <a target="_blank" href="../../Servidor/generapdf.php" class="btn btn-warning">Descargar</a>
              -->
                <button type="submit" class="btn btn-success" name="generar" id="generar"><b>Descargar paz y salvo</b></button> 
                <?php
              }
              else{
                echo 'Se revocaran los permisos de '.$cantidad_inputs.' aplicativos';//indica cantidades de aplicativos por revocar
                ?><br>
                <button type="submit"  class="btn btn-success" onclick="envio()" name="solicitar" id="solicitar">Solicitar</button> <?php
              }
            
?>

                </div>
            </div>
          
            </form>
           
         

<script>
      function envio(){
          console.log("se ejecuto envio alerta 1");
          const revoca_permisos = document.getElementById("revoca_permisos");


          form.addEventListener("submit", e=>{
         
            if(revoca_permisos.value.length>1){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "YA REALIZO SOLICITUD, EL ADMINISTRADOR DEBE APROBAR EL PAZ Y SALVO!", "error");
             
            }
          
            else{
              alert("ENVIADO CORRECTAMENTE SE LE NOTIFICARA AL ADMINISTRADOR");
              
            }
          })
      
        

        
      }


     </script>



      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="../js/main.js"></script>
      <script src="../js/repetirdiv.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>