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
                                        <a href="index.html" class="logo-light">
                                            <img src="assets/images/logo.png" alt="logo" height="22">
                                        </a>
                                        <a href="index.html" class="logo-dark">
                                            <img src="assets/images/logo-dark.png" alt="dark logo" height="22">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Create new contact</h4>
                                        <p class="text-muted mb-3">Enter contact information</p>

                                        <?php if(isset($_SESSION['completado'])): ?>
                                            <div class='alert alert-success'>
                                                <?=$_SESSION['completado'];?>
                                            </div>
                                        <?php endif; ?>
                                        <!-- form -->
                                        <form method="POST" action="index.php?action=enviarContacto" >
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Contact name</label>
                                                <input class="form-control" name="nombre" type="text" id="fullname"
                                                    placeholder="Enter contact name">
                                                    <?php if(isset($_SESSION['error']['nombre'])): ?>
                                                        <div class='alert alert-warning'>
                                                            <?=$_SESSION['error']['nombre'];?>
                                                        </div>
                                                    <?php endif; ?>        
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" name="email" type="email" id="emailaddress"
                                                    placeholder="Enter the contact's email address">
                                                    <?php if(isset($_SESSION['error']['email'])): ?>
                                                        <div class='alert alert-warning'>
                                                            <?=$_SESSION['error']['email'];?>
                                                        </div>
                                                    <?php endif; ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Phone number</label>
                                                <input class="form-control" name="tel" type="text" id="tel"
                                                    placeholder="Enter the contact's phone number">
                                                    <?php if(isset($_SESSION['error']['tel'])): ?>
                                                        <div class='alert alert-warning'>
                                                            <?=$_SESSION['error']['tel'];?>
                                                        </div>
                                                    <?php endif; ?>
                                            </div>                                            
                                            <!-- selector clientes -->
                                            <div class="mb-3">
                                                <label for="id_cliente" class="form-label">Client</label>
                                                <select class="form-select" name="id_cliente" id="cliente">
                                                    <option value="">Select client</option>
                                                    <?php 
                                                        $cliente = new Cliente();
                                                        $clientes = $cliente->obtenerClientes();
                                                        if (!empty($clientes)) {
                                                            foreach ($clientes as $c) {
                                                    ?>
                                                    <option value="<?=$c['id']?>">
                                                        <?=$c['nombre']?>
                                                    </option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- fin selector -->
                                            <div class="mb-0 d-grid text-center">
                                                <button class="btn btn-primary fw-semibold" type="submit" name="register">Create
                                                </button>
                                            </div>                                        
                                        </form>
                                        <?php $contacto = new Contacto(); $contacto->borrarErrores(); ?>
                                        <!-- end form-->
                                        <br><br>
                                        <a href="index.php?action=index">Volver</a>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
