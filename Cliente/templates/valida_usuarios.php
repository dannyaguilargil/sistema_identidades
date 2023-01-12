<!DOCTYPE html>
<!--SOLICITUD_USUARIO A LA BASE DE DATOS-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/gestion_usuarios.css">
    <link rel="icon" href="imgs/logoimsaludrecortado.ico">
    <title>Iniciar Sesion</title>
</head>
<body>
  
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand " href="login.html">Usuarios</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="repuestos.html">Sistemas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contacto.html" disabled>Paz y salvo</a>
                  </li>
                </ul>
              
              </div>
              <a class="btn btn-light fas fa-user" href="login.html"></a>
              <div class="form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckChecked">Modo oscuro</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                
            </div>
            </div>
          
          </nav>
         
                    
    </header>


    
    <div class="imagen">
        <img  src="../imgs/logoimsaludrecortado.png"  alt="" style="width: 200px; text-align: center;">
    </div>



<div class="centrar">
        <div class="centrar1 col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <div class="container form-control form-control" >
            <div class="row">
                

      
            <form id="fupForm" action="../../Servidor/pruebaregistro.php" method="POST">   
            <table>
           

                    <tr class="tre">
                    <th><b>Nombre</b></th>
                    <th><b>Cedula</b></th>
                    <th><b>Cargo</b></th>
                    <th><b>Periodo</b></th>
                    <th><b>Supervisor</b></th>
                    <th><b>Email</b></th>
                    <th><b>Rol</b></th>
                    <th><b>Validar</b></th>
                    </tr>



            <?php
            include '../../Servidor/conexion.php';
            $consulta="SELECT * from solicitud_usuario";
            $resultado=mysqli_query($mysqli,$consulta);
                    if($resultado){ while($row = $resultado->fetch_array()){
                        $nombre = $row['nombre'];
                        $cedula = $row['cedula'];
                        $cargo = $row['cargo'];
                        $fechafinalcontrato = $row['fechafinalcontrato'];
                        $supervisor = $row['supervisor'];
                        $email = $row['email'];
                        $rol = $row['rol'];
                        //$ima
                        $aux=$nombre;
                        ?>
                    
                    <tr>

                      <!-- DEBO ENVIAR DATOS DE SOLICITUD DE USUARIOS A OTRO FORMULARIO -->
                      <!-- GUARDAR DENTRO DE  -->

                    <td><input type="text" name="nombre" id="nombre" value="<?php ?>" disabled placeholder="<?php echo $nombre ?>"></td>
                    <td><?php echo $cedula; ?></td>
                    <td><?php echo $cargo; ?></td>
                    <td><?php echo $fechafinalcontrato;?></td>
                    <td><?php echo $supervisor; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $rol; ?></td>
                    <td> <button  class="btn btn-success" id="registro" >A</button>
                     </td>
                    </tr>
                    <?php 
                    }
                    
                     }  ?>
               </form>   
            </table>
         
          </div>
          </div>
          </div>
          </div>


      <footer>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
      </footer>

      <script>
            $(document).ready(function() {
            $('#registro').on('click', function() {
            $("#registro").attr("disabled", "disabled");
            var nombre = $('#nombre').val();
            var cedula = $('#cedula').val();
            if(name!="" && cedula!=""){
	          $.ajax({
	        	url: "save.php",
		        type: "POST",
		        data: {
			      nombre: nombre,
			      cedula: cedula			
		        },
		        cache: false,
		        success: function(dataResult){
			      var dataResult = JSON.parse(dataResult);
			      if(dataResult.statusCode==200){
				    $("#registro").removeAttr("disabled");
				    $('#fupForm').find('input:text').val('');
				    $("#success").show();
				    $('#success').html('Data added successfully !'); 						
			      }
			      else if(dataResult.statusCode==201){
				    alert("Error occured !");
			      }
			
		}
	});
	}
	else{
		alert('Please fill all the field !');
	}
});
});


      </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>