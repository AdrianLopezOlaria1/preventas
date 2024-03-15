<div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Contact List</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Contact List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary rounded-start-0"><i class="ri-search-line fs-16"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <div class="row">
                    <?php
 // Asegúrate de incluir el archivo que contiene la definición de la clase Cliente

// Crear una instancia de la clase Cliente
$cliente = new Cliente();

// Obtener los clientes
$clientes = $cliente->obtenerClientes();

// Verificar si se encontraron clientes
if (!empty($clientes)) {
    // Iterar sobre los clientes y mostrar cada uno
    foreach ($clientes as $cliente) {
        // Acceder a los datos del cliente
        $nombre = $cliente['nombre'];
        // Puedes acceder a más campos del cliente aquí, según lo necesites
        
        // Mostrar el cliente en el formato HTML deseado
        echo '<div class="col-md-6">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<div class="d-flex align-items-start justify-content-between">';
        echo '<div class="d-flex">';
        echo '<div class="info">';
        echo '<h5 class="fs-18 my-1">' . $nombre . '</h5>';
        echo '<p class="text-muted fs-15">' . 'Ocupación' . '</p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="">';
        echo '<a href="#" class="btn btn-success btn-sm me-1 tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ri-pencil-fill"></i></a>';
        echo '<a href="#" class="btn btn-danger btn-sm tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="ri-close-fill"></i></a>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
        echo '<ul class="social-list list-inline mt-3 mb-0">';
        // Aquí podrías incluir enlaces a las redes sociales del cliente si las tienes almacenadas en la base de datos
        echo '</ul>';
        echo '</div>'; // card-body
        echo '</div>'; // card
        echo '</div>'; // col-md-6
    }
} else {
    // Si no se encontraron clientes
    echo "No se encontraron clientes.";
}
?>


                            <!-- card -->
                        </div> <!-- end col -->

      
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"> <i class="ri-arrow-left-s-line lh-sm"></i></a></li>
                                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                                    <li class="active page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                                    <li class="disabled page-item"><a href="#" class="page-link">4</a></li>
                                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"> <i class="ri-arrow-right-s-line lh-sm"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> <!-- container -->

            </div> <!-- content -->



        </div>