
<?php

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
              <a class="fas fa-id-card navbar-brand " href="pazysalvo.php">Paz y salvo</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="fas fa-phone-laptop nav-link" aria-current="page" href="sistemas_solicitud_usuario.php">Sistemas</a>
                  </li>
                  <li class="nav-item">
                    <a class="far fa-user-cog nav-link" href="perfil.php" disabled>Mi perfil</a>
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




    
   

<br> <br> 

<div class="centrar">


 

        <div class="centrar1 col-sm-6 col-md-6 col-lg-6 col-xl-6">

         
            <div class="form-control form-contro" >

        <div class="imagen">
            <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 200px; text-align: center;">
        </div>
        <br>
            <center><h6 class="">Generar paz y salvo</h6></center>
            <!-- AQUI DEBO CARGAR LOS DATOS ANTERIORES DEL MISMO USUARIO-->

           


<!--
  CONSULTAS PARA EL FORMULARIO 
  $resultado = $conn->query($sql);
  $num_rows = $resultado->num_rows;


  -->
<?php include '../../Servidor/conexion.php'; 
//CODIGO PHP DE CONSULTAS
//PRIMERO HAGO LA VALIDACION CON LA CEDULA
$consulta="SELECT nombre,cedula from usuarios_registrados WHERE nombre = '$tomador';";
$resultado=mysqli_query($mysqli,$consulta);
        if($resultado){ while($row = $resultado->fetch_array()){
            $nombrer = $row['nombre'];
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


          <form action="../../Servidor/pazysalvoregistrar_solicitud.php" method="POST" id="form">

            <div class="contt">

            <div class="">
              <div class="">
               <!-- <label for="nombre" class="">Nombre</label> -->
               <input  style="text-align: center;" type="hidden" class="form-control" name="nombre" id="nombre" value="<?php echo $nombrer?>">  
              </div>
              
              <div class="">
              <!--  <label  for="cedula"  class="">Cedula</label> -->
                <input style="text-align: center;" type="hidden" class="form-control" name="cedula" id="cedula" value="<?php echo $cedular ?>">
              </div>

           </div>



            <div class="">

            <div class="">
                <label for="revocar_permisos">Revocar permisos</label> 
                <?php
                //CODIGO PHP PARA DESABILITAR EL DISABLED O HABILITARLO
                if($revocar_permisos=='SI' or $revocar_permisos=='INACTIVO'){
                  ?><input class="check"  type="checkbox"  value="SI" disabled checked id="revoca_permisos">
                  <?php
                }
                else{
                  ?><input class="check"  type="checkbox" name="revocar_permisos" value="SI" id="revocar_permisos" onclick="envioo();">
                  <?php
                }


                ?>


                
              </div>
              
              <div class="textoI1">
                <label for="">Entrega de tarjeta RFID</label>
                <input class="check"  type="checkbox" value=""
                <?php
                //AQUI VAN VALIDACIONES DE LOS SELECTED
                if($rfid=='SI' && $cedular=$cedular){
                  ?><input class="check"  type="checkbox"  value="" disabled checked>
                  <?php
                }
                else{
                  ?><input class="check"  type="checkbox" value="" disabled>
                  <?php
                }


                ?>
                
                
                
              </div>
             
              <!-- CHECKED ES PARA HABILIAR EL BOTON DE CHEK -->
              <div class="textoI1">
                <label for="">Entrega de equipos en buen estado</label>
               
                <?php
                //AQUI VAN VALIDACIONES DE LOS SELECTED
                if($equipos=='SI' && $cedular=$cedular){
                  ?><input class="check"  type="checkbox"  value="" disabled checked>
                  <?php
                }
                else{
                  ?><input class="check"  type="checkbox" value="" disabled>
                  <?php
                }


                ?>
              </div>


            </div>


            
          </div>

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
                ?><button type="submit"  class="text-left btn btn-success" onclick="envio()" name="solicitar" id="solicitar">Solicitar</button> <?php
              }
             
?>





              

              <!--

              AQUI VA EL CODIGO JAVASCRIPT PARA REALIZAR LA VALIDACION DEL PAZ Y SALVO Y GENERAR EL BOTON
              -->
              <?php 
                



            ?>


      </form>
           
            </div>
        </div>

      </div>

        <!--SI AL USUARIO SE LE VALIDA UN PERMISO DE UNA APP ESE PERMISO DE LA APP DEBE REGISTRARSE EN LA BASE DATOS -->








<!---
<script>
      function envio(){
        alert("PAZ Y SALVO SOLICITADO");
      }
     </script>
    -->

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