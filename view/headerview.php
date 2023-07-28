<!DOCTYPE html>
<html>  
  <head>
    <title>NOSTROMO LOGISTIC</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
     <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/css/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- Incluir Font Awesome (versión alojada en CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
  
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
  
  </head>
  
  
  <body>
    <script>
      /*https://bootstrapious.com/p/bootstrap-vertical-navbar*/
 // Sidebar toggle behavior function
$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});
    </script>
    <!-- Start vertical navbar -->
    <header id="header">
       <div class="vertical-nav" id="sidebar">
          <div class="py-4 px-3 mb-2 mt-2 bg-dark">
            <div class="align-items-center" id="half">    
            <div id="image" >
             <img src="resources/img/NOSTROMO.png" alt="...">
           </div>
            </div>
          </div>
          <p class="text-white font-weight-bold text-uppercase px-3 small pb-3 mb-2 mt-3">menu</p>
          <ul class="nav flex-column bg-grey mb-0">
            <li class="nav-item">
              <a href="index.php" class="nav-link text-white font-italic bg-trasparent">
                <i class="fa fa-truck mr-3 text-white fa-fw"></i>Vehiculos
              </a>  
            </li>
            <li class="nav-item">
              <a href="index.php?action=reviews" class="nav-link text-white font-italic bg-trasparent">
                <i class="fa fa-cogs mr-3 text-white fa-fw"></i>Revisiones
              </a>  
            </li>
            <li class="nav-item">
              <a href="index.php?action=agenda" class="nav-link text-white font-italic bg-trasparent">
                <i class="fa fa-address-card mr-3 text-white fa-fw"></i>
                Agenda
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white font-italic bg-trasparent">
                <i class="fa fa-file-excel mr-3 text-white fa-fw"></i>
                Informes
              </a>
            </li>
          </ul>
       </div>
    </header>
    <style>
  .vertical-nav {
    background-color: grey;
  }
  </style>

    <!-- Start Page content holder -->
    <div class="page-content p-5 text-gray" id="content">
      
    <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bolder"></small></button>
      

      
