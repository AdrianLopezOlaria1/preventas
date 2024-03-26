        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="index.php?action=index" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="logo">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="index.html" class="logo logo-dark">
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

                    <li class="side-nav-title">Main</li>

                    <li class="side-nav-item">
                        <a href="index.php?action=preventas" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>
                            <span class="badge bg-success float-end">9+</span>
                            <span>Mis Preventas</span>
                        </a>
                    </li>

                    <li class="side-nav-item">                    
                        <a href="index.php?action=formPreventa" class="side-nav-link">
                        <i class="bi bi-cart"></i>
                            <span>Nueva Preventa</span>
                        </a>
                    </li>

                    <li class="side-nav-item">                    
                        <a href="index.php?action=clientList" class="side-nav-link">
                        <i class="bi bi-cart"></i>
                            <span>Clientes</span>
                        </a>
                    </li>
                    <?php if($_SESSION['usuario']['rol'] == 1):?>
                    <li class="side-nav-item">                    
                        <a href="index.php?action=formCliente" class="side-nav-link">
                        <i class="bi bi-cart"></i>
                            <span>Nuevo cliente</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="side-nav-item">                    
                        <a href="index.php?action=contactList" class="side-nav-link">
                        <i class="bi bi-cart"></i>
                            <span>Contactos</span>
                        </a>
                    </li>
                    <?php if($_SESSION['usuario']['rol'] == 1):?>
                    <li class="side-nav-item">                    
                        <a href="index.php?action=formContacto" class="side-nav-link">
                        <i class="bi bi-cart"></i>
                            <span>Nuevo contacto</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="side-nav-item">                    
                        <a href="index.php?action=comercialList" class="side-nav-link">
                        <i class="bi bi-cart"></i>
                            <span>Comercial</span>
                        </a>
                    </li>
                    <?php if($_SESSION['usuario']['rol'] == 1):?>
                    <li class="side-nav-item">                    
                        <a href="index.php?action=formComercial" class="side-nav-link">
                        <i class="bi bi-cart"></i>
                            <span>Nuevo comercial</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <!-- <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                            <i class="ri-pages-line"></i>
                            <span> Listas </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?action=clientList">Client List</a>
                                </li>
                                <li>
                                    <a href="index.php?action=contactList">Contact List</a>
                                </li>                                
                                <li>
                                    <a href="index.php?action=comercialList">Comercial List</a>
                                </li>
                                <li>
                                    <a href="pages-timeline.html">Timeline</a>
                                </li>
                                <li>
                                    <a href="pages-invoice.html">Invoice</a>
                                </li>
                                <li>
                                    <a href="pages-faq.html">FAQ</a>
                                </li>
                                <li>
                                    <a href="pages-pricing.html">Pricing</a>
                                </li>
                                <li>
                                    <a href="pages-maintenance.html">Maintenance</a>
                                </li>
                                <li>
                                    <a href="error-404.html">Error 404</a>
                                </li>
                                <li>
                                    <a href="error-404-alt.html">Error 404-alt</a>
                                </li>
                                <li>
                                    <a href="error-500.html">Error 500</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                </ul>
                <!--- End Sidemenu -->
                <div class="clearfix"></div>
            </div>
        </div>

        