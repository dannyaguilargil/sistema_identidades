<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
     <!--<link rel="stylesheet" href="../css/estilos_login_acceso.css"> PRACTICA SCSS-->
    <link rel="stylesheet" href="../scss/login_acceso.scss">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Iniciar Sesion</title>
</head>
<body>
  <!--



-->
        

    
    <div class="imagen">
        <img  src="../imgs/logocompleto.png"  alt="" style="width: 200px; text-align: center;">
    </div>



<div class="centrar">
        <div class="centrar1 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <div class="container form-control form-control" >
            <a class="btn btn-warning fas fa-user-lock" href="../../index.php"></a>
            
            <center>
                <h5>Solicitud de usuario</h5> <br>
            </center>
            
            <form  action="../../Servidor/solicitud_usuario.php" method="POST">
            <div class="row">
            
                <div class="col">
                    <label class="">Primer Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required><br>
                </div>

                <div class="col">
                    <label class="">Segundo Nombre</lael>
                    <input type="text" class="form-control" name="segundonombre" id="segundonombre"><br>
                </div>

                <div class="col">
                    <label class="">Primer apellido</label>
                    <input type="text" class="form-control" name="primerapellido" id="primerapellido" required><br>
                </div>


                <div class="col">
                    <label class="">Segundo apellido</label>
                    <input type="text" class="form-control" name="segundoapellido" id="segundoapellido"><br>
                </div>

                <div class="col">
                <label class="">Cargo o N° contrato</label>
                <input type="text" class="form-control" name="cargo" id="cargo" required><br>
            </div>
            </div>


           
            <div class="row">
            
          

         
            <div class="col">
                    <label class="">Email personal</label>
                    <input type="email" class="form-control" name="email" id="email" required><br>
                </div>

           

            
        

                <div class="col">
                    <label class="">Supervisor o jefe inmediato</label>
                    <input type="text" class="form-control" name="supervisor" id="supervisor" required><br>
            </div>




            <div class="col">
                <label for="" class="emerge">Tipo de documento:</label> <br>
                <select name="tipodocumento" id="tipodocumento" class="emerge">
                  <option value="CC" class="emerge" selected>CC</option>
                  <option value="CE" class="emerge">CE</option>
                  <option value="PASAPORTE" class="emerge">PASAPORTE</option>
                  <option value="RESIDENCIA" class="emerge">RESIDENCIA</option>
                </select>
            </div>

            
            <div class="col">
                    <label class="">Numero de documento</label>
                    <input type="text" class="form-control" name="cedula" id="cedula" required><br>
            </div>
            
          

        </div>


    

            <div class="row">
                


                <div class="col">
                <div class="boton">
                <button type="submit" class="fas fa-user-md text-center btn btn-success" onclick="envio();">Solicitar</button>
                </div>
                </div>

            </div>

            

           
            <!--
             <h3 class="text-center">Iniciar sesion</h3> 
            <div class="textoI">
            <label class="TT">Usuario</label>
            <input type="text" class="form-control" name="nombre_usuario1" id="nombre_usuario1"><br>
            <label class="TT">Contraseña</label>
            <input type="password" class="form-control" name="Contrasena1" id="Contrasena1"><br>
            </div>
            <div class="textoI1">
            
            <div class="boton">
            <button type="submit" class="text-center btn btn-success" onclick="inicioS()">Iniciar sesion</button>
            </div>
            <p><a  class="TT1" href="/Cliente/gestion-usuarios/Registro.html" id="">Solicitar usuario</a></p>
            </div>
          

            -->
        </form>
          </div>
        </div>

    

      </div>

        


<script>
    //script para autocompletar el campo supervisor
$(document).ready(function() {
        console.log("entro al jquery");

$('#supervisor').autocomplete({
  source: function(request, response){
    $.ajax({
      url:"supervisor.php",
          dataType:"json",
      data:{q:request.term},
      success: function(data){
        response(data);
      }

    });
  },
  minLength: 1,
  select: function(event,ui){
    alert("Selecciono: "+ ui.item.label);
  }
      

});

});

</script>





<!---->


<script>
      function envio(){
        //swal("Click on either the button or outside the modal.")
//.then((value) => {
//  swal(`The returned value is: ${value}`);
//});

alert("SE ENVIO CORRECTAMENTE, SE NOTIFICARA AL ADMINISTRADOR");
      }
     
     </script>
        

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

