<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include_once("bd/conexao.php");
if (!empty($_SESSION['id_user'])) {
} else {
   header("Location: login.php");
}

date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');
$hora = date('H:i:s');


// PEGANDO DADOS DO USUARIO
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);


$cmd = "select * from empresas where empresa_id ='$user[user_empresa]'";

//$empresa = mysqli_fetch_assoc($ar);


?>

<?php //
?>
<!doctype html>
<html lang="pt_br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>CRM Conecta</title>
   <?php $base = 'http://localhost/conecta/' ?>
   <base href="<?php echo $base ?>">
   <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

   <!-- inject:css-->

   <link rel="stylesheet" href="assets/vendor_assets/css/bootstrap/bootstrap.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/daterangepicker.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/fontawesome.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/footable.standalone.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/fullcalendar@5.2.0.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/jquery-jvectormap-2.0.5.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/jquery.mCustomScrollbar.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/leaflet.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/line-awesome.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/magnific-popup.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/MarkerCluster.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/MarkerCluster.Default.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/select2.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/slick.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/star-rating-svg.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/trumbowyg.min.css">

   <link rel="stylesheet" href="assets/vendor_assets/css/wickedpicker.min.css">

   <link rel="stylesheet" href="style.css">

   <!-- endinject -->

   <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">

   <!-- Fonts -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body class="layout-dark side-menu">
   <div class="mobile-search">
      <form action="/" class="search-form">
         <img src="img/svg/search.svg" alt="search" class="svg">
         <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
      </form>
   </div>
   <div class="mobile-author-actions"></div>
   <header class="header-top ">
      <nav class="navbar" style="background-color: #02FE4F">
         <div class="navbar-left">
            <div class="logo-area" style="height: 60px; background-color: #02FE4F;">
               <a class="navbar-brand" href="home" style="height: 55px; margin-bottom: 55px">
                  <img src="img/Logo Conecta_resized.png" alt="logo" style="height: 100px; width: 100px;">
               </a>
               <a href="#" class="sidebar-toggle" style="color: #51514F">
                  <img class="" src="img/svg/align-center-alt-svgrepo-com.svg" alt="img"></a>
            </div>


         </div>
         </div>
         <!-- ends: navbar-left -->
         <div class="navbar-right">
            <ul class="navbar-right__menu">
               <li class="nav-search">
                  <a href="#" class="search-toggle">
                     <i class="uil uil-search" style="color: black"></i>
                     <i class="uil uil-times" style="color: black"></i>
                  </a>
                  <form action="/" class="search-form-topMenu">
                     <span class="search-icon uil uil-search" style="color: black"></span>
                     <input class="form-control me-sm-2 box-shadow-none" type="search" style="color: black" placeholder="Search..." aria-label="Search">
                  </form>
               </li>
               <li class="nav-message">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle icon-active">
                        <img class="svg" src="img/svg/message.svg" alt="img">
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper">
                           <h2 class="dropdown-wrapper__title">Messages <span class="badge-circle badge-success ms-1">2</span></h2>
                           <ul>
                              <li class="author-online has-new-message">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                       <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="author-offline has-new-message">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                       <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="author-online has-new-message">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                       <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="author-offline">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="author-offline">
                                 <div class="user-avater">
                                    <img src="img/team-1.png" alt="">
                                 </div>
                                 <div class="user-message">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                       <span class="time-posted">3 hrs ago</span>
                                    </p>
                                    <p>
                                       <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                          ipsum
                                          dolor amet cosec Lorem ipsum</span>
                                    </p>
                                 </div>
                              </li>
                           </ul>
                           <a href="" class="dropdown-wrapper__more">See All Message</a>
                        </div>
                     </div>
                  </div>
               </li>
               <!-- ends: nav-message -->
               <li class="nav-notification">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle icon-active">
                        <img class="svg" src="img/svg/alarm.svg" alt="img">
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper">
                           <h2 class="dropdown-wrapper__title">Notifications <span class="badge-circle badge-warning ms-1">4</span></h2>
                           <ul>
                              <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--primary">
                                    <img class="svg" src="img/svg/inbox.svg" alt="inbox">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--secondary">
                                    <img class="svg" src="img/svg/upload.svg" alt="upload">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--success">
                                    <img class="svg" src="img/svg/log-in.svg" alt="log-in">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--info">
                                    <img class="svg" src="img/svg/at-sign.svg" alt="at-sign">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                              <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                 <div class="nav-notification__type nav-notification__type--danger">
                                    <img src="img/svg/heart.svg" alt="heart" class="svg">
                                 </div>
                                 <div class="nav-notification__details">
                                    <p>
                                       <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                       <span>sent you a message</span>
                                    </p>
                                    <p>
                                       <span class="time-posted">5 hours ago</span>
                                    </p>
                                 </div>
                              </li>
                           </ul>
                           <a href="" class="dropdown-wrapper__more">See all incoming activity</a>
                        </div>
                     </div>
                  </div>
               </li>
               <!-- ends: .nav-notification -->
               <li class="nav-settings">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle">
                        <img src="img/setting.png" alt="setting style=" color: black"">
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper dropdown-wrapper--large">
                           <ul class="list-settings">
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/mail.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">All Features</a>
                                    </h6>
                                    <p>Introducing Increment subscriptions </p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/color-palette.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Themes</a>
                                    </h6>
                                    <p>Third party themes that are compatible</p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/home.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Payments</a>
                                    </h6>
                                    <p>We handle billions of dollars</p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/video-camera.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Design Mockups</a>
                                    </h6>
                                    <p>Share planning visuals with clients</p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/document.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Content Planner</a>
                                    </h6>
                                    <p>Centralize content gethering and editing</p>
                                 </div>
                              </li>
                              <li class="d-flex">
                                 <div class="me-3"><img src="img/microphone.png" alt=""></div>
                                 <div class="flex-grow-1">
                                    <h6>
                                       <a href="" class="stretched-link">Diagram Maker</a>
                                    </h6>
                                    <p>Plan user flows & test scenarios</p>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </li>
               <!-- ends: .nav-support -->
               <li class="nav-flag-select">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle"><img src="img/flag.png" alt="" class="rounded-circle"></a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper dropdown-wrapper--small">
                           <a href=""><img src="img/eng.png" alt=""> English</a>
                           <a href=""><img src="img/ger.png" alt=""> German</a>
                           <a href=""><img src="img/spa.png" alt=""> Spanish</a>
                           <a href=""><img src="img/tur.png" alt=""> Turkish</a>
                           <a href=""><img src="img/iraq.png" alt=""> Arabic</a>
                        </div>
                     </div>

                  </div>
               </li>
               <!-- ends: .nav-flag-select -->
               <li class="nav-author">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle"><img src="img/author-nav.jpg" alt="" class="rounded-circle">
                        <span class="nav-item__title" style="color: black">Danial<i class="las la-angle-down nav-item__arrow" style="color: black"></i></span>
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper">
                           <div class="nav-author__info">
                              <div class="author-img">
                                 <img src="img/author-nav.jpg" alt="" class="rounded-circle">
                              </div>
                              <div>
                                 <h6>Rabbi Islam Rony</h6>
                                 <span>UI Designer</span>
                              </div>
                           </div>
                           <div class="nav-author__options">
                              <ul>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-user"></i> Profile</a>
                                 </li>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-setting"></i>
                                       Settings</a>
                                 </li>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-key-skeleton"></i> Billing</a>
                                 </li>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-users-alt"></i> Activity</a>
                                 </li>
                                 <li>
                                    <a href="">
                                       <i class="uil uil-bell"></i> Help</a>
                                 </li>
                              </ul>
                              <a href="" class="nav-author__signout">
                                 <i class="uil uil-sign-out-alt"></i> Sign Out</a>
                           </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                     </div>
                  </div>
               </li>
               <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
               <a href="#" class="btn-search">
                  <img src="img/svg/search.svg" alt="search" class="svg feather-search">
                  <img src="img/svg/x.svg" alt="x" class="svg feather-x"></a>
               <a href="#" class="btn-author-action">
                  <img class="svg" src="img/svg/more-vertical.svg" alt="more-vertical"></a>
            </div>
         </div>
         <!-- ends: .navbar-right -->
      </nav>
   </header>
   <main class="main-content" style="background-color: gray;">

      <div class="sidebar-wrapper">
         <div class="sidebar sidebar-collapse" id="sidebar" style="background-color: #3D3D3B; margin-top: 10px">
            <div class="sidebar__menu-group">
               <ul class="sidebar_nav">
                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-user" style="color: #02FE4F"></span>
                        <span class="menu-text" style="color: #02FE4F">Leads</span>
                        <span class="toggle-icon" style="color: #02FE4F"></span>
                     </a>
                     <ul>
                        <li class="">
                           <a href="cadastro" style="color: #02FE4F">Cadastrar</a>
                        </li>
                        <li class="">
                           <a href="entradas" style="color: #02FE4F">Entradas</a>
                        </li>
                        <li class="">
                           <a href="listar" style="color: #02FE4F">Listar</a>
                        </li>
                     </ul>
                  </li>
                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-palette" style="color: #02FE4F"></span>
                        <span class="menu-text" style="color: #02FE4F">Artistas</span>
                        <span class="toggle-icon" style="color: #02FE4F"></span>
                     </a>
                     <ul>
                        <li class="">
                           <a href="artistas" style="color: #02FE4F">Cadastrar</a>
                        </li>
                     </ul>
                  </li>
                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-suitcase-alt" style="color: #02FE4F"></span>
                        <span class="menu-text" style="color: #02FE4F">Contratantes</span>
                        <span class="toggle-icon" style="color: #02FE4F"></span>
                     </a>
                     <ul>
                        <li class="">
                           <a href="contratantes" style="color: #02FE4F">Cadastrar</a>
                        </li>
                     </ul>
                  </li>
                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-schedule" style="color: #02FE4F"></span>
                        <span class="menu-text" style="color: #02FE4F">Eventos</span>
                        <span class="toggle-icon" style="color: #02FE4F"></span>
                     </a>
                     <ul>
                        <li class="">
                           <a href="eventos" style="color: #02FE4F">Cadastrar</a>
                        </li>
                     </ul>
                  </li>
                  <li class="has-child">
                     <a href="#">
                        <span class="nav-icon uil uil-chart-growth-alt" style="color: #02FE4F"></span>
                        <span class="menu-text" style="color: #02FE4F">Controle</span>
                        <span class="toggle-icon" style="color: #02FE4F"></span>
                     </a>
                     <ul>
                        <li class="">
                           <a href="avisos" style="color: #02FE4F">Avisos</a>
                        </li>
                        <li class="">
                           <a href="vendas" style="color: #02FE4F">Vendas</a>
                        </li>
                        <li class="">
                           <a href="regioes" style="color: #02FE4F">Regiões</a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </div>

      <div class="contents" style="background-color: gray">

         <div class="crm mb-25">
            <div class="container-fluid">
               <div class="row ">
                  <div class="col-lg-12">

                     <br>
                  </div>
                  <div class="col-xxl-12">
                     <div class="row">
                        <div class="col-xxl-12 col-sm-12 mb-25">
                           <!-- Card 1  -->
                           <div id="div-content" class="" style="background-color: gray; width:100%; margin-top: 30px">





                              <?php //
                              include "url.php"
                              ?>

                           </div>
                           <!-- Card 1 End  -->
                        </div>

                     </div>
                  </div>

               </div>
               <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgYKHZB_QKKLWfIRaYPCadza3nhTAbv7c"></script>
               <!-- inject:js-->
               <script src="js/custom.js"></script>
               <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
               <script src="assets/vendor_assets/js/jquery/jquery-ui.js"></script>
               <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>
               <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
               <script src="assets/vendor_assets/js/moment/moment.min.js"></script>
               <script src="assets/vendor_assets/js/accordion.js"></script>
               <script src="assets/vendor_assets/js/apexcharts.min.js"></script>
               <script src="assets/vendor_assets/js/autoComplete.js"></script>
               <script src="assets/vendor_assets/js/Chart.min.js"></script>
               <script src="assets/vendor_assets/js/daterangepicker.js"></script>
               <script src="assets/vendor_assets/js/drawer.js"></script>
               <script src="assets/vendor_assets/js/dynamicBadge.js"></script>
               <script src="assets/vendor_assets/js/dynamicCheckbox.js"></script>
               <script src="assets/vendor_assets/js/footable.min.js"></script>
               <script src="assets/vendor_assets/js/fullcalendar@5.2.0.js"></script>
               <script src="assets/vendor_assets/js/google-chart.js"></script>
               <script src="assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js"></script>
               <script src="assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js"></script>
               <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>
               <script src="assets/vendor_assets/js/jquery.filterizr.min.js"></script>
               <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
               <script src="assets/vendor_assets/js/jquery.peity.min.js"></script>
               <script src="assets/vendor_assets/js/jquery.star-rating-svg.min.js"></script>
               <script src="assets/vendor_assets/js/leaflet.js"></script>
               <script src="assets/vendor_assets/js/leaflet.markercluster.js"></script>
               <script src="assets/vendor_assets/js/loader.js"></script>
               <script src="assets/vendor_assets/js/message.js"></script>
               <script src="assets/vendor_assets/js/moment.js"></script>
               <script src="assets/vendor_assets/js/muuri.min.js"></script>
               <script src="assets/vendor_assets/js/notification.js"></script>
               <script src="assets/vendor_assets/js/popover.js"></script>
               <script src="assets/vendor_assets/js/select2.full.min.js"></script>
               <script src="assets/vendor_assets/js/slick.min.js"></script>
               <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>
               <script src="assets/vendor_assets/js/wickedpicker.min.js"></script>
               <script src="assets/theme_assets/js/apexmain.js"></script>
               <script src="assets/theme_assets/js/charts.js"></script>
               <script src="assets/theme_assets/js/drag-drop.js"></script>
               <script src="assets/theme_assets/js/footable.js"></script>
               <script src="assets/theme_assets/js/full-calendar.js"></script>
               <script src="assets/theme_assets/js/googlemap-init.js"></script>
               <script src="assets/theme_assets/js/icon-loader.js"></script>
               <script src="assets/theme_assets/js/jvectormap-init.js"></script>
               <script src="assets/theme_assets/js/leaflet-init.js"></script>
               <script src="assets/theme_assets/js/main.js"></script>
               <!-- endinject-->
</body>

</html>