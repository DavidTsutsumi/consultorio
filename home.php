<?php
session_start();

if (!isset($_SESSION['usuario'])) {
   // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
   header("Location: index.php");
   exit();
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Sistema CRUD</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="img/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>

<body>
   <!-- header section start -->
   <div class="header_section">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo"><img src="img/logo.png" width="50px"></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="home.php">Inicio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="health.html">Citas</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="views/horario/indexHorario.php">Horarios</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="views/especialidad/indexEspecialidad.php">Especialidades</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Más opciones
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item" href="#">Historial médico</a>
                     <a class="dropdown-item" href="views/usuario/indexUsuario.php">Usuarios</a>
                     <a class="dropdown-item" href="#">Opción 3</a>
                  </div>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="logout.php">Cerrar sesión</a>
               </li>
            </ul>
         </div>
      </nav>
      <div id="main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="banner_section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <h1 class="banner_taital">Consultorio <br><span style="color: #151515;">Médico Online</span></h1>
                           <p class="banner_text">Consulta médica online, la nueva forma de cuidar de ti.</p>
                           <div class="btn_main">
                              <div class="more_bt"><a href="#">Reserva tu cita</a></div>
                              <div class="contact_bt"><a href="#">Contactanos</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="image_1"><img src="img/1.jpg"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="banner_section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <h1 class="banner_taital">Consultorio <br><span style="color: #151515;">Médico Online</span></h1>
                           <p class="banner_text">Consulta médica online, la nueva forma de cuidar de ti.</p>
                           <div class="btn_main">
                              <div class="more_bt"><a href="#">Reserva tu cita</a></div>
                              <div class="contact_bt"><a href="#">Contactanos</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="image_1"><img src="img/2.jpeg"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="banner_section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <h1 class="banner_taital">Consultorio <br><span style="color: #151515;">Médico Online</span></h1>
                           <p class="banner_text">Consulta médica online, la nueva forma de cuidar de ti.</p>
                           <div class="btn_main">
                              <div class="more_bt"><a href="#">Reserva tu cita</a></div>
                              <div class="contact_bt"><a href="#">Contactanos</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="image_1"><img src="img/3.jpeg"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>


         <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" style="font-size:24px; padding-top: 4px;"></i>
         </a>
         <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" style="font-size:24px; padding-top: 4px;"></i>
         </a>


      </div>
   </div>
   <!-- banner section end -->
   <!-- health section start -->
   <div class="health_section layout_padding">
      <div class="container">
         <h1 class="health_taital">Mejores especialistas</h1>
         <p class="health_text">Nuestros especialistas en dermatología, nutrición y más están aquí para cuidar de tu salud con atención
            experta y personalizada. ¡Conéctate con los mejores especialistas desde donde estés!"
         </p>
         <div class="health_section layout_padding">
            <div class="row">
               <div class="col-sm-7">
                  <div class="image_main">
                     <div class="main">
                        <img src="img/der.jpg" alt="Avatar" class="image" style="width:100%">
                     </div>
                  </div>
               </div>
               <div class="col-sm-5">
                  <div class="image_main_1">
                     <div class="main">
                        <img src="img/nut.jpg" alt="Avatar" class="image" style="width:650px">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- health section end -->

   <!-- news section start -->
   <div class="news_section layout_padding">
      <div class="container">
         <h1 class="health_taital">Precios</h1>
         <p class="health_text">En Consultorio Médico online tu economía es muy importante. Por eso te ofrecemos los mejores precios del mercado.</p>
         <div class="news_section_2 layout_padding">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="box_main">
                     <div class="icon_1"><img src="img/precio1.jpg"></div>
                     <h4 class="daily_text">Entre semana</h4>
                     <p>
                        $125 <br>
                        9 AM a 9 PM
                     </p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="box_main active">
                     <div class="icon_1"><img src="img/precio2.jpg"></div>
                     <h4 class="daily_text_1">Fin de semana</h4>
                     <p>
                        $145 <br>
                        9 AM a 9 PM
                     </p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="box_main">
                     <div class="icon_1"><img src="img/precio3.jpg"></div>
                     <h4 class="daily_text_1">Nocturno</h4>
                     <p>
                        $165 <br>
                        9 AM a 9 PM
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- news section end -->
   <!-- contact section start -->
   <div class="contact_section layout_padding">
      <div class="container">
         <h1 class="contact_taital">Contactanos</h1>
         <div class="news_section_2">
            <div class="row">
               <div class="col-md-6">
                  <div class="icon_main">
                     <div class="icon_7"><img src="img/icon-7.png"></div>
                     <h4 class="diabetes_text">Resolvemos todas las dudas que tengas</h4>
                  </div>
                  <div class="icon_main">
                     <div class="icon_7"><img src="img/icon-5.png"></div>
                     <h4 class="diabetes_text">Respuestas rapidas</h4>
                  </div>
                  <div class="icon_main">
                     <div class="icon_7"><img src="img/icon-6.png"></div>
                     <h4 class="diabetes_text">Puedes hacerlo las 24 horas</h4>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="contact_box">
                     <h1 class="book_text">Formulario</h1>
                     <input type="text" class="Email_text" placeholder="Nombre" name="Name">
                     <input type="text" class="Email_text" placeholder="Correo" name="Name">
                     <textarea class="massage-bt" placeholder="Mensaje" rows="5" id="comment" name="Massage"></textarea>
                     <div class="send_bt"><a href="#">SEND</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- contact section end -->
   <!-- client section start -->
   <div class="client_section layout_padding">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <h1 class="client_taital">QUÉ OPINAN NUESTROS PACIENTES</h1>
                  <div class="client_section_2">
                     <div class="client_left">
                        <div><img src="img/ref.jpg" class="client_img"></div>
                     </div>
                     <div class="client_right">
                        <h3 class="distracted_text">Francisco Lopez</h3>
                        <p class="lorem_text">Me encantó la atención personalizada. A pesar de ser una consulta en línea, el médico se tomó 
                           el tiempo necesario para escuchar mis preocupaciones y brindarme orientación médica detallada.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <h1 class="client_taital">QUÉ OPINAN NUESTROS PACIENTES</h1>
                  <div class="client_section_2">
                     <div class="client_left">
                        <div><img src="img/ref2.jpg" class="client_img"></div>
                     </div>
                     <div class="client_right">
                        <h3 class="distracted_text">Juan Ortiz</h3>
                        <p class="lorem_text">Increíble conveniencia. Poder acceder a consultas médicas desde la comodidad de
                            mi hogar ha sido una verdadera bendición, especialmente en días ocupados.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <h1 class="client_taital">QUÉ OPINAN NUESTROS PACIENTES</h1>
                  <div class="client_section_2">
                     <div class="client_left">
                        <div><img src="img/ref3.jpg" class="client_img"></div>
                     </div>
                     <div class="client_right">
                        <h3 class="distracted_text">Alejandro Dorantes</h3>
                        <p class="lorem_text">Los precios son realmente asequibles. Pensé que obtener atención médica de calidad en 
                           línea sería costoso, pero me sorprendió gratamente descubrir que los precios son bastante accesibles, lo que 
                           hace que la atención médica sea más accesible para todos.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <a id="bot" class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" style="font-size:24px; padding-top: 4px;"></i>
         </a>
         <a id="bot" class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" style="font-size:24px; padding-top: 4px;"></i>
         </a>
      </div>
   </div>

   <!-- footer section start -->
   <div class="footer_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-sm-6">

               <h1 class="adderss_text">Contactanos</h1>
               <div class="map_icon"><img src="img/map-icon.png"><span class="paddlin_left_0">Cuajimalpa</span></div>
               <div class="map_icon"><img src="img/call-icon.png"><span class="paddlin_left_0">+5509601271</span></div>
               <div class="map_icon"><img src="img/mail-icon.png"><span class="paddlin_left_0">volim@gmail.com</span></div>
            </div>
            <div class="col-lg-6 col-sm-6">
               <h1 class="adderss_text">Doctores</h1>
               <div class="hiphop_text_1">Contamos con un equipo de médicos altamente calificados y experimentados en diversas especialidades,
                  quienes se comprometen a brindar un trato personalizado y de alta calidad a cada uno de nuestros pacientes.
               </div>
            </div>

            <div class="col-lg-3 col-sm-6">
               <h1 class="adderss_text">Siguenos en</h1>

               <div class="social_icon">
                  <ul>
                     <li><a href="#"><img src="img/fb-icon.png"></a></li>
                     <li><a href="#"><img src="img/twitter-icon.png"></a></li>
                     <li><a href="#"><img src="img/linkedin-icon.png"></a></li>
                     <li><a href="#"><img src="img/instagram-icon.png"></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- footer section end -->
   <!-- copyright section start -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">Hecho por Gatitos</p>
      </div>
   </div>
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>