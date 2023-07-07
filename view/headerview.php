<html>
  
  <head>
    <title>Common Cents Party</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="resources/css/styles.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
       <div class="vertical-nav bg-white" id="sidebar">
          <div class="py-4 px-3 mb-2 mt-2 bg-light">
            <div class="align-items-center" id="half">    
            <div id="image" >
             <img src="resources/img/NOSTROMO-LOGISTIC_logo.png" alt="...">
           </div>
            </div>
          </div>
          <p class="text-gray font-weight-bold text-uppercase px-3 small pb-3 mb-2 mt-3">Main</p>
          <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
              <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-truck mr-3 text-primary fa-fw"></i>Vehiculos
              </a>  
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-list mr-3 text-primary fa-fw"></i>listados
              </a>  
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Agenda
              </a>
            </li>
          </ul>
       </div>
    </header>

    <!-- Start Page content holder -->
    <div class="page-content p-5" id="content">
      
    <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bolder">Esconder</small></button>
      
    <!-- Content Header -->   
        <h2 class="display-4 font-weight-bold text-center text-white">NOSTROMO LOGISTIC</h2>
        <div class="separator mt-4"></div>
      
    <!-- content -->
        <figure class="mb-4" id="img-div">
           <div id="image" >
             <img src="resources/img/NOSTROMO-LOGISTIC_logo.png" alt="...">
           </div>
         </figure>
  
        <div class="row text-white">
    <div class="col-lg-7 mx-auto">
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p class="lead text-white">Here's a list of<a href="#" class="text-white">
        <u>upcoming shows</u></a>.
  </p>
    </div>
  </div>
      
    </div>
      

  </body>
  
  
  
</html>