
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
                  Sistemas
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="administra.php">Pendientes</a></li>
                  <li><a class="dropdown-item" target="_blank" href="sistemas_solicitud_supervisor.php">Solicitud</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" target="_blank" href="notificar_sistema.php">Notificar</a></li>
                </ul>
              </li>

            
              <li class="nav-item dropdown">
                <a class="fas fa-id-card nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Paz y salvo
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="pazysalvo_admin.php">Pendientes</a></li>
                  <li><a class="dropdown-item" target="_blank" href="sistemas_solicitud_supervisor.php">Solicitud</a></li>
                </ul>
              </li>
                

              <li class="nav-item dropdown">
                <a class="fas fa-user-cog nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Usuarios
                </a>
                <ul class=" dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="usuarios_pendientes.php">Pendientes</a></li>
                  <li><a class="dropdown-item" href="usuarios.php">Registrados</a></li>
                </ul>
              </li>



            </ul>
            <a class="far fa-user-cog navbar-brand " href="perfil_admin.php">Mi perfil</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>

          </div>
        </div>
      </nav>
      <!--NAVBAR-->
                    
</header>
<!-- INSERCCIONES -->



<!-- FIN DE MODALES --> 
<!--Modal de inserccion SUCCESS -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel"><b>Agregar un usuario</b></h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
       <form  action="../../Servidor/registrar_usuario.php" method="POST" enctype="multipart/form-data" >

        <!--
         <div class="mb-1">
           <label for="id" class="col-form-label">Id</label> <br> 
           <input type="text" class="form-control-sm" id="id"  name="id" disabled> 
         </div> -->

         <!-- AQUI QUIERO AGREGAR UN USUARIO CON TODO EL NOMBRE-->
         <div class="mb-1">
           <label for="nombrer" class="emerge col-form-label">Primer nombre:</label> <br>
           <input type="text" class="emerge form-control-sm" id="nombrer" name="nombrer" required> 
         </div>
         <div class="mb-1">
           <label for="segundonombrer" class="emerge col-form-label">Segundo Nombre:</label> <br>
           <input type="text" class="emerge form-control-sm" id="segundonombrer" name="segundonombrer" required> 
         </div>
         <div class="mb-1">
           <label for="primerapellidor" class="emerge col-form-label">Primer apellido:</label> <br>
           <input type="text" class="emerge form-control-sm" id="primerapellidor" name="primerapellidor" required> 
         </div>
         <div class="mb-1">
           <label for="segundoapellidor" class="emerge col-form-label">Segundo apellido:</label> <br>
           <input type="text" class="emerge form-control-sm" id="segundoapellidor" name="segundoapellidor" required> 
         </div>
         <div class="mb-1">
           <label for="cargor" class="emerge col-form-label">Cargo o N° de contrato:</label> <br>
           <input type="text" class="emerge form-control-sm" id="cargor" name="cargor" required>
         </div>
         <div class="mb-1">
           <label for="fechafinalcontrator" class="emerge col-form-label">Fecha final de contrato:</label><br>
           <input type="date" class="emerge form-control-sm" id="fechafinalcontrator" name="fechafinalcontrator" required>
         </div>
        
         <div class="mb-1">
         <div class="col">
                <label for="tipodocumentor" class="emerge">Tipo de documento:</label> <br>
                <select name="tipodocumentor" id="tipodocumentor" class="emerge">
                  <option value="CC" class="emerge" selected>CC</option>
                  <option value="CE" class="emerge">CE</option>
                  <option value="PASAPORTE" class="emerge">PASAPORTE</option>
                  <option value="RESIDENCIA" class="emerge">RESIDENCIA</option>
                </select>
         </div>
        </div>

         <div class="mb-1">
         <label for="cedular" class="emerge col-form-label">Cedula:</label> <br>
           <input type="number" class="emerge" id="cedular" name="cedular" required class="form-control-sm"> 
         </div>
         <div class="mb-1">
           <label for="supervisorr" class="emerge col-form-label">Supervisor:</label><br>
           <input type="text"  id="supervisorr" name="supervisorr"  class="emerge form-control-sm" required> 
         </div>

         <div class="mb-1">
         <label for="emailr" class="emerge col-form-label">Email</label><br>
         <input type="email" class="emerge col-form-label" id="emailr" name="emailr" class="form-control-sm"  required>
         </div>


         <div class="mb-1">
         <label for="rolr" class="">Rol</label> <br>
                <select name="rolr" id="rolr" class="">
                  <option value="" selected class="">NORMAL</option>
                  <option value="SUPERVISOR" class="">SUPERVISOR</option>
                  <option value="ADMINISTRADOR" class="">ADMINISTRADOR</option>
                </select>
          </div>


     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-success">Insertar</button>
       
     </div>
     </form>
     
   </div>
  
 </div>
 

</div>

 
<!--FIN DE MODAL DE INSERCCION -->



<div class="imagen">
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 120px; text-align: center;height: 50px">
   <button style="padding: 5px;margin: 3px" type="button" class="fas fa-user-plus modals btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo"></button> 

    </div>


    <!-- Modal  DE ACTUALIZACION COMPROBADO-->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Informacion general del colaborador</h5>
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
                <label for="tipodocumento"><b>Tipo de documento:</b> </label>
                <input type="text" id="tipodocumento" class="form-control">
                
                 </div>
              </div>


              <div class="col">
                <div class="form-group">
                <label for="cedula"><b>Cedula</b></label>
                <input type="text" id="cedula" name="cedula" class="form-control">
                
                 </div>
              </div>
              </div>
             

              
            


              <div class="row">
              

              <div class="col">
                <div class="form-group">
                <label for="cargo">N° contrato o cargo</label>
                <input type="text" id="cargo" class="form-control">
                
                 </div>
              </div>

              <div class="col">
                  <div class="form-group">
                    <label for="supervisor">Supervisor: </label>
                    <input type="text" id="supervisor" class="form-control">
                   
                 </div>
               </div>
               
               <div class="col">
                <div class="form-group">
                  <label for="email">Correo: </label>
                  <input type="text" id="email" class="form-control">
                 
               </div>
             </div>
              </div>

             <div class="row">
              <div class="col">
              <label for="">Rol: </label>
              <input type="text" name="rol" id="rol" class="form-control">
              </div>

              <div class="col">
              <!-- PASSWORD-->
              </div>

              <div class="col">
             
              </div>
             </div>

             
   
          

           

             

    

           
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- EDITARR QUE ES INSERTAR
<div class="modal fade" id="editarr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Informacion general del colaborador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-editarr" action="" method="">

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Primer nombre: </label>
                    <input type="text" id="nombre_laboratorio" class="form-control">
                    <input type="text" id="id">
                 </div>
               </div>



              <div class="col">
                <div class="form-group">
                <label for="">Segundo nombre: </label>
                <input type="text" id="segundonombre" name="segundonombre" class="form-control">
                
                 </div>
              </div>


              <div class="col">
                <div class="form-group">
                <label for="primerapellido">Primer apellido: </label>
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
                <label for="">Tipo de documento: </label>
                <input type="text" id="tipodocumento" class="form-control">
                
                 </div>
              </div>


              <div class="col">
                <div class="form-group">
                <label for="">Cedula</label>
                <input type="text" id="cedula" class="form-control">
                
                 </div>
              </div>
              </div>
             

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Lugar de expedicion: </label>
                    <input type="text" id="lugarexpedicion" class="form-control">
                   
                 </div>
               </div>



              <div class="col">
                <div class="form-group">
                <label for="">Sexo: </label>
                <input type="text" id="sexo" class="form-control">
                
                 </div>
              </div>


              <div class="col">
                <div class="form-group">
                <label for="">Telefono</label>
                <input type="text" id="telefono" class="form-control">
                
                 </div>
              </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Celular: </label>
                    <input type="text" id="celular" class="form-control">
                   
                 </div>
               </div>



              <div class="col">
                <div class="form-group">
                <label for="">Direccion: </label>
                <input type="text" id="direccion" class="form-control">
                
                 </div>
              </div>


              <div class="col">
                <div class="form-group">
                <label for="">Cargo</label>
                <input type="text" id="cargo" class="form-control">
                
                 </div>
              </div>
   
            </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Supervisor: </label>
                    <input type="text" id="supervisor" class="form-control">
                   
                 </div>
               </div>

               <div class="col">
                <div class="form-group">
                  <label for="">Correo: </label>
                  <input type="text" id="correo" class="form-control">
                 
               </div>
             </div>
             <div class="col">
              <div class="form-group">
                <label for="">Ubicacion laboral: </label>
                <input type="text" id="ubicacion_laboral" class="form-control">
               
             </div>
           </div>

              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Dependencia: </label>
                    <input type="text" id="dependencia" class="form-control">
                   
                 </div>
               </div>

               <div class="col">
                <div class="form-group">
                  <label for="">Tipo de solicitud: </label>
                  <input type="text" id="tiposolicitud" class="form-control">
                 
               </div>
             </div>
             <div class="col">
              <div class="form-group">
                <label for="">Aplicativo: </label>
                <input type="text" id="aplicativo" class="form-control">
               
             </div>
           </div>

              </div>

             

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Observaciones del solicitante: </label>
                    <input type="text" id="observaciones" class="form-control" required>
                   
                 </div>
               </div>

               <div class="col">
                <div class="form-group">
                  <label for=""><b>Observaciones supervisor:</b></label>
                  <input type="text" id="observaciones_supervisor" class="form-control" placeholder="Digite aqui las observaciones obligatorias" required>
                 
               </div>
             </div>
          
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Firma: </label>
                    <input type="text" id="firma" class="form-control">
                   
                 </div>
               </div>

               <div class="col">
                
               </div>
              </div>
           
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Aprobarlo</button>
        </form>
        </div>
      </div>
    </div>
  </div>
< EDITAR QUE ES INSERTARR-->
  <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario del sistema</h5>
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
       
        <table id="example"class="display table table-hover text-nowrap">
            <thead>
                <tr>
                
                    <th>Nombre</th>
                    <th>Primer apellido</th> <!-- AGREGUE ESTO-->
                    <th>Segundo apellido</th> <!-- AGREGUE ESTO-->
                    <th>Cargo</th> <!-- AGREGUE ESTO-->
                   <!-- <th>Tipo de documento</th> -->
                    <th>Cedula</th>
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
            { "defaultContent": `<button class="editar btn btn-outline-primary fas fa-user-edit" type="button" data-toggle="modal" data-target="#editar"></button>
                                <button class="eliminar btn btn-outline-danger fas fa-user-times"type="button" data-toggle="modal" data-target="#eliminar"></button>` }
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