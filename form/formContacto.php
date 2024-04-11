


<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inforges</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Formularios</a></li>
                                <li class="breadcrumb-item active">Formulario de contactos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Formulario de contactos</h4>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Crear nuevo contacto</h4>
                            <p class="text-muted mb-0">
                            Ingrese la información del nuevo contacto aquí.
                            </p>
                        </div>
                        <div class="card-body">                            
                            <form method="POST" action="index.php?action=enviarContacto">
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Nombre de contacto</label>
                                    <input type="text" class="form-control" id="exampleInputName1"
                                        aria-describedby="nameHelp" placeholder="Ingrese nombre de contacto" name="nombre">
                                    <?php if(isset($_SESSION['error']['nombre'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['nombre'];?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Ingrese email del contacto" name="email">
                                    <?php if(isset($_SESSION['error']['email'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['email'];?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputTel1" class="form-label">Número de teléfono</label>
                                    <input type="text" class="form-control" id="exampleInputTel1"
                                        aria-describedby="telHelp" placeholder="Ingrese teléfono del contacto" name="tel">
                                    <?php if(isset($_SESSION['error']['tel'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['tel'];?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- selector -->
                                <div class="mb-3">
                                    <label for="id_cliente" class="form-label">Cliente</label>
                                    <select class="form-select" name="id_cliente" id="cliente">
                                        <option value="">Seleccione cliente</option>
                                        <?php 
                                            $cliente = new Cliente();
                                            $clientes = $cliente->obtenerClientes();
                                            if (!empty($clientes)) {
                                                foreach ($clientes as $c) {
                                                    if ($c['status'] != 'D') {
                                        ?>
                                        <option value="<?=$c['id']?>">

                                            <?=$c['nombre']?>
                                        </option>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php if(isset($_SESSION['error']['id_cliente'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['id_cliente'];?>
                                        </div>
                                    <?php endif; ?>
                                    <small id="emailHelp" class="form-text text-muted">El email no debe estar
                                    previamente registrado.</small>
                                </div>
                                <!-- fin selector -->
                                
                                <button type="submit" class="btn btn-primary" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;" 
                                        onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
                                        onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';"
                                        >Crear</button>
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