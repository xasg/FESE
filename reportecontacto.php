<?php require_once('Connections/conec.php'); // Check connection

if ($conn->connect_error) {
     printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
} 

$query="SELECT * FROM `contacto`";

        if( $resultado = mysqli_query($conn, $query) or die(mysql_error())){         
            $row_cotiza = mysqli_fetch_assoc($resultado);
            $totalRows_cotiza = mysqli_num_rows($resultado);

}


$conn->close();

?>


<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto FESE</title>
     <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

  </head>


  <body>
    
 <!-- header
    ========================-->
  <header>
       <nav id="top-menu">
        <div class="container">
            <div class="row">
                  <div class="col-sm-4 col-md-4">
                      <div class="navbar-header">
                        <a href="index.php"> <img src="images/logo1.png" class="img-responsive" ></a>
                      </div>
                  </div>  

                  <div class="col-sm-8 col-md-8">
                      <ul class="top-links list-unstyled text-right">
                        <!-- <li>
                          <ol class="list-inline">
                              <li><a class="espanol" href="#"><img src="images/iconos/espanol.png" class="img-responsive" /></a></li>
                              <li><a class="ingles" href="#"><img src="images/iconos/ingles.png" class="img-responsive" /></a></li>
                          </ol>
                        </li>-->

                        <li>
                          <ol class="list-inline">
                            <li><a class="facebook" href="https://www.facebook.com/FESE.MX/" target="_blank"><img src="images/iconos/fb.png" class="img-responsive" /></a></li>
                            <li><a class="twitter" href="https://twitter.com/fese_mx/" target="_blank"><img src="images/iconos/twitter.png" class="img-responsive" /></a></li>
                            <li><a class="pinterest" href="https://www.youtube.com/channel/UCozpLDFZa5sK3pvszgYerxA" target="_blank"><img src="images/iconos/youtube.png" class="img-responsive" /></a></li>
                            <li><a class="linkedin" href="https://www.linkedin.com/company/fundacion-educacion-superior-empresa"target="_blank"><img src="images/iconos/linkedin.png" class="img-responsive" /></a></li>
                          </ol>
                        </li>
                      </ul>
                  </div>                            
            </div>
        </div>
    </nav>
  </header>
   <!--  /header
   ======================== -->
   

 <!-- Menu de navegacion
    ========================-->    
  <div id="sticky-anchor"></div>
    <nav id="main-menu" class="navbar navbar-default">
      <div class="container">
          <div class="row">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myMenu">
                    <i class="fa fa-list-ul"></i>
                </button>
            </div>
           
           <div class="collapse navbar-collapse" id="myMenu">
              <ul class="nav navbar-nav navbar-left">
                  <li><a href="index.php">Inicio</a></li>

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">FESE <span class="caret"></span></a>
                      <ul class="dropdown-menu multi-level" role="menu">
                         <li><a href="nosotros.html">Nosotros</a></li> 
                         <li><a href="directorio.html">Directorio</a></li> 
                      </ul>
                  </li> 

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Estudiantes <span class="caret"></span></a>
                      <ul class="dropdown-menu multi-level" role="menu">                           
                          <li><a href="practicas.html">Prácticas Profesionales</a></li>                        
                          <li><a href="empleabilidad.html">Empleabilidad</a></li> 
                          <li><a href="emprendimiento.html">Emprendimiento</a></li>  
                          <li><a href="convocatoria.html">Convocatorias</a></li>
                      </ul>
                  </li>

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Empresas <span class="caret"></span></a>
                      <ul class="dropdown-menu multi-level" role="menu">                                                 
                        <li><a href="talento.html">Encuentra talento</a></li> 
                        <li><a href="empresas.html">Oportunidades</a></li>  
                        <li><a href="programas.html">Empresarial</a></li>
                      </ul>
                  </li>

                  <li><a href="convocatoria.html">Convocatorias</a></li>                    

                    <li><a href="http://espaciojoven.azurewebsites.net/" target="_blank" >EspacioJoven</a></li>

                  <li><a href="eventos.php">Eventos</a></li>
                  
                     <li><a href="rs.html">RSE</a></li>

                  <li class="active"><a href="contacto.php">Contacto</a></li>
              </ul>
            </div>     
          </div>
        </div>
    </nav>
    <!--  /Menu de navegacion
    ========================-->



    
 <div id="en-content">
        <div class="container">
            <div class="row">

                <!-- Left Content 4 Cols -->
                <div class="col-sm-12 col-md-12">
                

						
			


       <?php 
       if($totalRows_cotiza>0){
        ?>
       <table class="table table-striped table-bordered">      
           
                                    <thead>
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>E-MAIL</th>
                                            <th>TELEFONO</th>
                                            <th>MENSAJE</th>
                                            <th>UPDATE</th>                                            
                                        </tr>
                                    </thead>
                                                     
                                         <?php 
                                          do { 
                                          ?>
                           
      <tr >

        <td><?php echo $row_cotiza['inf_name']; ?></td>
        <td><?php echo $row_cotiza['inf_email']; ?></td> 
        <td><?php echo $row_cotiza['inf_telefono']; ?></td> 
        <td><?php echo $row_cotiza['inf_message']; ?></td> 
        <td><?php echo $row_cotiza['update']; ?></td>
   </tr> 


</tr>
          
          <?php } while ($row_cotiza = mysqli_fetch_assoc($resultado)); ?>
       
               


      
  </tbody> 
    
     </table>

     <?php
    }; //FIN DEL IF
     ?> 


    
                </div>


			
						
						
						


                    
                </div>

            </div> <!-- /row -->
        </div><!-- /conteiner -->



    </div>




    


<!-- Footer Area -->
<div id="en-footer">      
      <div class="bottom-footer">
           <div class="container">
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-5 col-md-5">                 
                        <div class="col-sm-12 col-md-12">
                          <p></p>
                           <p>Fundación Educación Superior-Empresa A.C</p>
                           <p>Ixcateopan 261, Santa Cruz Atoyac,<br> Del. Benito Juárez, 03310, México D.F.</p>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <p> 55-4626-8266 </p>
                        </div>
                    </div>

                    <div class="col-sm-2 col-md-2"></div>

                    <div class="col-sm-5 col-md-5">
                        <div class="col-sm-12 col-md-12"> 
                           <p>FESE Derechos Reservados 2016</p>
                           <p>Siguenos a través de :</p>
                        </div>
                        <div class="col-sm-8 col-md-8">
                          <ul class="top-links list-unstyled text-left">
                        <li>
                            <ol class="list-inline">
                                <li><a class="facebook" href="https://www.facebook.com/FESE.MX/" target="_blank"><img src="images/iconos/fb.png" class="img-responsive" /></a></li>
                                <li><a class="twitter" href="https://twitter.com/fese_mx/" target="_blank"><img src="images/iconos/twitter.png" class="img-responsive" /></a></li>
                <li><a class="pinterest" href="https://www.youtube.com/channel/UCozpLDFZa5sK3pvszgYerxA" target="_blank"><img src="images/iconos/youtube.png" class="img-responsive" /></a></li>
                                <li><a class="linkedin" href="https://www.linkedin.com/company/fundacion-educacion-superior-empresa" target="_blank"><img src="images/iconos/linkedin.png" class="img-responsive" /></a></li>
               
                            </ol>
                        </li>
                    </ul>
                        </div>
                        <div class="col-sm-12 col-md-12"> 
                            <p>Si deseas recibir más información, suscríbete</p>
                        </div>
                        <div class="inp col-sm-12 col-md-12">
                            <div class="col-xs-3 col-sm-3 col-md-3"> 
                                <a href="http://app2.fromdoppler.com/Lists/FormProcessing/Form?idForm=JxDvCB4v77gaL0Y4IbB0mg%3d%3d">
                                    <button type="button" class="btn btn-primary">Quiero suscribirme</button>
                                </a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>        
      </div>
</div>
     <!-- /Footer Area -->    

    <!--  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

  
    
    
    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

    
        <!-- Demo Switcher JS -->
        <script type="text/javascript" src="js/fswit.js"></script>

    </body>
</html>