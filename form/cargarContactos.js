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