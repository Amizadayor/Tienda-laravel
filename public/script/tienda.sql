DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda;
USE tienda;

CREATE TABLE categoria (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    estado_categoria ENUM('activa', 'inactiva')
);

CREATE TABLE marca (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    estado_marca ENUM('activa', 'inactiva')
);

CREATE TABLE cliente (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(100),
    fecha_nacimiento DATE,
    ciudad VARCHAR(100),
    codigo_postal VARCHAR(20),
    pais VARCHAR(100),
    notas TEXT
);

CREATE TABLE empleado (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(100),
    puesto VARCHAR(100),
    salario DECIMAL(10, 2),
    fecha_contratacion DATE,
    fecha_nacimiento DATE,
    departamento VARCHAR(100)
);

CREATE TABLE producto (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria_id INT,
    marca_id INT,
    precio DECIMAL(10, 2),
    cantidad_disponible INT UNSIGNED,
    descripcion VARCHAR(255),
    imagen VARCHAR(255),
    FOREIGN KEY (categoria_id) REFERENCES categoria(id),
    FOREIGN KEY (marca_id) REFERENCES marca(id)
);

CREATE TABLE inventario (
    id INT PRIMARY KEY,
    producto_id INT,
    cantidad INT UNSIGNED,
    ultima_actualizacion DATETIME,
    FOREIGN KEY (producto_id) REFERENCES producto(id)
);

CREATE TABLE pedido (
    id INT PRIMARY KEY,
    cliente_id INT,
    empleado_id INT,
    fecha_pedido DATE,
    estado_envio ENUM('pendiente', 'enviado', 'entregado', 'cancelado'),
    subtotal DECIMAL(10, 2),
    impuestos DECIMAL(10, 2),
    total DECIMAL(10, 2),
    FOREIGN KEY (cliente_id) REFERENCES cliente(id),
    FOREIGN KEY (empleado_id) REFERENCES empleado(id)
);

CREATE TABLE envio (
    id INT PRIMARY KEY,
    pedido_id INT,
    metodo_envio ENUM('estandar', 'express', 'recogida'),
    direccion_envio VARCHAR(255),
    metodo_pago ENUM('tarjeta', 'efectivo', 'transferencia'),
    FOREIGN KEY (pedido_id) REFERENCES pedido(id)
);

CREATE TABLE detalles_pedido (
    id INT PRIMARY KEY,
    pedido_id INT,
    producto_id INT,
    cantidad INT,
    precio_unitario DECIMAL(10, 2),
    FOREIGN KEY (pedido_id) REFERENCES pedido(id),
    FOREIGN KEY (producto_id) REFERENCES producto(id)
);

CREATE TABLE devolucion (
    id INT PRIMARY KEY,
    pedido_id INT,
    fecha_devolucion DATE,
    motivo VARCHAR(255),
    estado_devolucion ENUM('pendiente', 'aprobada', 'rechazada', 'completada'),
    FOREIGN KEY (pedido_id) REFERENCES pedido(id)
);

CREATE TABLE detalles_devolucion (
    id INT PRIMARY KEY,
    devolucion_id INT,
    producto_id INT,
    cantidad_devuelta INT,
    FOREIGN KEY (devolucion_id) REFERENCES devolucion(id),
    FOREIGN KEY (producto_id) REFERENCES producto(id)
);

CREATE TABLE venta (
    id INT PRIMARY KEY,
    id_detalles_pedido INT,
    id_envio INT,
    FOREIGN KEY (id_detalles_pedido) REFERENCES detalles_pedido(id),
    FOREIGN KEY (id_envio) REFERENCES envio(id)
);



-- Orden de las migraciones --
-- Categoria
-- Marca
-- Cliente
-- Empleado
-- Pedido
-- Envio
-- Producto
-- Inventario
-- Detalles Pedido
-- Venta
