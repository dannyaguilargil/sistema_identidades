
<?php
//COPIA DE PAZ Y SALVO ADMIN PERO CAMBIADO A TABLA PARA VALIDAR DE FORMA MAS SENCILLA

/////@developer DANNYAGUILARGIL
/*
##################################################
----------| |----------|     |#    |  ---------  #
          | |          |    |  |   |      #      # 
          | |----------|   |    |  |      #      #
          | |          |  |      | |      #      #
----------| |          | |        #   ---------  #
################################################## 

*/

?>

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
}?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kodchasan">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="lib/datatables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/bootstrap.css">

    <link rel="stylesheet" href="../css/solicitud_usuario.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Gestion de Administrador</title>
</head>
<body>

<header class="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
       
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
            
            
              <li class="nav-item dropdown">
                <a class="fas fa-phone-laptop nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span style="font-family: Lato;">  Sistemas </span>
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="fas fa-user-hard-hat dropdown-item" target="_blank" href="supervisa.php"><span style="font-family: Lato;"> Pendientes Supervisor </span></a></li>
                <li><a class="far fa-user-crown dropdown-item" target="_blank" href="administra.php"><span style="font-family: Lato;"> Pendientes Administrador </span></a></li>

                <li><a class="fal fa-vote-yea  dropdown-item" target="_blank" href="sis_aprobados.php"> <span style="font-family: Lato;"> Aprobados </span></a></li>
                 
      
                <li><a class="far fa-user-md-chat dropdown-item" target="_blank" href="sistemas_solicitud_usuario.php"> <span style="font-family: Lato;"> Solicitud </span></a></li>
                  <li><hr class="dropdown-divider" style="color: green;"></li>
                  <li><a class="fal fa-comment-check dropdown-item" target="_blank" href="notificador.php"><span style="font-family: Lato;">Historial del notificador </span> </a></li>
                 
                </ul>
              </li>

            
              <li class="nav-item dropdown">
                <a class="fas fa-id-card nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span style="font-family: Lato;"> Paz y salvo </span>
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="far fa-file-check dropdown-item" href="pazysalvo_adm.php"> <span style="font-family: Lato;"> Pendientes</span></a></li>
                <li><a class="fal fa-file-pdf dropdown-item" href="paprueba.php"> <span style="font-family: Lato;">  Aprobados </span> </a></li>
                </ul>
              </li>
                

              <li class="nav-item dropdown">
                <a class="fas fa-user-cog nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 <span style="font-family: Lato;"> Usuarios </span>
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="far fa-user-secret dropdown-item" href="usuario_pendiente.php"> <span style="font-family: Lato;"> Pendientes </span></a></li>
                <li><a class="fal fa-users dropdown-item" href="usuarios.php"><span style="font-family: Lato;"> Registrados </span></a></li>
                </ul>
              </li>



            </ul>
            <a class="far fa-user-cog navbar-brand " href="perfil.php"> <span style="font-family: Lato"> Mi perfil </span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>

          </div>
        </div>
      </nav>
      <!--NAVBAR-->
                    
</header>





<div class="imagen">
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 120px; text-align: center;height: 50px">
    </div>

    <center>
              <h5 style="font-family: Kodchasan">Paz y salvos pendientes</h5>
              </center>
    <!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-family: Kodchasan">Aprobar Paz y salvo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-editar" style="font-family: Lato;">

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for=""><b>Primer nombre:</b> </label>
                    <input type="text" id="nombre_laboratorio" class="form-control">
                    <input type="hidden" id="id">
                 </div>
               </div>



              <div class="col">
                <div class="form-group">
                <label for="">Segundo nombre: </label>
                <input type="text" id="segundonombre" class="form-control">
                
                 </div>
              </div>


              <div class="col">
                <div class="form-group">
                <label for="primerapellido"><b>Primer apellido: </b></label>
                <input type="text" id="primerapellido" class="form-control">
                
                 </div>
              </div>

              <div class="col">
                  <div class="form-group">
                    <label for="">Segundo apellido: </label>
                    <input type="text" id="segundoapellido" class="form-control">
                   
                 </div>
              </div>

              <div class="col">
                <div class="form-group">
                <label for=""><b>Cedula: </b></label>
                <input type="text" id="cedula" class="form-control">
                
                 </div>
              </div>

              </div>

              <div class="row">
                <div class="col">
                  <label for="rfid">Entrega de tarjeta RFID:</label>
                 <input type="checkbox" value="SI" name="rfid" id="rfid" checked required>
                 </div>


                 <div class="col">
                <label for="equipos">Entrega de carnet:</label> <br>
                 <input type="checkbox" value="SI" name="equipos" id="equipos" required>
                 </div>
               </div>

         
        
<hr style="color: green;">
      

      <div class="row">
        <div class="col">
        <div class="container">
       <h6 style="font-family: Kodchasan;">Gestion de sistemas aprobados</h6>


      <!-- deplegar sistemas aprobados -->

  <p>
  <a class="btn btn-outline-success fas fa-eye" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Ver permisos
  </a>
  </p>

<div class="collapse" id="collapseExample">
  <div class="card card-body">
   
  <table id=""class="display table table-hover text-nowrap table-bordered" style="font-family: Lato;">
           <thead style="font-family: Kodchasan;">
               <tr>
                   
                   <th>Aplicativo</th>
                   <th>Tipo de solicitud</th>
                   <th>Perfil</th> <!-- PENDIENTE -->
                 
                  
               </tr>
           </thead>
           <tbody>
            <tr>
              <!--DEBO HACER UN TIPO DE CONTADOR AQUI DEPENDIENDO DE LOS SITEMAS APROBADOS Y OCULTAR LAS COLUMNAS -->
          <th scope="row"> <input type="text" name="aplicativo1" id="aplicativo1" placeholder="No tiene aplicativo creados" class="form-control" disabled style="color: green;"></th>
          <td> <input type="text" name="tiposolicitud1" id="tiposolicitud1" placeholder="No tiene creados" class="form-control" disabled></th>
          <td> <input type="text" name="perfil1" id="perfil1" placeholder="No tiene asignado" class="form-control" disabled></th>
          </tr>
          <tr>
          <th scope="row"> <input type="text" name="aplicativo2" id="aplicativo2" placeholder="No tiene aplicativo creados" class="form-control" disabled style="color: green;"></th>
          <td> <input type="text" name="tiposolicitud22" id="tiposolicitud2" placeholder="No tiene creados" class="form-control" disabled></th>
          <td> <input type="text" name="perfil2" id="perfil2" placeholder="No tiene asignado" class="form-control" disabled></th>
          </tr>
          <tr>
          <th scope="row"> <input type="text" name="aplicativo3" id="aplicativo3" placeholder="No tiene aplicativo creados" class="form-control" disabled style="color: green;"></th>
          <td> <input type="text" name="tiposolicitud3" id="tiposolicitud3" placeholder="No tiene creados" class="form-control" disabled></th>
          <td> <input type="text" name="perfil3" id="perfil3" placeholder="No tiene asignado" class="form-control" disabled></th>
          </tr>
          <tr>
          <tr>
          <th scope="row"> <input type="text" name="aplicativo4" id="aplicativo4" placeholder="No tiene aplicativo creados" class="form-control" disabled style="color: green;"></th>
          <td> <input type="text" name="tiposolicitud4" id="tiposolicitud4" placeholder="No tiene creados" class="form-control" disabled></th>
          <td> <input type="text" name="perfil4" id="perfil4" placeholder="No tiene asignado" class="form-control" disabled></th>
          </tr>
          <tr>
          <tr>
          <th scope="row"> <input type="text" name="aplicativo5" id="aplicativo5" placeholder="No tiene aplicativo creados" class="form-control" disabled style="color: green;"></th>
          <td> <input type="text" name="tiposolicitud5" id="tiposolicitud5" placeholder="No tiene creados" class="form-control" disabled></th>
          <td> <input type="text" name="perfil5" id="perfil5" placeholder="No tiene asignado" class="form-control" disabled></th>
          </tr>
          <tr>
         
           </tbody>
       </table>
  </div>
</div>

      <!-- -->
    





   </div>
        </div>
      </div>

</div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success fas fa-check">Aprobarlo</button>
        </form>
        </div>
      </div>
    </div>
  </div>

 
  <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar solicitud de paz y salvo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-eliminar">
              <div class="form-group">
                  <label for="">Colaborador: </label>
                  <label id="laboratorio_eliminar"></label>
                  <input type="hidden" id="id_laboratorio">
              </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Rechazarlo</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    <div class="container">
       
        <table id="example"class="display table table-hover text-nowrap table-bordered" style="font-family: Lato;">
            <thead style="font-family: Kodchasan;">
                <tr>
                    
                    <th>Fecha de solicitud</th>
                    <th>Primer nombre</th>
                    <th>Segundo nombre</th>
                    <th>Primer apellido</th> <!-- AGREGUE ESTO-->
                    <th>Segundo apellido</th> <!-- AGREGUE ESTO-->
                    <th>Cedula</th> <!-- AGREGUE ESTO-->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="lib/jquery.min.js"></script>
    <script src="lib/bootstrap.js"></script>
    <script src="lib/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            var funcion='listar';
    let datatable = $('#example').DataTable({
        "ajax": {
            "url": "controlador/pazysalvoController.php", // "url": "controlador/LaboratorioController.php",
            "method": "POST",
            "data":{funcion:funcion}
        },
        "columns": [
           
            { "data": "fecha" },
            { "data": "nombre" },
            { "data": "segundonombre" },
            { "data": "primerapellido" }, //Este campo es igual al nombre del campo de la bd
            { "data": "segundoapellido" }, //Este campo es igual al nombre del campo de la bd
            { "data": "cedula" }, //Este campo es igual al nombre del campo de la bd
           
            
           // { "defaultContent": ``}, //tengo que mirar como me traigo esa data
            { "defaultContent": `<button class="editar btn btn-outline-success fas fa-eye" type="button" data-toggle="modal" data-target="#editar"></button>
                                <button class="eliminar btn btn-outline-danger fas fa-user-times"type="button" data-toggle="modal" data-target="#eliminar"></button>` }
        ],
        "language": espanol
    });

    // EDITARR QUE ES INSERTAR
  
    //
    $('#example tbody').on('click','.editar', function(){ // Aqui obtiene los datos que quiere mostrar
      let data = datatable.row($(this).parents()).data();
      $('#fecha').val(data.fecha);
      $('#nombre_laboratorio').val(data.nombre);
     // $('#id').val(data.id);
      //AQUI PUEDE IR CONSULTA Y METERLO EN EL VALOR
      $('#segundonombre').val(data.segundonombre);
      $('#primerapellido').val(data.primerapellido);
      $('#segundoapellido').val(data.segundoapellido);
    //  $('#tipodocumento').val(data.tipodocumento);
      $('#cedula').val(data.cedula);
      $('#aplicativo1').val(data.aplicativo1);
      $('#aplicativo2').val(data.aplicativo2);
      $('#aplicativo3').val(data.aplicativo3);
      $('#aplicativo4').val(data.aplicativo4);
      $('#aplicativo5').val(data.aplicativo5);
      $('#tiposolicitud1').val(data.tiposolicitud1);
      $('#tiposolicitud2').val(data.tiposolicitud2);
      $('#tiposolicitud3').val(data.tiposolicitud3);
      $('#tiposolicitud4').val(data.tiposolicitud4);
      $('#tiposolicitud5').val(data.tiposolicitud5);
      $('#perfil1').val(data.perfil1);
      $('#perfil2').val(data.perfil2);
      $('#perfil3').val(data.perfil3);
      $('#perfil4').val(data.perfil4);
      $('#perfil5').val(data.perfil5);


    })
    $('#form-editar').submit(e=>{ //Aqui obtiene los datos que quiere editar
      let id =$('#id').val();
      let nombre=$('#nombre_laboratorio').val();
      let segundonombre=$('#segundonombre').val();
      let primerapellido=$('#primerapellido').val();
      let segundoapellido=$('#segundoapellido').val();
      //let tipodocumento=$('#tipodocumento').val();
      let cedula=$('#cedula').val();

      ///////////////////////////////
      let rfid=$('#rfid').val();
      let equipos=$('#equipos').val();

      //let equipos=$('#equipos').val();
    
      funcion='editar';
      $.post('controlador/pazysalvoController.php',{cedula,rfid,equipos,funcion},(response)=>{
        
      })
      
    })
    $('#example tbody').on('click','.eliminar', function(){
      let data = datatable.row($(this).parents()).data();
      $('#laboratorio_eliminar').html(data.nombre);
      $('#cedula').val(data.cedula);
    })
    $('#form-eliminar').submit(e=>{
      let cedula =$('#cedula').val();
      funcion='eliminar';
      $.post('controlador/pazysalvoController.php',{cedula,funcion},(response)=>{
        
      })
      
    })
} );
let espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Paz y salvos pendientes del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
};
    </script>




    <script>
      // averiguar consultas en javascript para traermelo segun la data
    </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>