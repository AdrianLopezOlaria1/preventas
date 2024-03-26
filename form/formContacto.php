


<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Contacts</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Form Contacts</h4>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Create new contact</h4>
                            <p class="text-muted mb-0">
                            Enter the new contact information here.
                            </p>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_SESSION['completado'])): ?>
                                <div class='alert alert-success'>
                                    <?=$_SESSION['completado'];?>
                                </div>
                            <?php endif; ?>
                            <form method="POST" action="index.php?action=enviarContacto">
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Contact name</label>
                                    <input type="text" class="form-control" id="exampleInputName1"
                                        aria-describedby="nameHelp" placeholder="Enter contact name" name="nombre">
                                    <?php if(isset($_SESSION['error']['nombre'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['nombre'];?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter contact email" name="email">
                                    <?php if(isset($_SESSION['error']['email'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['email'];?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputTel1" class="form-label">Phone number</label>
                                    <input type="text" class="form-control" id="exampleInputTel1"
                                        aria-describedby="telHelp" placeholder="Enter contact phone number" name="tel">
                                    <?php if(isset($_SESSION['error']['tel'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['tel'];?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- selector -->
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
                                    <?php if(isset($_SESSION['error']['id_cliente'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['id_cliente'];?>
                                        </div>
                                    <?php endif; ?>
                                    <small id="emailHelp" class="form-text text-muted">The email must not be previously
                                        registered</small>
                                </div>
                                <!-- fin selector -->
                                
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                            <?php $contacto = new Contacto(); $contacto->borrarErrores(); ?>          
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <!-- end col -->
                                    </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>