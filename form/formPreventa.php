<!-- identado -->
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inforges</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Formularios</a></li>
                                <li class="breadcrumb-item active">Formulario preventas</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Formulario preventas</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Nueva preventa</h4>
                        </div>                         
                        <div class="card-body">                            
                            <form id="formularioPreventa" action="index.php?action=enviarPreventa" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- selector usuarios-->
                                        <div class="mb-3">
                                            <label for="id_usuario" class="form-label">Usuario</label>
                                            <select class="form-select" name="id_usuario" id="usuario">
                                                <option value="">Seleccione usuario</option>
                                                <?php 
                                                    $usuario = new Usuario();
                                                    $usuarios = $usuario->obtenerUsuarios();
                                                    if (!empty($usuarios)) {
                                                        foreach ($usuarios as $u) {
                                                ?>
                                                <?php if($u['status'] != 'D'):?>
                                                    <option value="<?=$u['id']?>">
                                                        <?=$u['nombre']?>
                                                    </option>
                                                <?php endif;?>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>

                                            <div id="usuarioError"></div>
                                                                                        
                                        </div>
                                        <!-- fin selector usuarios -->

                                        <!-- selector comerciales-->
                                        <div class="mb-3">
                                            <label for="id_comercial" class="form-label">Comercial</label>
                                            <select class="form-select" id="id_comercial" name="comercial">
                                            <option value="">Seleccione comercial</option>
                                            <?php 
                                                $comerciales = new Comercial();
                                                $comerciales = $comerciales->obtenerComerciales();
                                                if (!empty($comerciales)) {
                                                    foreach ($comerciales as $c) {
                                                        if($c['status'] != 'D'):
                                            ?>
                                            <option value="<?=$c['id']?>">
                                                <?=$c['nombre']?>
                                            </option>
                                            <?php 
                                                endif;
                                                    }
                                                }
                                            ?>                                  
                                            </select>
                                            <div id="divErrorComercial"></div>
                                        </div>
                                        
                                        <!-- fin selector comerciales -->                    
                                        <div class="mb-3">
                                            <label for="fecha_reunion" class="form-label">Fecha de la reunión</label>
                                            <input class="form-control" id="fecha_reunion" type="date" name="fecha_reunion">    
                                            <div id="divErrorReunion"></div>                                        
                                        </div>

                                        <div class="mb-3">
                                            <label for="horas" class="form-label">Horas previstas</label>
                                            <input class="form-control" id="horas" type="number" name="horas_previstas">
                                            <div id="divErrorHoras"></div>
                                        </div>                                                                             
                                        <div class="mb-3">
                                            <label for="acta_reunion" class="form-label">Detalles acta de la reunión</label>
                                            <textarea class="form-control" id="acta_reunion" name="acta_reunion" rows="14"></textarea>    
                                                                                    
                                        </div>  
                                        <div id="divErrorActa"></div>                                                                                                                          
                                    </div> <!-- end col -->
                                    <div class="col-lg-6">
                                        <!-- selector clientes -->
                                        <div class="mb-3">
                                            <label for="id_cliente" class="form-label">Cliente</label>
                                            <select class="form-select" name="id_cliente" id="cliente" onchange="cargarContactos()">
                                                <option value="">Seleccione cliente</option>
                                                <?php 
                                                    $cliente = new Cliente();
                                                    $clientes = $cliente->obtenerClientes();
                                                    if (!empty($clientes)) {
                                                        foreach ($clientes as $c) {
                                                ?>
                                                <?php if($c['status'] != 'D'):?>
                                                    <option value="<?=$c['id']?>">
                                                        <?=$c['nombre']?>
                                                    </option>
                                                <?php endif;?>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <div id="divErrorCliente"></div>                                          
                                        </div>
                                        <!-- fin selector clientes -->

                                        <!-- selector contactos -->
                                        <div class="mb-3">
                                            <label for="id_contacto" class="form-label">Contacto</label>
                                            <select class="form-select" name="id_contacto" id="contacto">
                                                <option value="">Seleccione contacto</option>
                                            </select>  
                                            <div id="divErrorContacto"></div>                                          
                                        </div>
                                        <!-- fin selector contactos -->
                                        
                                        <!-- selector tipos -->
                                        <div class="mb-3">
                                            <label for="id_tipo" class="form-label">Tipo de proyecto</label>
                                            <select class="form-select" name="id_tipo" id="id_tipo">
                                                <option value="">Seleccione tipo</option>
                                                <?php 
                                                    $tipo = new Tipo();
                                                    $tipos = $tipo->obtenerTipos();
                                                    if (!empty($tipos)) {
                                                        foreach ($tipos as $t) {
                                                ?>
                                                <option value="<?=$t['id']?>">
                                                    <?=$t['nombre']?>
                                                </option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <div id="divErrorTipo"></div>
                                        </div>
                                        <!-- fin selector tipos --> 

                                        <div class="mb-3">
                                            <label for="fecha_presentacion" class="form-label">Fecha presentación propuesta</label>
                                            <input class="form-control" id="fecha_presentacion" type="date" name="fecha_presentacion">      
                                            <div id="divErrorPresentacion"></div>                                  
                                        </div>  

                                        <div class="mb-3">
                                            <label for="importe" class="form-label">Precio estimado</label>
                                            <input class="form-control" id="importe" type="number" name="importe">
                                            <div id="divErrorPrecio"></div>  
                                        </div>                                    
                                        <div class="mb-3 form-control dropzone">
                                           
                                                
                                                
                                            <h3 style="text-align:center;">Arrastra los archivos o clica para subir<i class="h1 text-muted ri-upload-cloud-2-line"></i></h3>
                                            <input class="form-control dropzone" id="archivo" type="file" name="archivo" style="opacity:0;" onchange="updateFileName(this)">
                                            
                                            <span id="file-name-info"></span>
                                        </div>

                                        
                                                                                
                                        <button type="submit" id="botonEnviar" class="btn btn-primary" >Enviar</button> 

                                    </div> <!-- end col -->                            
                                </div> <!-- end row -->
                            </form>
                            <?php $preventa = new Preventa(); $preventa->borrarErrores(); ?>
                        </div> <!-- end card body -->                                                                                                                 
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end content -->
</div><!-- end content-page -->
 
<script>
let botonEnviar;

// valores formulario
let usuarioElegido;
let comercialElegido;
let fechaReunionElegido;
let horasElegidas;
let actaElegido;
let clienteElegido;
let contactoElegido;
let tipoProyectoElegido;
let fechaPresentacionElegido;
let precioElegido;
let archivoElegido;

let campoCompleto;

const TIPO_INTEGER_S = "INTEGER_S";
const TIPO_INTEGER_C = "INTEGER_C";
const TIPO_DATE = "DATE";
const TIPO_STRING = "STRING";
const regex = /<[^>]+>|&[a-zA-Z]+;/g;

let divErrorUsuario;
let divErrorComercial;
let divErrorCliente;
let divErrorReunion;
let divErrorHoras;
let divErrorActa;
let divErrorPropuesta;
let divErrorPrecio;
let divErrorContacto;
let divErrorTipo;
let divErrorPresentacion;

let div;
let content;

let errores;

document.addEventListener("DOMContentLoaded", function () {
    botonEnviar = document.getElementById("botonEnviar");

    divErrorUsuario = document.getElementById("usuarioError");
    divErrorComercial = document.getElementById("divErrorComercial");
    divErrorCliente = document.getElementById("divErrorCliente");
    divErrorTipo = document.getElementById("divErrorTipo");
    divErrorReunion = document.getElementById("divErrorReunion");
    divErrorHoras = document.getElementById("divErrorHoras");
    divErrorActa = document.getElementById("divErrorActa");
    divErrorContacto = document.getElementById("divErrorContacto");
    divErrorPresentacion = document.getElementById("divErrorPresentacion");
    divErrorPrecio = document.getElementById("divErrorPrecio")
    
    botonEnviar.addEventListener('click', enviarForm);
});

function obtenerDatos(){
    usuarioElegido = document.getElementById("usuario").value;
    comercialElegido = document.getElementById("id_comercial").value;
    fechaReunionElegido = document.getElementById("fecha_reunion").value;
    horasElegidas = document.getElementById("horas").value;
    actaElegido = document.getElementById("acta_reunion").value;
    clienteElegido = document.getElementById("cliente").value; 
    contactoElegido = document.getElementById("contacto").value;
    tipoProyectoElegido = document.getElementById("id_tipo").value;
    fechaPresentacionElegido = document.getElementById("fecha_presentacion").value;
    precioElegido = document.getElementById("importe").value;
    archivoElegido = document.getElementById("archivo").value;
    

}

function comprobarDato(dato, tipo){
    campoCompleto = true;
    console.log(dato);

    switch(tipo){
        case "INTEGER_S":
            if (dato === "" || isNaN(Number(dato))){ //comprueba que esta vacio o que no es numero
                campoCompleto = false;
            }
            break;
        case "DATE":
            if (isNaN(Date.parse(dato))) {
                campoCompleto = false;
            }
            break;
        case "INTEGER_C":
             if (isNaN(Number(dato)) || (dato < 0)){
                campoCompleto = false;
             }
            break;
        case "STRING":
                // Expresión regular para buscar etiquetas HTML y secuencias de escape de JavaScript
               
                if (regex.test(dato)) {
                    campoCompleto = false;
                }
            break;
        default:
            console.log("VALOR INCORRECTO");
            break;
    }
    return campoCompleto;
}

function enviarForm(){
    event.preventDefault();
    limpiarContenedores([divErrorUsuario, divErrorComercial, divErrorCliente, divErrorReunion, divErrorHoras, divErrorActa, divErrorTipo, divErrorContacto, divErrorPresentacion, divErrorPrecio,divErrorContacto,]);
    errores = 0;

    obtenerDatos();

    if(!(comprobarDato(usuarioElegido,TIPO_INTEGER_S))){
        errores++;

        mensaje = "El usuario no esta seleccionado";
        lugar = divErrorUsuario;

        mostrarError(mensaje,lugar);
    }

    if(!(comprobarDato(clienteElegido,TIPO_INTEGER_S))){
        errores++;
        
        mensaje = "No has marcado un cliente";
        lugar = divErrorCliente;

        mostrarError(mensaje,lugar);

    }

    if(fechaReunionElegido !== ""){
        
        if(!(comprobarDato(fechaReunionElegido,TIPO_DATE))){
            errores++;
        
            mensaje = "Fecha no válida";
            lugar = divErrorReunion;

            mostrarError(mensaje,lugar);
        }
    }

    if(horasElegidas !== ""){
        
        if(!(comprobarDato(horasElegidas,TIPO_INTEGER_C))){
            errores++;
        
            mensaje = "Horas no válidas";
            lugar = divErrorHoras;

            mostrarError(mensaje,lugar);
        }
    }

    if(actaElegido !== ""){
        
        if(!(comprobarDato(actaElegido,TIPO_STRING))){
            errores++;
        
            mensaje = "Carácteres no válidos, no se aceptan etiquetas html ni carácteres de escape de JavaScript";
            lugar = divErrorActa;

            mostrarError(mensaje,lugar);
        }
    }

    if(contactoElegido !== ""){
        
        if(!(comprobarDato(contactoElegido,TIPO_INTEGER_C))){
            errores++;
        
            mensaje = "Contacto no válido";
            lugar = divErrorContacto;

            mostrarError(mensaje,lugar);
        }
    }

    if(fechaPresentacionElegido !== ""){
        
        if(!(comprobarDato(fechaPresentacionElegido,TIPO_DATE))){
            errores++;
        
            mensaje = "Fecha no válida";
            lugar = divErrorPresentacion;

            mostrarError(mensaje,lugar);
        }
    }

    if(precioElegido !== ""){
        
        if(!(comprobarDato(precioElegido,TIPO_INTEGER_C))){
            errores++;
        
            mensaje = "Precio no válido";
            lugar = divErrorPrecio;

            mostrarError(mensaje,lugar);
        }
    }
    


    if(!(comprobarDato(comercialElegido,TIPO_INTEGER_S))){
        errores++;
        
        mensaje = "No has marcado un comercial";
        lugar = divErrorComercial;

        mostrarError(mensaje,lugar);
    }

    
    if(!(comprobarDato(tipoProyectoElegido,TIPO_INTEGER_S))){
        errores++;
        
        mensaje = "No has marcado un tipo";
        lugar = divErrorTipo;
        
        mostrarError(mensaje,lugar);
        
    }
    



    

    if (errores ===0) {
        document.getElementById("formularioPreventa").submit();
        
    }
    errores = 0;


}

function mostrarError(error, lugar){
    
    lugar = lugar;

    div = document.createElement("p");
    content = document.createTextNode(error);

    div.appendChild(content);
    div.classList.add("alert", "alert-warning");
    
    lugar.appendChild(div);
  }

function limpiarContenedores(contenedores) {
    // Iterar sobre cada contenedor
    contenedores.forEach(contenedor => {
        // Eliminar todos los elementos hijos del contenedor
        while (contenedor.firstChild) {
            contenedor.removeChild(contenedor.firstChild);
        }
    });
}




// funciones de cargar contactos y funcionamiento del formulario

function cargarContactos() {
    var idCliente = document.getElementById("cliente").value;
    if (idCliente) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "metodos/obtener_contactos.php?id_cliente=" + idCliente);
        xhr.onload = function() {
            if (xhr.status === 200) {                    
                var contactos = JSON.parse(xhr.responseText);                                                      
                var selectorContacto = document.getElementById("contacto");
                selectorContacto.innerHTML = "";
                var opcionSeleccionar = document.createElement("option");
                opcionSeleccionar.value = "";
                opcionSeleccionar.textContent = "Seleccione contacto";
                selectorContacto.appendChild(opcionSeleccionar);
                for (var i = 0; i < contactos.length; i++) {
                    var opcion = document.createElement("option");
                    opcion.value = contactos[i].id;                    
                    opcion.textContent = contactos[i].nombre;
                    if(contactos[i].status != 'D'){
                        selectorContacto.appendChild(opcion);
                    }
                }
            } else {
                alert("Error al obtener los contactos: " + xhr.statusText);
            }
        };
        xhr.send();
    } else {
        var selectorContacto = document.getElementById("contacto");
        selectorContacto.innerHTML = "";
    }
}

function updateFileName(input) {
    var fileNameInfo = document.getElementById('file-name-info');
    if (input.files.length > 0) {
        fileNameInfo.textContent = input.files[0].name;
    } else {
        fileNameInfo.textContent = 'Ningún archivo seleccionado';
    }
}
</script>



