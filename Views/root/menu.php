
  <body>
  <section id="container" class=""> 
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Menú" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <a href="/user" class="logo">Suministros <span class="lite">Atlantis </span><i class="icon_lock_alt"></i></a>

      <div class="top-nav notification-row">                
        <ul class="nav pull-right top-menu">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" src="">
              </span>
              <span class="username"> <?php echo $_SESSION['user_name'] ?> </span>
              <b class="caret"></b>
            </a>

            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a href="#"><i class="icon_profile"></i> Mi Perfil</a>
                </li>
                <li>
                  <a href="/logout"><i class="icon_key_alt"></i> Cerrar Sesión</a>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>      
  </section>

  <aside>
    <div id="sidebar"  class="nav-collapse ">

      <ul class="sidebar-menu">                
        <li class="active">
          <a class="" href="/user">
            <i class="icon_house"></i>
            <span>Inicio</span>
          </a>
        </li>
        
        <li class="">
            <a href="/user/setSuministro" class="">
              <i class="icon_folder-open"></i>
              <span>Suministros</span>
            </a>
        </li> 
        
        <li class="">
          <a href="/user/getDependencia" class="" >
              <i class="icon_archive"></i>
              <span>Dependencias</span>
          </a>
        </li>      

        <li class="">
          <a href="/user/getEmpleado" class="">
            <i class="icon_profile"></i>
            <span>Empleados</span>
          </a>
        </li>
                  
        <li class="">
          <a href="/user/getProveedor" class="">
            <i class="icon_group"></i>
            <span>Proveedores</span>
          </a>
        </li>
        
        <li class="">
          <a href="/user/getCompra" class="">
            <i class="icon_cart"></i>
            <span>Compras</span>
          </a>
        </li>

        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon_document_alt"></i>
            <span>Solicitudes</span>
            <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="/user/setSolicitud">Hacer solicitud</a></li>
            <li><a class="" href="/user/getSolicitud">Solicitudes</a></li>
          </ul>
        </li>
        
        <li class="">
          <a href="/logout" class="">
            <i class="ion-power"></i>
            <span>Cerrar Sesión</span>
          </a>
        </li>            
      </ul>
    </div>
  </aside>
