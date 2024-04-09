<div class="navbar-custom" style="background-color:#0075bc;">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->

                        
                        <a href="index.php?action=index" class="logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/logo.png" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/logo.png" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="index.php?action=index" class="logo-dark">
                            <span class="logo-lg">
                                <img src="assets/images/logo.png" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/logo.png" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->
                    <!-- <div class="app-search d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search...">
                                <span class="ri-search-line search-icon text-muted"></span>
                            </div>
                        </form>
                    </div> -->
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line fs-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12">
                            <span class="align-middle">Español</span>
                        </a>
                         
                    </li>



                    

                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode">
                            <i class="ri-moon-line fs-22"></i>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal"><?php echo isset($_SESSION['usuario']['nombre']) ? $_SESSION['usuario']['nombre'] : 'Error'; ?>
                            <i
                                        class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bienvenido !</h6>
                            </div>

                            <!-- item-->
                            <a href="index.php?action=profile" class="dropdown-item">
                                <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                <span>Mi cuenta</span>
                            </a>

                            <!-- item-->
                            <a href="index.php?action=profile#edit-profile" class="dropdown-item">
                                <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                                <span>Ajustes</span>
                            </a>

                            <!-- item-->
                            <!-- <a href="index.php?action=support" class="dropdown-item">
                                <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
                                <span>Support</span>
                            </a> -->

                            <!-- item-->
                            <!-- <a href="auth-lock-screen.html" class="dropdown-item">
                                <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
                                <span>Lock Screen</span>
                            </a> -->

                            <!-- item-->
                            <a href="index.php?action=cerrando" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Salir</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

        <script>
    $(document).ready(function () {
        $('.change-language').click(function () {
            var lang = $(this).data('lang');
            // Aquí puedes agregar la lógica para cambiar el idioma del sitio web
            // Por ejemplo, puedes usar una variable global para almacenar el idioma seleccionado
            // Y luego cambiar el contenido de la página según el idioma seleccionado
            console.log('Se seleccionó el idioma: ' + lang);
            // Aquí puedes agregar más lógica según sea necesario
        });
    });
</script>
