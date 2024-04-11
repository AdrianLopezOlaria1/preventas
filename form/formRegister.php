<body class="authentication-bg">

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden bg-opacity-25">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="assets/images/auth-img.jpg" alt="" class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="index.php" class="logo-light">
                                            <img src="assets/images/logo.png" alt="logo" style="height: auto; max-height: 100%;">
                                        </a>
                                        <a href="index.php" class="logo-dark">
                                            <img src="assets/images/logo.png" alt="dark logo" style="height: auto; max-height: 100%;">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Registrate Gratis</h4>
                                        <p class="text-muted mb-3">Introduce tu nombre, tu correo y una contraseña para 
                                            registrarte</p>                                        
                                        <!-- form -->
                                        <form method="POST" action="index.php?action=enviarRegister" >
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Nombre completo</label>
                                                <input class="form-control" name="nombre" type="text" id="fullname"
                                                    placeholder="Introduce tu nombre">
                                                    <?php if(isset($_SESSION['error']['nombre'])): ?>
                                                        <div class='alert alert-warning'>
                                                            <?=$_SESSION['error']['nombre'];?>
                                                        </div>
                                                    <?php endif; ?>        
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Correo</label>
                                                <input class="form-control" name="email" type="email" id="emailaddress"
                                                    placeholder="Introduce tu correo">
                                                    <?php if(isset($_SESSION['error']['email'])): ?>
                                                        <div class='alert alert-warning'>
                                                            <?=$_SESSION['error']['email'];?>
                                                        </div>
                                                    <?php endif; ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Contraseña</label>
                                                <input class="form-control" name="password" type="password" id="password"
                                                    placeholder="Introduce una contraseña">
                                                    <?php if(isset($_SESSION['error']['password'])): ?>
                                                        <div class='alert alert-warning'>
                                                            <?=$_SESSION['error']['password'];?>
                                                        </div>
                                                    <?php endif; ?>
                                            </div>                                            
                                            <!-- Escoger rol -->
                                            <!--
                                            <div class="mb-3">
                                                <div class="">
                                                    <label for="rol">Rol:</label>
                                                    <select id="rol" name="rol">
                                                        <option value="1" name="">Administrador</option>
                                                        <option value="0" selected>Usuario</option>
                                                    </select><br><br>
                                                </div>
                                            </div>
                                            -->
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="checkbox-signup" name="check">
                                                    <label class="form-check-label" for="checkbox-signup">Acepto <a
                                                            href="javascript: void(0);" class="text-muted">los terminos y 
                                                            las condiciones</a></label>
                                                </div>
                                            </div> 
                                            <?php if(isset($_SESSION['error']['check'])): ?>
                                                <div class='alert alert-warning'>
                                                    <?=$_SESSION['error']['check'];?>
                                                </div>
                                            <?php endif; ?>                                                                                     
                                            <div class="mb-0 d-grid text-center">
                                                <button class="btn btn-primary fw-semibold" type="submit" name="register">Registrarme

                                                </button>
                                            </div>
                                            <!-- <div class="text-center mt-4">
                                                <p class="text-muted fs-16">Sign in with</p>
                                                <div class="d-flex gap-2 justify-content-center mt-3">
                                                    <a href="javascript: void(0);" class="btn btn-soft-primary"><i
                                                            class="ri-facebook-circle-fill"></i></a>
                                                    <a href="javascript: void(0);" class="btn btn-soft-danger"><i
                                                            class="ri-google-fill"></i></a>
                                                    <a href="javascript: void(0);" class="btn btn-soft-info"><i
                                                            class="ri-twitter-fill"></i></a>
                                                    <a href="javascript: void(0);" class="btn btn-soft-dark"><i
                                                            class="ri-github-fill"></i></a>
                                                </div>
                                            </div> -->
                                        </form>
                                        <?php $usuario = new Usuario(); $usuario->borrarErrores(); ?>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">¿Ya tienes cuenta? <a href="index.php"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Inicia sesión</b></a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark-emphasis">
            <script>document.write(new Date().getFullYear())</script> © Inforges
        </span>
    </footer>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>