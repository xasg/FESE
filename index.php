<?php
// Definimos nuestra zona horaria
date_default_timezone_set("America/Mexico_City");

// incluimos el archivo de funciones
include 'funciones.php';

// incluimos el archivo de configuracion
include 'config.php';

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['from'])) 
{

    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['from']!="" AND $_POST['to']!="") 
    {

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio = _formatear($_POST['from']);
        // y la formateamos con la funcion _formatear

        $final  = _formatear($_POST['to']);

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio_normal = $_POST['from'];

        // y la formateamos con la funcion _formatear
        $final_normal  = $_POST['to'];

        // Recibimos los demas datos desde el form
        $titulo = evaluar($_POST['title']);

        // y con la funcion evaluar
        $body   = evaluar($_POST['event']);

        // reemplazamos los caracteres no permitidos
        $clase  = evaluar($_POST['class']);

        // insertamos el evento
        $query="INSERT INTO eventos VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        // Obtenemos el ultimo id insetado
        $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        // para generar el link del evento
        $link = "descripcion_evento.php?id=$id";

        // y actualizamos su link
        $query="UPDATE eventos SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        // redireccionamos a nuestro calendario
        header("Location:$base3_url"); 
    }
}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
      <meta charset="utf-8">
	  <meta name="p:domain_verify" content="d187529178422dcbec3d052857d4ea0b"/>
      <title>Aprender, emprender e innovar</title>        
        <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
        <link href="<?=$base_url?>css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
        <script src="<?=$base_url?>js/jquery.min.js"></script>
        <script src="<?=$base_url?>js/moment.js"></script>
        <script src="<?=$base_url?>js/bootstrap.min.js"></script>
        <script src="<?=$base_url?>js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href="<?=$base_url?>css/bootstrap-datetimepicker.min.css" />
        <script src="<?=$base_url?>js/bootstrap-datetimepicker.es.js"></script>

   <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<!--<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
	 <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
   <link href="css/ihover.css" rel="stylesheet">
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

<!-- <body style="background: white;"> -->

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
                  <li class="active"><a href="index.php">Inicio</a></li>

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

                  <li><a href="contacto.php">Contacto</a></li>
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
               <a href="http://certamen.fese.org.mx/" target="_blank">
			   <img src="images/slider/slider1.png" alt="...">
			   </a>
           </div>
		   
		   <div class="item"> <!-- Slider Item #1 -->
               <a href="http://lideresanuies.fese.org.mx/"target="_blank">
			   <img src="images/slider/lideres2.jpg" alt="...">
			   </a>
           </div>
		   
            <div class="item"> <!-- Slider Item #2 -->
                <img src="images/slider/colaboradora.jpg" alt="...">
            </div>
			
            
        </div>

        <a class="left carousel-control" href="#header-slider" role="button" data-slide="prev">
            <span class="fa fa-long-arrow-left" aria-hidden="true">    
            </span>
        </a>

        <a class="right carousel-control" href="#header-slider" role="button" data-slide="next">
            <span class="fa fa-long-arrow-right" aria-hidden="true">                
            </span>
        </a>
    </div>   

    <div class="arribam container">  	       
           <div class="row">

                <div class="col-xs-12 col-sm-9 col-md-9">
                      
                          <div>                     
                            <img src="images/fila1/ima111.jpg" alt="" class="img-responsive">
                              <div class="carousel-caption"> 
                              <a class="btn btn-success" href="practicas.html" role="button">MÁS INFORMACIÓN</a>
                              </div>
                          </div>
                      </div>


              <div class="hidden-xs col-sm-3 col-md-3">
                      
                          <div>                     
                            <img src="images/fila1/ima0033.jpg" alt="" class="img-responsive"> 
                              <div class="carousel-caption"> 
                              <a class="btn btn-success" href="practicas.html" role="button">VER MÁS</a>
                              </div>
                          </div>
            </div>

        </div>   
      
    




<div class=" arribam row">
<div class="col-xs-12 col-sm-6 col-md-3"> 
    <div class="ih-item square effect13 bottom_to_top"><a href="https://fese.colaboradora.mx/registro/" target="_blank">
        <img src="images/fila2/cuadrito1.png" alt="img">
        <div class="info">
         <h3>¡Haz tus prácticas profesionales!</h3>
        </div></a>
      </div>
</div> 


<div class="col-xs-12 col-sm-6 col-md-3"> 
    <div class="ih-item square effect13 bottom_to_top"><a href="https://fese.colaboradora.mx/registro/" target="_blank">
        <img src="images/fila2/cuadrito2.png" alt="img">
        <div class="info">
         <h3>Empresa, encuentra el mejor talento humano</h3>
        </div></a>
      </div>
</div> 


<div class="col-xs-12 col-sm-6 col-md-3"> 
    <div class="ih-item square effect13 bottom_to_top"><a href="convocatoria.html">
        <img src="images/fila2/cuadrito3.png" alt="img">
        <div class="info">
         <h3>¡Encuentra el empleo que tanto deseas!</h3>
        </div></a>
      </div>
</div> 


<div class="col-xs-12 col-sm-6 col-md-3"> 
    <div class="ih-item square effect13 bottom_to_top"><a href="http://espaciojoven.azurewebsites.net/" target="_blank">
        <img src="images/fila2/cuadrito4.png" alt="img">
        <div class="info">
         <h3>Te brindamos el mejor contenido. Infórmate y alcanza tus objetivos.</h3>
        </div></a>
      </div>
</div> 
</div>  

 

      <div class="arribaabajo row">
        <div class="col-xs-12 col-sm-12 col-md-12">
           <h3 class="color_titulo">Calendario de Actividades FESE</h3>           
         <div class="col-xs-12 col-sm-12 col-md-9">
         
                            <div class="page-header">
                              <h3></h3>
                             </div>

                            <div class="col-xs-12 col-sm-12 col-md-10">
                                  <div class="col-xs-12 col-sm-12 col-md-3">
                                      <img src="images/convoca.jpg" alt="img">Convocatorias
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-2">
                                      <img src="images/taller.jpg" alt="img">Taller
                                  </div> 
                                  <div class="col-xs-12 col-sm-12 col-md-3">
                                      <img src="images/conferencia.jpg" alt="img">Conferencia
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-2">
                                      <img src="images/evento.jpg" alt="img">Evento
                                  </div><br><br>
                            </div><!--  <div class="pull-left form-inline"><br> -->


                              <div class="col-xs-12 col-sm-12 col-md-6">
                                  <div class="btn-group">
                                    <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                    <button class="btn" data-calendar-nav="today">Hoy</button>
                                    <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                                  </div>
                              </div>


                              <div class="col-xs-12 col-sm-12 col-md-4">
                                  <div class="btn-group">
                                    <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                    <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                    <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                    <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                  </div> <!--  </div> -->
                              </div>
         

        
          <div class="col-xs-12 col-sm-12 col-md-12">
          
                    <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->   

                        <!--ventana modal para el calendario-->
                    <div class="modal01 fade" id="events-modal">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-body" style="height: 300px">
                                      <p>One fine body&hellip;</p>
                                   </div>
                                   <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                   </div>
                              </div>
                         </div>
                    </div> 		
          </div>

         </div> 

         <div class="col-xs-12 col-sm-12 col-md-3 arriba ">
                   
                 <a class="facebook" href="https://www.facebook.com/FESE.MX/" target="_blank"><img src="images/fila3/fila3_1.gif" class="img-responsive" /></a> <br> <br>                      
           
                  <a class="certamen" href="http://certamen.fese.org.mx/" target="_blank"><img src="images/fila3/fila3_2.gif" class="img-responsive" /></a>  
          
         </div>

      </div>
</div>


<div id="modal-content" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog1">
       <!--<img src="images/modal_eva.gif" alt="img">-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
              <img src="images/certamen01.png" alt="img">
            </div>
             <!-- <iframe id='doppler_subscription' src='http://app2.fromdoppler.com/Lists/FormProcessing/Form?idForm=JxDvCB4v77gaL0Y4IbB0mg%3d%3d'  height='335' width='450' scrolling='no' frameborder='no' style='overflow:scroll'></iframe>
             -->
           
        </div>
    </div>
</div>


 </div> 







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
     

   
    <script src="<?=$base_url?>js/underscore-min.js"></script>
    <script src="<?=$base_url?>js/calendar.js"></script>
    <script type="text/javascript">
        (function($){
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que los eventos se mostraran en ventana modal
                        modal: '#events-modal', 

                        // dentro de un iframe
                        modal_type:'iframe',    

                        //obtenemos los eventos de la base de datos
                        events_source: 'obtener_eventos.php', 

                        // mostramos el calendario en el mes
                        view: 'month',             

                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,   


                        // definimos el idioma por defecto
                        language: 'es-ES', 

                        //Template de nuestro calendario
                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,


                        // Hora de inicio
                        time_start: '08:00', 

                        // y Hora final de cada dia
                        time_end: '22:00',   

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',    

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h3').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>

                

    <script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });

        });
</script>  
	
<script>
		// set focus when modal is opened
$('#modal-content').on('shown.bs.modal', function () {
    $("#txtname").focus();
});

// show the modal onload
$('#modal-content').modal({
    show: true
});

// everytime the button is pushed, open the modal, and trigger the shown.bs.modal event
$('#openBtn').click(function () {
    $('#modal-content').modal({
        show: true
    });
});
</script>


<!--<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>-->
<script type='text/javascript' src='js/idangerous.swiper.scrollbar-2.4.js'></script>
<script type="text/javascript" src="js/owl.carousel.js"></script><!-- Owl Carousel Plugin -->
 <!-- <script type="text/javascript" src="js/nivo-lightbox.min.js"></script> -->

   
   <!-- <script type="text/javascript" src="js/jquery.isotope.js"></script>
    <script type="text/javascript" src="js/imagesloaded.js"></script>-->
    
    <!-- Javascripts
    ================================================== -->
<script type="text/javascript" src="js/main.js"></script>
    
        <!-- Demo Switcher JS -->
<script type="text/javascript" src="js/fswit.js"></script>    
</body>
</html>
