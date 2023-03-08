
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

    <link rel="stylesheet" href="../css/solicitud_usuario.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Gestion de supervisor</title>
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
                 <span style="font-family: Kodchasan;">Sistemas</span> 
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="far fa-user-crown dropdown-item" href="administra.php"> <span style="font-family: Lato">Pendientes Administrador </span> </a></li>
                <li><a class="fas fa-user-hard-hat dropdown-item" href="supervisa.php"> <span style="font-family: Lato"> Pendientes Supervisor </span> </a></li>
                <li><a class="fal fa-vote-yea  dropdown-item" target="_blank" href="sis_aprobados.php"><span style="font-family: Lato">Sistemas aprobados </span> </a></li>
                <li><a class="far fa-user-md-chat dropdown-item" target="_blank" href="sistemas_solicitud_usuario.php"><span style="font-family: Lato"> Solicitud </span></a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="fal fa-comment-check dropdown-item" target="_blank" href="notificador.php"> <span style="font-family: Lato;"> Historial del notificador</span></a></li>
                </ul>
              </li>

            
              <li class="nav-item dropdown">
                <a class="fas fa-id-card nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 <span style="font-family: Kodchasan;"> Paz y salvo</span>
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="far fa-file-check dropdown-item" href="pazysalvo_adm.php"><span style="font-family: Lato"> Pendientes </span></a></li>
                <li><a class="fal fa-file-pdf dropdown-item" target="_blank" href="paprueba.php"><span style="font-family: Lato" > Aprobados </span></a></li>
                </ul>
              </li>
                

              <li class="nav-item dropdown">
                <a class="fas fa-user-cog nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 <span style="font-family: Kodchasan;">Usuarios</span> 
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="far fa-user-secret dropdown-item" href="usuario_pendiente.php"> <span style="font-family: Lato"> Pendientes </span></a></li>
                <li><a class="fal fa-users dropdown-item" href="usuarios.php"> <span style="font-family: Lato">  Registrados </span></a></li>
                </ul>
              </li>



            </ul>
            <a class="far fa-user-cog navbar-brand " href="perfil.php"> <span style="font-family: Kodchasan;"> Mi perfil </span></a>
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
              <h5 style="Font-family: Kodchasan;"> Historial de notificacion</h5>
              </center>

    <!-- Modal  DE ACTUALIZACION COMPROBADO-->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <span style="colore: green;"> Reenviar notificacion</span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-editar">

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for=""><b>Primer nombre:</b> </label>
                    <input type="text" id="nombre_laboratorio" class="form-control">
                    <!--<input type="hidden" id="cedula"> -->
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
                <label for="primerapellido"><b>Primer apellido:</b> </label>
                <input type="text" id="primerapellido" class="form-control">
                
                 </div>
              </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Segundo apellido: </label>
                    <input type="text" id="segundoapellido" class="form-control">
                   
                 </div>
               </div>



               <div class="col">
                <div class="form-group">
                  <label for="email">Correo a notificar: </label>
                  <input type="text" id="email" class="form-control" style="color: green;">
                 
               </div>
             </div>




</div>

<div class="row">
    
    <div class="col">
      <div class="form-group">
      <label for="cedula"><b>Cedula</b></label>
      <input type="text" id="cedula" name="cedula" class="form-control">
      
    </div>
    </div>

    <div class="col">
    <div class="form-group">
          <label for="supervisor">Supervisor: </label>
          <input type="text" id="supervisor" class="form-control">
         
    </div>
    </div>


    </div>
              <hr>
            


           

          
              <h6><b>Informacion del aplicativo creado</b></h6>
             <div class="row">
              <div class="col">
              <label for="">Perfil o usuario asignado: </label>
              <input type="text" name="nombre" id="nombre" class="form-control">
              </div>

              <div class="col">
              <label for="">Contrasena: </label>
              <input type="text" name="nombre" id="nombre" class="form-control">
              </div>

              <div class="col">
              <label for="">Aplicativo:</label> <br>
                <select name="aplicativo" id="aplicativo" class="form-control">
                  <option value="ALDEAMO SMS" class="">ALDEAMO SMS</option>
                  <option value="ALMERA" class="">ALMERA</option>
                  <option value="EMAIL" class="">EMAIL</option>
                  <option value="KUBAPP" class="" selected>KUBAPP</option>
                  <option value="HIKCENTRAL" class="">HIKCENTRAL</option>
                  <option value="NUBE" class="">NUBE</option>
                  <option value="ORTHANC" class="">ORTHANC</option>
                  <option value="MESA DE AYUDA" class="">MESA DE AYUDA</option>
                  <option value="AULA VIRTUAL" class="">AULA VIRTUAL</option>
                  <option value="TNS" class="">TNS</option>
                  <option value="KUBAPP" class="">OTRO</option>
                  <option value="ANNARLARB" class="">ANNARLAB</option>
                </select> 
              </div>
             </div>
          
           <div class="row">
            <div class="col">
              <label for="">Mensaje:</label>
              <input type="text" class="form-control" value="Se ha creado su usuario del aplicativo: $aplicativo con el usuario: $usuario y contraseña: $contraseña">
            </div>
           </div>


</div>


        


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="fal fa-user-chart btn btn-outline-success">Enviar</button>
        </form>
        </div>
      </div>
    </div>
  </div>



    <div class="container">
       
        <table id="example"class="display table table-hover text-nowrap table-bordered">
            <thead>
                <tr>
                
                    <th>Nombre</th>
                    <th>Primer apellido</th> <!-- AGREGUE ESTO-->
                    <th>Segundo apellido</th> <!-- AGREGUE ESTO-->
                    <th>Cargo</th> <!-- AGREGUE ESTO-->
                   <!-- <th>Tipo de documento</th> -->
                    <th>Cedula</th>
                    <th>Notificar</th>
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
            "url": "controlador/UsuariosController.php",
            "method": "POST",
            "data":{funcion:funcion}
        },
        "columns": [
            //{ "data": "id" },
            { "data": "nombre" },
            //{ "data": "segundonombre" },
            { "data": "primerapellido" }, //Este campo es igual al nombre del campo de la bd
            { "data": "segundoapellido" }, //Este campo es igual al nombre del campo de la bd
            { "data": "cargo" }, //Este campo es igual al nombre del campo de la bd
         //   { "data": "tipodocumento" }, //Este campo es igual al nombre del campo de la bd
            { "data": "cedula" }, //Este campo es igual al nombre del campo de la bd
            
           // { "defaultContent": ``}, //tengo que mirar como me traigo esa data
            { "defaultContent": `<button class="editar btn btn-outline-success fal fa-user-chart" type="button" data-toggle="modal" data-target="#editar"></button>
                                ` }
        ],
        "language": espanol
    });

    // EDITARR QUE ES INSERTAR
  
    //
    $('#example tbody').on('click','.editar', function(){ // Aqui obtiene los datos que quiere mostrar
      let data = datatable.row($(this).parents()).data();
      $('#nombre_laboratorio').val(data.nombre);
      //$('#id').val(data.id);
      //AQUI PUEDE IR CONSULTA Y METERLO EN EL VALOR
      $('#segundonombre').val(data.segundonombre);
      $('#primerapellido').val(data.primerapellido);
      $('#segundoapellido').val(data.segundoapellido);
      $('#cargo').val(data.cargo);
      $('#email').val(data.email);
      $('#supervisor').val(data.supervisor);
      $('#cedula').val(data.cedula);
      $('#tipodocumento').val(data.tipodocumento);
      $('#rol').val(data.rol);
      $('#password').val(data.password);
      $('#fechafinalcontrato').val(data.fechafinalcontrato);
 
  
    })
    $('#form-editar').submit(e=>{ //Aqui obtiene los datos que quiere editar
      let cedula =$('#cedula').val();
      let nombre=$('#nombre_laboratorio').val();
      let segundonombre=$('#segundonombre').val();
      funcion='editar';
      $.post('controlador/UsuariosController.php',{cedula,nombre,segundonombre,funcion},(response)=>{
        
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
      $.post('controlador/UsuariosController.php',{cedula,funcion},(response)=>{
        
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