        <div class="leftside-menu" style="background-color:#98BAFE">

            <!-- Brand Logo Light -->
            <a href="index.php?action=index" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="logo" style="height: auto; max-height: 100%;" >
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo.png" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="index.php?action=index" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title"><strong>Menú</strong></li>




                    <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                            <i class="bi bi-cart"></i>
                                <span> <strong>Preventas</strong> </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCharts">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="index.php?action=preventas">Mis preventas</a>
                                    </li>
                                    <li>
                                        <a href="index.php?action=formPreventa">Nueva preventa</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>

                   
                    

                    
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                        <i class="bi bi-building"></i>
                        <span> <strong>Comercial </strong></span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages">
                            <ul class="side-nav-second-level">                       
                                <li>
                                    <a href="index.php?action=comercialList">Lista comerciales</a>
                                </li>

                                <?php if($_SESSION['usuario']['rol'] == 1):?>
                                    <li class="side-nav-item">                    
                                        <a href="index.php?action=formComercial" class="side-nav-link">
                                            <span>Nuevo Comercial</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                
                            </ul>
                        </div>
                    </li> 

                    <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                                <i class="bi bi-person"></i>
                                <span> <strong>Cliente</strong> </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPagesAuth">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="index.php?action=clientList">Lista Clientes</a>
                                    </li>
                                    <?php if($_SESSION['usuario']['rol'] == 1):?>
                                        <li>
                                            <a href="index.php?action=formCliente">Nuevo Cliente</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">
                            <i class="bi bi-file-earmark-person"></i>
                                <span> <strong>Contacto</strong> </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarExtendedUI">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="index.php?action=contactList">Lista Contactos</a>
                                    </li>
                                    <?php if($_SESSION['usuario']['rol'] == 1):?>
                                    <li>
                                        <a href="index.php?action=formContacto">Nuevo Contacto</a>
                                    </li>
                                    <?php endif; ?>

                                    <li>
                                </ul>
                            </div>
                        </li>

                </ul>
                <!--- End Sidemenu -->
                <div class="clearfix"></div>
            </div>
        </div>

        