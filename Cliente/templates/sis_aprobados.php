
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
                <li><a class="fas fa-user-hard-hat dropdown-item" href="supervisa.php"><span style="font-family: Lato;"> Pendientes supervisor </span></a></li>
                <li><a class="far fa-user-crown dropdown-item" target="_blank" href="administra.php"><span style="font-family: Lato;"> Pendientes Administrador </span></a></li>

                <li><a class="fal fa-vote-yea  dropdown-item" target="_blank" href="sis_aprobados.php"> <span style="font-family: Lato;"> Aprobados </span></a></li>
                  <li><a class="far fa-user-md-chat dropdown-item" target="_blank" href="sistemas_solicitud_usuario.php"> <span style="font-family: Lato;"> Solicitud </span></a></li>
                  <li><hr class="dropdown-divider" style="color: green;"></li>
                  <li><a class="fal fa-comment-check dropdown-item" target="_blank" href="notificador.php"><span style="font-family: Lato;">  Notificar </span> </a></li>
                 
                </ul>
              </li>

            
              <li class="nav-item dropdown">
                <a class="fas fa-id-card nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 <span style="font-family: Lato;"> Paz y salvo </span>
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="far fa-file-check dropdown-item" href="pazysalvo_adm.php"> <span style="font-family: Lato;"> Pendientes</span></a></li>
                  <li><a class="fal fa-file-pdf dropdown-item" target="_blank" href="paprueba.php"> <span style="font-family: Lato;">  Aprobados </span> </a></li>
                </ul>
              </li>
                

              <li class="nav-item dropdown">
                <a class="fas fa-user-cog nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 <span style="font-family: Lato"> Usuarios</span>
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="far fa-user-secret dropdown-item" href="usuario_pendiente.php"> <span style="font-family: Lato"> Pendientes </span></a></li>
                  <li><a class="fal fa-users dropdown-item" href="usuarios.php"><span style="font-family: Lato"> Registrados </span></a></li>
                </ul>
              </li>



            </ul>
            <a class="far fa-user-cog navbar-brand " href="perfil.php"><span style="font-family: Lato"> Mi perfil </span></a>
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
              <h5 style="font-family: Kodchasan">Sistemas Aprobados del administrador</h5>
              </center>
    <!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-family: Kodchasan;">Sistemas aprobados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-editar">

      
  <div class="row">
    <div class="col">
    <p>
  <a class="btn btn-outline-success fas fa-eye" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Permisos activos
  </a>
  </p>
    </div>
    <div class="col">
    <p>
  <a class="btn btn-outline-danger fas fa-eye" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Permisos caducados
  </a>
</p>
    </div>
  </div>





<div class="collapse" id="collapseExample">
  <div class="card card-body">
   
  <table id=""class="display table table-hover text-nowrap table-bordered" style="font-family: Lato;">
       
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
        

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-success fas fa-check">Aprobarlo</button>-->
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar solicitud de sistema</h5>
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
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-danger">Rechazarlo</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    <div class="container">
       
        <table id="example"class="display table table-hover text-nowrap table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Primer nombre</th>
                    <th>Segundo nombre</th>
                    <th>Primer apellido</th> <!-- AGREGUE ESTO-->
                    <th>Segundo apellido</th> <!-- AGREGUE ESTO-->
                    <th>Cedula</th> <!-- AGREGUE ESTO-->
                    <th>Aplicativo</th> <!-- AGREGUE ESTO-->
                   
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
            "url": "controlador/AdministraController.php", // "url": "controlador/LaboratorioController.php",
            "method": "POST",
            "data":{funcion:funcion}
        },
        "columns": [
            { "data": "id" },
            { "data": "nombre" },
            { "data": "segundonombre" },
            { "data": "primerapellido" }, //Este campo es igual al nombre del campo de la bd
            { "data": "segundoapellido" }, //Este campo es igual al nombre del campo de la bd
            { "data": "cedula" }, //Este campo es igual al nombre del campo de la bd
            { "data": "aplicativo" }, //Este campo es igual al nombre del campo de la bd
          //  { "data": "tiposolicitud" }, //Este campo es igual al nombre del campo de la bd
            
           // { "defaultContent": ``}, //tengo que mirar como me traigo esa data
            { "defaultContent": `<button class="editar btn btn-outline-success fas fa-eye" type="button" data-toggle="modal" data-target="#editar"></button>
                               ` }
        ],
        "language": espanol
    });

    // EDITARR QUE ES INSERTAR
  
    //
    $('#example tbody').on('click','.editar', function(){ // Aqui obtiene los datos que quiere mostrar
      let data = datatable.row($(this).parents()).data();
      $('#nombre_laboratorio').val(data.nombre);
      $('#id').val(data.id);
      //AQUI PUEDE IR CONSULTA Y METERLO EN EL VALOR
      $('#segundonombre').val(data.segundonombre);
      $('#primerapellido').val(data.primerapellido);
      $('#segundoapellido').val(data.segundoapellido);
      $('#tipodocumento').val(data.tipodocumento);
      $('#cedula').val(data.cedula);
      $('#lugarexpedicion').val(data.lugarexpedicion);
      $('#sexo').val(data.sexo);
      $('#telefono').val(data.telefono);
      $('#celular').val(data.celular);
      $('#direccion').val(data.direccion);
      $('#cargo').val(data.cargo);
      $('#supervisor').val(data.supervisor);
      $('#correo').val(data.correo);
      $('#ubicacion_laboral').val(data.ubicacion_laboral);
      $('#dependencia').val(data.dependencia);
      $('#tiposolicitud').val(data.tiposolicitud);
      $('#aplicativo').val(data.aplicativo);
      $('#observaciones').val(data.observaciones);
      $('#observaciones_supervisor').val(data.observaciones_supervisor);
     // $('#id').val(data.id);
    })
    $('#form-editar').submit(e=>{ //Aqui obtiene los datos que quiere editar
      let id =$('#id').val();
      let nombre=$('#nombre_laboratorio').val();
      let segundonombre=$('#segundonombre').val();
      let primerapellido=$('#primerapellido').val();
      let segundoapellido=$('#segundoapellido').val();
      let tipodocumento=$('#tipodocumento').val();
      let cedula=$('#cedula').val();
      let lugarexpedicion=$('#lugarexpedicion').val();
      let sexo=$('#sexo').val();
      let telefono=$('#telefono').val();
      let celular=$('#celular').val();
      let direccion=$('#direccion').val();
      let cargo=$('#cargo').val();//
      let supervisor=$('#supervisor').val();
      let correo=$('#correo').val();
      let ubicacion_laboral=$('#ubicacion_laboral').val();
      let dependencia=$('#dependencia').val();
      let tiposolicitud=$('#tiposolicitud').val();
      let aplicativo=$('#aplicativo').val();
      let observaciones=$('#observaciones').val();//
      let observaciones_supervisor=$('#observaciones_supervisor').val();

      let perfil=$('#perfil').val(); // estos dos son necesarios para generar la notificacion al correo
      let password=$('#password').val(); // estos dos son necesarios para generar la notificacion al correo

      funcion='editar';
      $.post('controlador/AdministraController.php',{id,nombre,segundonombre,primerapellido,segundoapellido,tipodocumento,lugarexpedicion,cedula,aplicativo,tiposolicitud,cargo,observaciones,perfil,password,funcion},(response)=>{
        
      })
      
    })
    $('#example tbody').on('click','.eliminar', function(){
      let data = datatable.row($(this).parents()).data();
      $('#laboratorio_eliminar').html(data.nombre);
      $('#id_laboratorio').val(data.id);
    })
    $('#form-eliminar').submit(e=>{
      let id =$('#id_laboratorio').val();
      funcion='eliminar';
      $.post('controlador/AdministraController.php',{id,funcion},(response)=>{
        
      })
      
    })
} );
let espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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