<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/estilos_login_acceso.css">
    <link rel="icon" href="imgs/logoimsaludrecortado.ico">
    <title>Iniciar Sesion</title>
</head>
<body>
  
        

    
    <div class="imagen">
        <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 200px; text-align: center;">
    </div>



<div class="centrar">
        <div class="centrar1 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <div class="container form-control form-control" >
            <a class="btn btn-warning fas fa-user-lock" href="../../index.php"></a>
            
            <center>
                <h4>Solicitud de usuario</h4> <br>
            </center>
            
            <form  action="../../Servidor/solicitud_usuario.php" method="POST">
            <div class="row">
            
                <div class="col">
                    <label class="TT">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required><br>
                </div>

                <div class="col">
                    <label class="TT">Cargo</label>
                    <input type="text" class="form-control" name="cargo" id="cargo" required><br>
                </div>

                <div class="col">
                    <label class="TT">Fecha final de contrato</label>
                    <input type="date" class="form-control" name="fechafinalcontrato" id="fechafinalcontrato" required><br>
                </div>

            </div>


            <div class="row">
                <div class="col">
                    <label class="TT">Cedula</label>
                    <input type="text" class="form-control" name="cedula" id="cedula" required><br>
                </div>

                <div class="col">
                    <label class="TT">Supervisor</label>
                    <input type="text" class="form-control" name="supervisor" id="supervisor" required><br>
                </div>

                <div class="col">
                    <label class="TT">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required><br>
                </div>

            </div>

            <div class="form-check form-switch">
                <label class="form-check-label" for="rol">Administrador</label>
                <input class="form-check-input" type="checkbox" role="switch" id="rol" name="rol" value="ADMINISTRADOR">
                
            </div>
            <div class="form-check form-switch">
                <label class="form-check-label" for="rol">Supervisor</label>
                <input class="form-check-input" type="checkbox" role="switch" id="rol" name="rol" value="SUPERVISOR">
                
            </div>
            

            <div class="boton">
                <button type="submit" class="text-center btn btn-success" onclick="envio();">Solicitar</button>
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

        








<!---->


<script>
      function envio(){
        alert("ENVIO EXITOSO");
      }
     
     </script>
        
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

