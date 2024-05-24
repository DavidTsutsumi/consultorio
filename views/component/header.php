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
   <link rel="stylesheet" href="../../css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="../..//css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="../../css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="../../css/owl.carousel.min.css">
   <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
   <!-- header section start -->
   <div class="header_section">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo"><img src="../../img/logo.png" width="50px"></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="../../home.php">Inicio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="health.html">Citas</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../../views/horario/indexHorario.php">Horarios</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../../views/especialidad/indexEspecialidad.php">Especialidades</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Más opciones
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item" href="#">Historial médico</a>
                     <a class="dropdown-item" href="../../views/usuario/indexUsuario.php">Usuarios</a>
                     <a class="dropdown-item" href="#">Opción 3</a>
                  </div>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../../logout.php">Cerrar sesión</a>
               </li>
            </ul>
         </div>
      </nav>