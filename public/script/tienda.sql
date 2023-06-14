DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda;
USE tienda;

CREATE TABLE Categoria (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    estado_categoria ENUM('activa', 'inactiva')
);

CREATE TABLE Marca (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    estado_marca ENUM('activa', 'inactiva')
);

CREATE TABLE Cliente (
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

CREATE TABLE Empleado (
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

CREATE TABLE Producto (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria_id INT,
    marca_id INT,
    precio DECIMAL(10, 2),
    cantidad_disponible INT UNSIGNED,
    descripcion VARCHAR(255),
    imagen VARCHAR(255),
    FOREIGN KEY (categoria_id) REFERENCES Categoria(id),
    FOREIGN KEY (marca_id) REFERENCES Marca(id)
);

CREATE TABLE Inventario (
    id INT PRIMARY KEY,
    producto_id INT,
    cantidad INT UNSIGNED,
    ultima_actualizacion DATETIME,
    FOREIGN KEY (producto_id) REFERENCES Producto(id)
);

CREATE TABLE Pedido (
    id INT PRIMARY KEY,
    cliente_id INT,
    empleado_id INT,
    fecha_pedido DATE,
    estado_envio ENUM('pendiente', 'enviado', 'entregado', 'cancelado'),
    subtotal DECIMAL(10, 2),
    impuestos DECIMAL(10, 2),
    total DECIMAL(10, 2),
    FOREIGN KEY (cliente_id) REFERENCES Cliente(id),
    FOREIGN KEY (empleado_id) REFERENCES Empleado(id)
);

CREATE TABLE Detalles_Pedido (
    id INT PRIMARY KEY,
    pedido_id INT,
    producto_id INT,
    cantidad INT,
    precio_unitario DECIMAL(10, 2),
    FOREIGN KEY (pedido_id) REFERENCES Pedido(id),
    FOREIGN KEY (producto_id) REFERENCES Producto(id)
);

CREATE TABLE Envio (
    id INT PRIMARY KEY,
    pedido_id INT,
    metodo_envio_id INT,
    direccion_envio VARCHAR(255),
    metodo_pago VARCHAR(100),
    FOREIGN KEY (pedido_id) REFERENCES Pedido(id)
);

CREATE TABLE Devolucion (
    id INT PRIMARY KEY,
    pedido_id INT,
    fecha_devolucion DATE,
    motivo VARCHAR(255),
    estado_devolucion ENUM('pendiente', 'aprobada', 'rechazada', 'completada'),
    FOREIGN KEY (pedido_id) REFERENCES Pedido(id)
);

CREATE TABLE Detalles_Devolucion (
    id INT PRIMARY KEY,
    devolucion_id INT,
    producto_id INT,
    cantidad_devuelta INT,
    FOREIGN KEY (devolucion_id) REFERENCES Devolucion(id),
    FOREIGN KEY (producto_id) REFERENCES Producto(id)
);