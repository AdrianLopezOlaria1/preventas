<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="assets/images/auth-img.jpg" alt="" class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="index.php?action=register" class="logo-light">
                                            <img src="assets/images/logo.png" alt="logo" style="height: auto; max-height: 100%;">
                                        </a>
                                        <a href="index.php?action=register" class="logo-dark">
                                            <img src="assets/images/logo.png" alt="dark logo" style="height: auto; max-height: 100%;">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Inicio de sesión</h4>
                                        <p class="text-muted mb-3">Introduce tu correo y tu contraseña para
                                            acceder a tu cuenta.
                                        </p>
                                        <?php if(isset($_SESSION['error_login'])): ?>
                                            <div class='alert alert-warning'>
                                                <?=$_SESSION['error_login'];?>
                                            </div>
                                        <?php endif; ?>
                                        <!-- form -->
                                        <form action="index.php?action=enviarLogin" method="POST">
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Correo</label>
                                                <input class="form-control" type="email" id="emailaddress"
                                                    placeholder="Introduce tu correo" name="email">                        
                                            </div>
                                            <div class="mb-3">
                                            <a href="#" class="text-muted float-end" id="forgotPasswordLink"><small>Has olvidado tu contraseña?</small></a>

                                                <label for="password" class="form-label">Contraseña</label>
                                                <input class="form-control" type="password" id="password"
                                                    placeholder="Introduce tu contraseña" name="password">                                                    
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="checkbox-signin">
                                                    <label class="form-check-label" for="checkbox-signin">Recordarme
                                                        </label>
                                                </div>
                                            </div>

                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"><i
                                                        class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Iniciar
                                                            sesión
                                                        </span> </button>
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
                    <p class="text-dark-emphasis">¿No tienes cuenta? <a href="index.php?action=register"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Registrate</b></a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>document.write(new Date().getFullYear())</script> © Inforges
        </span>
    </footer>
    <!-- Vendor js -->
    <script>
document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
    e.preventDefault();
    var emailAddress = 'admin@admin.com'; // Reemplaza con tu dirección de correo electrónico
    var subject = 'Recuperación de contraseña'; // Asunto del correo electrónico
    var body = 'Hola, he olvidado mi contraseña. ¿Puedes ayudarme a recuperarla? Mi nombre de usuario es:___ (Proporcionar datos, como fecha de creación, '+
    'correo de cuenta, skype, descripción, acciones...'; // Contenido del cuerpo del correo electrónico

    // Construir el enlace para enviar un correo electrónico
    var mailtoLink = 'mailto:' + encodeURIComponent(emailAddress) + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);

    // Abrir el cliente de correo electrónico predeterminado con el enlace de correo electrónico
    window.location.href = mailtoLink;
});

</script>