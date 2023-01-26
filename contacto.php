<?php require_once('Connections/email.php'); 
mysql_query("SET NAMES 'utf8'");
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formRegRes")) {
  $insertSQL = sprintf("INSERT INTO contacto (inf_name,inf_email,inf_telefono,inf_message) VALUES (%s, %s, %s, %s)",                     
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['message'], "text"));

  mysql_select_db($database_email, $email1);
  $Result1 = mysql_query($insertSQL, $email1) or die(mysql_error());
  //require_once('lib/email.php');
  require_once('lib/email_con.php');

  $insertGoTo = "contacto.php?registro=1";

  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
 
  echo '<script type="text/javascript">

  function redirection(){  

  window.location ="contacto.php?registro=1";

  }  setTimeout ("redirection()", 100); //tiempo en milisegundos

  </script>';
  
}


?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto FESE</title>
     <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script language=""="JavaScript">
    function conMayusculas(field) {
            field.value = field.value.toUpperCase()
  }
      function incubadora(val) {
            documen.write(val);
  }

</script>


<script type="text/javascript">
  function noespacios() {
    var er = new RegExp(/\s/);
    var web = document.getElementById('insPasswd').value;
    if(er.test(web)){
      alert('No se permiten espacios en la contraseña');
      return false;
    }
                else
      return true;
  }
</script>


<!-- Analytics Code -->
   <script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

   ga('create', 'UA-27455062-1', 'auto');
   ga('send', 'pageview');

  </script>
  <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
  document,'script','https://connect.facebook.net/en_US/fbevents.js');

  fbq('init', '544772525701327');
  fbq('track', "PageView");
  fbq('track', 'Lead');
  fbq('track', 'CompleteRegistration');

  </script>

  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=544772525701327&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

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

                  <div class="col-sm-8 col-md-8 redes">
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
                          <li><a href="empleabilidad.html">Cursos</a></li> 
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


    
    <div id="header-slider" class="carousel slide carousel-fade" data-ride="carousel">        
       
        <div class="carousel-inner" role="listbox">
            <div class="item active"> <!-- Slider Item #1 -->
                <img src="images/contacto_header.jpg" alt="..." class="img-responsive">
              <!--   <div class="carousel-caption">
                    <h1>HIPUMP</h1><br>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    <a class="btn btn-default en-btn" href="nosotros.html" role="button">Ver más</a>
                </div> -->
            </div>
           
        </div>

        
    </div>

 



    
 <div id="en-content">
        <div class="container">
            <div class="row arriba">

                <!-- Left Content 4 Cols -->
                <div class="col-sm-4 col-md-4">
                    <div class="section-title text-left"> <!-- Left Section Title -->
                        <h4>¡Ponte en contacto con nosotros!</h4> 
                        <p>01 (55) 46268266</p>
                        <p>contacto@fese.org.mx</p>
                    
                    </div>
                </div>

                <!-- Right Content 8 Cols -->
                <div class="col-sm-8 col-md-8">


                     
                   <?php if ($_GET["registro"]==1){  ?>

                                  <div class="col-sm-12 col-md-12">
                                 <h2 class="color_titulo">¡Tu informacion fue enviada correctamente en breve nos pondremos en contacto!</h2> 
                                </div>
                            </div> 

                            <?php }else{ ?>



                   <form action="<?php echo $editFormAction?>" method="POST" name="formRegRes" onsubmit="return noespacios()">
                        <div class="row">


                          



                            <div class="col-sm-12 col-md-12">
                                <div class="form-group"> <!-- Your name input -->
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Nombre completo *" id="name" name ="name" required data-validation-required-message="escriba un nombre.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group"> <!-- Your email input -->
                                    <input type="email" autocomplete="off" class="form-control" placeholder="Correo Electrónico *" id="email" name ="email" required data-validation-required-message="escriba un email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                             <div class="col-sm-12 col-md-12">
                                <div class="form-group"> <!-- Your email input -->
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Asunto *" id="telefono" name ="telefono" required data-validation-required-message="Asunto.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                       
                        <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                        <textarea class="form-control" rows="6" placeholder="Escriba su mensaje" id="message" name ="message" required data-validation-required-message="Escriba un mensaje."></textarea>
                        <p class="help-block text-danger"></p>
                         </div>
                        </div>

                         </div>
                        
                        <div id="success"></div>
                       <!-- <button type="button" class="btn btn-primary">Enviar</button> -->
                       <input type="submit" class="btn btn-primary" value="Enviar">
                       <input type="hidden" name="MM_insert" value="formRegRes">
                    </form>



                    <?php } ?>

                    <div class="clearfix"></div>
                    <div class="spacer"></div>

                    
                </div>

            </div> <!-- /row -->
        </div><!-- /conteiner -->



    </div>

<div id="header-slider" class="carousel slide carousel-fade" data-ride="carousel">        
       
        <div class="carousel-inner" role="listbox">
                    <div class="contact-details">
                            <div class="map">
                                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.8997767978976!2d-99.16131758507147!3d19.373491847588284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ffa52c4affa9%3A0xe7505e0e613e278a!2sFundaci%C3%B3n+Educaci%C3%B3n+Superior+Empresa!5e0!3m2!1ses-419!2smx!4v1453964899555" width="600" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                     </div>
        </div>
</div>
  



    


<!-- Footer Area -->
<div id="en-footer">      
      <div class="bottom-footer">
           <div class="container">
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-5 col-md-5">                 
                        <div class="col-sm-12 col-md-12">
                          <p> <img src="images/footer/esr-01.png" alt="" class="img-responsive"></p>
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