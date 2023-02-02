<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap.css">
    <link rel="stylesheet" href="lib/datatables.min.css">
    <title>Datatables</title>
</head>
<body>
    <!-- Modal -->
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
                    <label for="">Primer nombre: </label>
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
                    <input type="text" id="observaciones" class="form-control">
                   
                 </div>
               </div>

               <div class="col">
                <div class="form-group">
                  <label for=""><b>Observaciones supervisor:</b></label>
                  <input type="text" id="observaciones_supervisor" class="form-control" placeholder="Digite aqui las observaciones obligatorias">
                 
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

  <!-- EDITARR QUE ES INSERTAR-->
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
          <form id="form-editarr">

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
                <input type="text" id="segundonombre" class="form-control">
                
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
                    <input type="text" id="observaciones" class="form-control">
                   
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
<!-- EDITAR QUE ES INSERTARR-->
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    <div class="container">
       
        <table id="example"class="display table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th> <!-- AGREGUE ESTO-->
                    <th>Segundo apellido</th> <!-- AGREGUE ESTO-->
                    <th>Cedula</th> <!-- AGREGUE ESTO-->
                    <th>Aplicativo</th> <!-- AGREGUE ESTO-->
                    <th>Tipo de solicitud</th>
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
            "url": "controlador/LaboratorioController.php",
            "method": "POST",
            "data":{funcion:funcion}
        },
        "columns": [
            { "data": "id" },
            { "data": "nombre" },
            //{ "data": "segundonombre" },
            { "data": "primerapellido" }, //Este campo es igual al nombre del campo de la bd
            { "data": "segundoapellido" }, //Este campo es igual al nombre del campo de la bd
            { "data": "cedula" }, //Este campo es igual al nombre del campo de la bd
            { "data": "aplicativo" }, //Este campo es igual al nombre del campo de la bd
            { "data": "tiposolicitud" }, //Este campo es igual al nombre del campo de la bd
            
           // { "defaultContent": ``}, //tengo que mirar como me traigo esa data
            { "defaultContent": `<button class="editar btn btn-outline-primary" type="button" data-toggle="modal" data-target="#editar">E</button>
                                 <button class="Aceptar btn btn-outline-success fas fa-user-plus" type="button" data-toggle="modal" data-target="#editarr">I</button>
                                <button class="eliminar btn btn-outline-danger"type="button" data-toggle="modal" data-target="#eliminar">R</button>` }
        ],
        "language": espanol
    });

    // EDITARR QUE ES INSERTAR
    $('#example tbody').on('click','.editarr', function(){ // Aqui obtiene los datos que quiere mostrar
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
     // $('#id').val(data.id);
    })
    $('#form-editarr').submit(e=>{ //Aqui obtiene los datos que quiere editar
      let id =$('#id').val();
      let nombre=$('#nombre_laboratorio').val();
      funcion='editarr';
      $.post('controlador/LaboratorioController.php',{id,nombre,segundonombre,funcion},(response)=>{
        
      })
      
    })


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
     // $('#id').val(data.id);
    })
    $('#form-editar').submit(e=>{ //Aqui obtiene los datos que quiere editar
      let id =$('#id').val();
      let nombre=$('#nombre_laboratorio').val();
      funcion='editar';
      $.post('controlador/LaboratorioController.php',{id,nombre,funcion},(response)=>{
        
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
      $.post('controlador/LaboratorioController.php',{id,funcion},(response)=>{
        
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
</body>
</html>