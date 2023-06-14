DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda;
USE tienda;

CREATE TABLE Categorias (
    categoria_id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255)
);

CREATE TABLE Marcas (
    marca_id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255)
);

CREATE TABLE Clientes (
    cliente_id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(100),
    contrasena VARCHAR(255),
    es_empleado BOOLEAN DEFAULT FALSE
);

CREATE TABLE Empleados (
    empleado_id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(100),
    contrasena VARCHAR(255),
    es_empleado BOOLEAN DEFAULT TRUE
);

CREATE TABLE Roles (
    rol_id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE Empleados_Roles (
    empleado_id INT,
    rol_id INT,
    PRIMARY KEY (empleado_id, rol_id),
    FOREIGN KEY (empleado_id) REFERENCES Empleados(empleado_id),
    FOREIGN KEY (rol_id) REFERENCES Roles(rol_id)
);

CREATE TABLE Clientes_Empleados (
    cliente_id INT,
    empleado_id INT,
    PRIMARY KEY (cliente_id, empleado_id),
    FOREIGN KEY (cliente_id) REFERENCES Clientes(cliente_id),
    FOREIGN KEY (empleado_id) REFERENCES Empleados(empleado_id)
);

CREATE TABLE Metodos_Pago (
    metodo_pago_id INT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(255)
);

CREATE TABLE Productos (
    producto_id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria_id INT,
    marca_id INT,
    precio DECIMAL(10, 2),
    cantidad_disponible INT UNSIGNED,
    FOREIGN KEY (categoria_id) REFERENCES Categorias(categoria_id),
    FOREIGN KEY (marca_id) REFERENCES Marcas(marca_id)
);

CREATE TABLE Pedidos (
    pedido_id INT PRIMARY KEY,
    cliente_id INT,
    empleado_id INT,
    fecha_pedido DATE,
    estado_envio ENUM('pendiente', 'enviado', 'entregado', 'cancelado'),
    estado_pago ENUM('pendiente', 'pagado', 'rechazado', 'cancelado'),
    FOREIGN KEY (cliente_id) REFERENCES Clientes(cliente_id),
    FOREIGN KEY (empleado_id) REFERENCES Empleados(empleado_id)
);

CREATE TABLE Detalles_Pedido (
    detalle_pedido_id INT PRIMARY KEY,
    pedido_id INT,
    producto_id INT,
    cantidad INT,
    FOREIGN KEY (pedido_id) REFERENCES Pedidos(pedido_id),
    FOREIGN KEY (producto_id) REFERENCES Productos(producto_id)
);

CREATE TABLE Metodos_Envio (
    metodo_envio_id INT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(255),
    costo DECIMAL(10, 2)
);

CREATE TABLE Metodos_Pago_Cliente (
    cliente_id INT,
    metodo_pago_id INT,
    PRIMARY KEY (cliente_id, metodo_pago_id),
    FOREIGN KEY (cliente_id) REFERENCES Clientes(cliente_id),
    FOREIGN KEY (metodo_pago_id) REFERENCES Metodos_Pago(metodo_pago_id)
);

CREATE TABLE Envios (
    envio_id INT PRIMARY KEY,
    pedido_id INT,
    metodo_envio_id INT,
    direccion_envio VARCHAR(255),
    FOREIGN KEY (pedido_id) REFERENCES Pedidos(pedido_id),
    FOREIGN KEY (metodo_envio_id) REFERENCES Metodos_Envio(metodo_envio_id)
);

CREATE TABLE Devoluciones (
    devolucion_id INT PRIMARY KEY,
    pedido_id INT,
    fecha_devolucion DATE,
    motivo VARCHAR(255),
    estado_devolucion ENUM('pendiente', 'aprobada', 'rechazada', 'completada'),
    FOREIGN KEY (pedido_id) REFERENCES Pedidos(pedido_id)
);

CREATE TABLE Detalles_Devolucion (
    detalle_devolucion_id INT PRIMARY KEY,
    devolucion_id INT,
    producto_id INT,
    cantidad_devuelta INT,
    FOREIGN KEY (devolucion_id) REFERENCES Devoluciones(devolucion_id),
    FOREIGN KEY (producto_id) REFERENCES Productos(producto_id)
);

CREATE TABLE Comentarios (
    comentario_id INT PRIMARY KEY,
    producto_id INT,
    cliente_id INT,
    comentario VARCHAR(255),
    fecha_comentario DATE,
    FOREIGN KEY (producto_id) REFERENCES Productos(producto_id),
    FOREIGN KEY (cliente_id) REFERENCES Clientes(cliente_id)
);

CREATE TABLE Promociones (
    promocion_id INT PRIMARY KEY,
    producto_id INT,
    porcentaje_descuento DECIMAL(10, 2),
    fecha_inicio DATE,
    fecha_fin DATE,
    condiciones VARCHAR(255),
    estado ENUM('activa', 'pausada', 'finalizada') NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES Productos(producto_id)
);

CREATE TABLE Promociones_Cliente (
    promocion_id INT,
    cliente_id INT,
    porcentaje_descuento_personalizado DECIMAL(10, 2),
    PRIMARY KEY (promocion_id, cliente_id),
    FOREIGN KEY (promocion_id) REFERENCES Promociones(promocion_id),
    FOREIGN KEY (cliente_id) REFERENCES Clientes(cliente_id)
);

CREATE TABLE Promociones_Empleado (
    promocion_id INT,
    empleado_id INT,
    PRIMARY KEY (promocion_id, empleado_id),
    FOREIGN KEY (promocion_id) REFERENCES Promociones(promocion_id),
    FOREIGN KEY (empleado_id) REFERENCES Empleados(empleado_id)
);

CREATE TABLE Promociones_Pedido (
    promocion_id INT,
    pedido_id INT,
    PRIMARY KEY (promocion_id, pedido_id),
    FOREIGN KEY (promocion_id) REFERENCES Promociones(promocion_id),
    FOREIGN KEY (pedido_id) REFERENCES Pedidos(pedido_id)
);

CREATE TABLE Promociones_Producto (
    promocion_id INT,
    producto_id INT,
    porcentaje_descuento DECIMAL(10, 2),
    PRIMARY KEY (promocion_id, producto_id),
    FOREIGN KEY (promocion_id) REFERENCES Promociones(promocion_id),
    FOREIGN KEY (producto_id) REFERENCES Productos(producto_id)
);

CREATE TABLE Promociones_Categoria (
    promocion_id INT,
    categoria_id INT,
    PRIMARY KEY (promocion_id, categoria_id),
    FOREIGN KEY (promocion_id) REFERENCES Promociones(promocion_id),
    FOREIGN KEY (categoria_id) REFERENCES Categorias(categoria_id)
);

CREATE TABLE Promociones_Marca (
    promocion_id INT,
    marca_id INT,
    PRIMARY KEY (promocion_id, marca_id),
    FOREIGN KEY (promocion_id) REFERENCES Promociones(promocion_id),
    FOREIGN KEY (marca_id) REFERENCES Marcas(marca_id)
);
