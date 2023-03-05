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
  
//VALIDACION DEL ROL Y NOMBRE DE USUARIO POR SEGURIDAD

?>


<!DOCTYPE html>
<!--SOLICITUD_USUARIO A LA BASE DE DATOS-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kodchasan">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">    
    <link rel="stylesheet" href="../css/solicitud_usuario.css">
    <link rel="icon" href="../imgs/escudito.ico">
    <title>Solicitar sistema</title>


    <script>
  //SCRIPT PARA LA SELECCION DE LA FIRMA VALIDADA CON EL APLICATIVO KUBAPP
  function aplicativos(){

  
  var aux='KUBAPP';
  var aplicativo=document.getElementById("aplicativo");
  var display=aplicativo.options[aplicativo.selectedIndex].text;

  if(aplicativo.value==="KUBAPP"){
    console.log("ES IGUAL");
    const $firma = document.querySelector("#firma");
    $firma.style.display = "";
    
  }
  else{
    console.log(aplicativo.value);
    const $firma = document.querySelector("#firma");
    $firma.style.display = "none";
    $("firma" ).removeClass("firma");// remover la clase para pasar observaciones al lado izquierdo
  }
}


</script>


</head>
<body>
  
    <header class="">
      <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">
              <a class="fas fa-phone-laptop navbar-brand" href="sistemas_solicitud_usuario.php"><span style="font-family: Kodchasan;"> Sistemas</span></a>
              <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="far fa-user-cog nav-link" aria-current="page" href="perfil.php"> <span style="Font-family: Kodchasan;"> Mi perfil </span></a>
                  </li>
                  <li class="nav-item">
                    <a class="fas fa-id-card nav-link" href="paz.php" disabled> <span style="font-family: Kodchasan;"> Paz y salvo</span></a>
                  </li>
                </ul>
              </div>
            

            
              <div class="imagen">
    <img  src="../imgs/logocompleto.png"  alt="" style="width: 120px; text-align: center;height: 50px">
    </div>

              <div class="user">
              
                <!-- ANIMACION DEL TEXTO-->
                <span class="typed"></span>  <?php echo $_SESSION['nombre'];
               
                ?>
              </div>

          

              <!-- EJEMPLO DE MODO OSCURO -->
              <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch"  id="checkbox" onclick="setDarkMode();">
              <label class="fas fa-moon form-check-label" for="checkbox"></label>
               </div>
               



       
            <a class="btn btn-light fas fa-sign-out-alt" href="../../Servidor/logout.php"></a>
            </div>
          
          </nav>
         
                    
    </header>


    <h4 class="centrar titulito" style="font-family: Kodchasan">Solicitud de sistemas</h4>
<div class="centrar">
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <div class="container form-control form-control" >
         


            <form action="../../Servidor/registrar_solicitud_sistema.php" method="POST" id="form" autocomplete="OFF">


                <!--
                  CONSULTAS PARA EL FORMULARIO 
                  $resultado = $conn->query($sql);
                  $num_rows = $resultado->num_rows;


                  -->
                <?php 
                //CODIGO PHP DE CONSULTAS
                //PRIMERO HAGO LA VALIDACION CON LA CEDULA
                $consulta="SELECT * from usuarios_registrados WHERE nombre = '$tomador';";
                $resultado=mysqli_query($mysqli,$consulta);
                        if($resultado){ while($row = $resultado->fetch_array()){
                            $nombrer = $row['nombre'];
                            $segundonombrer = $row['segundonombre'];
                            $primerapellidor = $row['primerapellido'];
                            $segundoapellidor = $row['segundoapellido'];
                            $tipodocumentor = $row['tipodocumento'];
                            $cedular = $row['cedula'];
                           // $cedular = $row['lugarexpedicion'];
                           // $telefonor = $row['telefono'];
                            $cargor = $row['cargo'];
                            $supervisorr = $row['supervisor'];
                            $emailr = $row['email'];
                         
              
                          }
                    
                        } 
                ?>

                <!-- SEGUNDA CONSULTA DE PHP SOLO PARA TRERME LA FECHA FINAL DE CONTRATO -->


                <fieldset><span style="font-family: Kodchasan">Informacion general del colaborador</span></fieldset> 
              <div class="row">

                <div class="col">
                <label for="nombre" class="emerge"><b>Primer Nombre:</b></label> <br>
                <input type="text" name="nombre" id="nombre" class="emerge" value="<?php echo $nombrer?>">
                </div>
                
                <div class="col">
                <label for="segundonombre" class="emerge">Segundo Nombre:</label> <br>
                <input type="text" name="segundonombre" id="segundonombre" class="" value="<?php echo $segundonombrer?>" placeholder="Digite segundo apellido">
                </div>

                <div class="col">
                <label for="primerapellido" class="emerge"><b>Primer apellido:</b></label> <br>
                <input type="text" name="primerapellido" id="primerapellido" class="emerge" value="<?php echo $primerapellidor?>"> 
                </div>

                <div class="col">
                <label for="segundoapellido" class="emerge">Segundo apellido:</label> <br>
                <input type="text" name="segundoapellido" id="segundoapellido" class="emerge" placeholder="Digite segundo apellido" value="<?php echo $segundoapellidor?>">
                </div>

              </div>
                

              <div class="row">

              <div class="col">
                <label for="" class="emerge"><b>Tipo de documento:</b></label> <br>
                <select name="tipodocumento" id="tipodocumento" class="emerge">
                  <option value="CC" class="emerge" selected>CC</option>
                  <option value="CE" class="emerge">CE</option>
                  <option value="PASAPORTE" class="emerge">PASAPORTE</option>
                  <option value="RESIDENCIA" class="emerge">RESIDENCIA</option>
                </select>
                </div>

                <div class="col">
                <label for="cedula" class="emerge"><b>Cedula:</b></label> <br>
                <input type="number" name="cedula" id="cedula" class="emerge" value="<?php echo $cedular?>"> 
                </div>
                <div class="col">
                <label for="lugarexpedicion" class="emerge"><b>Lugar  de expedicion:</b></label> <br>
                <input type="text" name="lugarexpedicion" id="lugarexpedicion" class="emerge" placeholder="Digite Lugar expedicion" required >
                </div>

                <div class="col">
                <label for="sexo" class="emerge"><b>Sexo:</b></label> <br>
                <select name="sexo" id="sexo" class="emerge">
                  <option value="M" class="emerge">M</option>
                  <option value="F" selected class="emerge">F</option>
                </select> 
                </div>

</div>

                <div class="row">
                <div class="col">
                <label for="telefono" class="emerge">Telefono fijo:</label> <br>
                <input type="text" name="telefono" id="telefono" class="emerge" placeholder="Digite telefono fijo" required> 
                </div>
                
                <div class="col">
                <label for="celular" class="emerge"><b> Celular:</b></label> <br>
                <input type="number" name="celular" id="celular" class="emerge" placeholder="Digite celular">
                </div>

                <div class="col">
                <label for="direccion" class="emerge">Direccion:</label> <br>
                <input type="text" id="direccion" name="direccion" class="emerge" required placeholder="Digite direccion de residencia">
                </div>

                <div class="col">
                <label for="cargo" class="emerge"><b>Cargo o N° de contrato:</b></label> <br>
                <input type="text" name="cargo" id="cargo" class="emerge" value="<?php echo $cargor ?>">  
                </div>
                </div>
            
                <div class="row">
                
                <div class="col">
                <label for="tarjetaprofesional" class="">Tarjeta profesional</label> <br>
                <input type="text" name="tarjetaprofesional" id="tarjetaprofesional"  placeholder="Digite tarjeta profesional">
                </div>


                <div class="col">
                <label  for="correo" class="emerge"><b>Correo personal:</b></label> <br>
                <input type="email" name="correo" id="correo" class="emerge" value="<?php echo $emailr?>" placeholder="Digite correo personal"> 
                </div>


                <div class="col">
                <label for="ubicacion_laboral" class="emerge"><b>Ubicacion laboral:</b></label><br>
                <input type="text" name="ubicacion_laboral" id="ubicacion_laboral" class="emerge" placeholder="Ubicacion laboral o area"> 
                </div>

                <div class="col">
                <label for="dependencia" class="emerge"><b>Dependencia o servicio:</b></label><br>
                <input type="text" name="dependencia" id="dependencia" class="emerge" placeholder="Dependencia o servicio"> 
                </div>

                </div>


                <div class="row">
               

                <div class="col">
                <label for="sede" class="emerge">Sede:</label> <br>
                <input type="text" name="sede" id="sede" class="emerge" value="" placeholder="Digite sede UBA o IPS">
                <ul class="list"></ul>

                </div>
               
                <div class="col">
                <label for="supervisor" class="emerge"><b>Supervisor o jefe inmediato:</b></label> <br>
                <input type="text" name="supervisor" id="supervisor" class="emerge" value="<?php echo $supervisorr?>">
                </div>



                <div class="col">
                  
                  <label for="" class=""><b>Fecha final de contrato</b></label> <br>
                  <input type="date" name="observaciones" id="observaciones" class="" placeholder="Digite para que requiere el permiso del sistema?" required> 
                  
                </div>

                <div class="col">

                </div>
                 
              
              
                </div>

                
             
                <hr>
                <h6><b style="font-family: Kodchasan">Sistema de informacion requerido</b></h6> 
                <div class="row">

                <div class="col">
                <label for="tiposolicitud" class=""> <span style="font-family: Lato;"></span> Tipo de solicitud</label> <br>
                <select name="tiposolicitud" id="tiposolicitud" class="form-control">
                  <option value="CREAR" class="form-control">CREAR</option>
                  <option value="ACTUALIZAR" selected class="form-control">ACTUALIZAR</option>
                  <option value="ELIMINAR" class="form-control">ELIMINAR</option>
                  <option value="CONSULTAS" class="form-control">CONSULTAS</option>
                 
                </select>
                </div>


                        <!--CONDICIONAL DEL APLICATIVO SI SELECCIONA KUB APP-->

                     


                <div class="col aplica" id="aplica">
                <label for="">Aplicativo</label> <br>
                <select name="aplicativo" id="aplicativo" class="form-control" onchange="aplicativos();">
                  <option value="ALDEAMO SMS" class="form-control">ALDEAMO SMS</option>
                  <option value="ALMERA" class="form-control">ALMERA</option>
                  <option value="EMAIL" class="form-control">EMAIL</option>
                  <option value="KUBAPP" class="form-control" selected>KUBAPP</option>
                  <option value="HIKCENTRAL" class="form-control">HIKCENTRAL</option>
                  <option value="NUBE" class="form-control">NUBE</option>
                  <option value="ORTHANC" class="form-control">ORTHANC</option>
                  <option value="MESA DE AYUDA" class="form-control">MESA DE AYUDA</option>
                  <option value="AULA VIRTUAL" class="form-control">AULA VIRTUAL</option>
                  <option value="TNS" class="form-control">TNS</option>
                  <option value="OTRO" class="form-control">OTRO</option>
                  <option value="ANNARLARB" class="form-control">ANNARLAB</option>
                </select> 

                 </div>
               
           

<div class="col firma" id="firma">
                <label for="firma" class="">Adjunte firma fondo blanco</label>
                <input type="file" name="firma" id="firma" class="form-control" placeholder="Seleccione" value="NO REQUIERE"> 
          
</div>


                <div class="col">
                <label for="observaciones" class=""><b>Observaciones</b></label>  <br>
                <input style="color: green; height: 40px;" type="text" name="observaciones" id="observaciones" class="obs" placeholder="Digite para que requiere el permiso del sistema?" required> 
                </div>


                    
<br> <br> <br>


                <div class="row">

                <div class="col">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required>
                    <label class="form-check-label" for="flexCheckChecked">
                      Acepto tratamiento de datos  
                       <a class="btn btn-white fad fa-eye botonsito" href="https://www.imsalud.gov.co/web/gobierno-digital/politicas-de-proteccion-de-datos-personales/"   target="_blank" ></a>
                    </label> <br>
                   
                </div>
                </div>


                <div class="col">
                <button class="btn btn-outline-primary botonsito">Agregar otro</button>
                </div>

                <div class="col">
                <button class="btn btn-outline-success botonsito" type="submit" onclick="envio();" name="solicitar" id="solicitar">Solicitar</button>
                </div>



               


                </div>

                



                </div>

              

            </form>



          </div>
          </div>
        </div>

      
</div>






     <script>
      function envio(){
          console.log("se ejecuto envio alerta 1");
          const nombre = document.getElementById("nombre");
          const form = document.getElementById("form")
        //  const tipodocumento = document.getElement("tipodocumento")
        //  const cedula = document.getElementById("cedula")
          const lugarexpedicion = document.getElementById("lugarexpedicion")
        //  const sexo = document.getElementById("sexo")
        const telefono = document.getElementById("telefono")
        const celular = document.getElementById("celular")
        const direccion = document.getElementById("direccion")
        //  const cargo = document.getElementById("cargo")
        //  const supervisor = document.getElementById("supervisor")
        //  const correo = document.getElementById("correo")
        const ubicacion_laboral = document.getElementById("ubicacion_laboral")
        //  const tiposolicitud = document.getElementById("tiposolicitud")
        //  const aplicativo = document.getElementById("aplicativo")
        const observaciones = document.getElementById("observaciones")

          form.addEventListener("submit", e=>{
         
            if(nombre.value.length<3){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "DIGITE NOMBRE COMPLETO!", "error");
             
            }
            else if(lugarexpedicion.value.length<4){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "DIGITE LUGAR DE EXPEDICION!", "error");
             
            }
            else if(telefono.value.length<5){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "DIGITE TELEFONO!", "error");
             
            } 
            else if(celular.value.length<5){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "DIGITE CELULAR!", "error");
             
            } else if(direccion.value.length<7){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "DIGITE DIRECCION COMPLETA!", "error");
             
            }else if(ubicacion_laboral.value.length<4){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "DIGITE UBICACION LABORAL!", "error");
             
            }
            else if(observaciones.value.length<5){
              console.log("entro al condicional")
              e.preventDefault()
              swal("NO ENVIADO!", "DIGITE COMO MINIMO 10 CARACTERES EN OBSERVACIONES!", "error");
             
            }
          
            else{
              alert("ENVIADO CORRECTAMENTE SE LE NOTIFICARA AL ADMINISTRADOR");
              
            }
          })
      
        

        
      }


     </script>


      <script>
        //setDarkMode
        console.log("se ejecuto script")
        if(localStorage.getItem('theme') == 'dark'){
          setDarkMode();

            if(document.getElementById('checkbox').checked){
              localStorage.setItem('checkbox', true)
            }
        }


        function setDarkMode(){
          console.log("se ejecuto script 2")
          let isDark = document.body.classList.toggle('darkmode');


          if(isDark){
            setDarkMode.checked = true;
            localStorage.setItem('theme', 'dark');
            document.getElementById('checkbox').setAttribute('checked', 'checked');
          }
          else{
            setDarkMode.checked = true;
            localStorage.removeItem('theme', 'dark');
          }
        }
      </script>



    <script src="../js/apps.js"></script>
    <!--  <script src="../js/peticiones.js"></script> --PRUEBA DE AUTOCOMPLETE -->
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="../js/main.js"></script>

      <script src="../js/repetirdiv.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>