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
                                <li class="breadcrumb-item active">Formulario Comerciales</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Formulario comerciales</h4>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Crear nuevo comercial</h4>
                            <p class="text-muted mb-0">
                            Ingrese la información del nuevo comercial aquí.
                            </p>
                        </div>
                        <div class="card-body">                            
                            <form method="POST" action="index.php?action=enviarComercial">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre de comercial</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Ingrese nombre del comercial" name="nombre">
                                        <?php if(isset($_SESSION['error']['nombre'])): ?>
                                            <div class='alert alert-warning'>
                                                <?=$_SESSION['error']['nombre'];?>
                                            </div>
                                         <?php endif; ?>
                                        <label for="exampleInputEmail2" class="form-label">Comercial email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2"
                                    aria-describedby="emailHelp" placeholder="Ingrese email del comercial" name="email">
                                    <?php if(isset($_SESSION['error']['email'])): ?>
                                        <div class='alert alert-warning'>
                                            <?=$_SESSION['error']['email'];?>
                                        </div>
                                    <?php endif; ?>
                                    <small id="emailHelp" class="form-text text-muted">El email no debe estar previamente
                                    registrado</small>

                                    
                                </div>
                                
                                <button type="submit" class="btn btn-primary" style="background-color: #f93215; color: white; padding: 10px 20px; border: none; transition: all 0.3s ease; border-radius: 20px;" 
                                        onmouseover="this.style.backgroundColor='#2d9cfc'; this.style.transform='scale(1.1)';"
                                        onmouseout="this.style.backgroundColor='#f93215'; this.style.transform='scale(1)';"
                                        >Crear</button>
                                
                            </form>
                            <?php $comercial = new Comercial(); $comercial->borrarErrores(); ?>          
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
            

    
