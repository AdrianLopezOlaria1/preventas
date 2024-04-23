# preventas
-------------------------
CREATE TABLE preventas (
    id INT AUTO_INCREMENT,
    id_cliente INT,
    id_comercial INT,    
    id_tipo INT,  
    fecha_solicitud DATETIME,
    fecha_reunion DATE,
    acta_reunion VARCHAR(255),
    horas_previstas INT,
    importe DECIMAL(10, 2),
    status VARCHAR(50),
    fecha_accion DATE,    
    id_contacto INT,
    id_usuario INT,
    fecha_presentacion DATE,    
    archivo VARCHAR(255),
    CONSTRAINT PRIMARY KEY (id),
    CONSTRAINT fk_pre_cli FOREIGN KEY (id_cliente) REFERENCES clientes(id),
    CONSTRAINT fk_pre_com FOREIGN KEY (id_comercial) REFERENCES comerciales(id),
    CONSTRAINT fk_pre_cont FOREIGN KEY (id_contacto) REFERENCES personas_contacto(id),
    CONSTRAINT fk_pre_tip FOREIGN KEY (id_tipo) REFERENCES tipos_proyectos(id),
    CONSTRAINT fk_pre_usu FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-------------------------------------------------------------------------------
