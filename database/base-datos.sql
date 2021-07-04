CREATE DATABASE moba_db;
USE moba_db;

CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apellidos       varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
imagen          varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$04$R6UN7MtHeVubg7O865XXJes0zvLpuKmyqa4X1VkjXThWHsh8k12eS', 'admin', NULL);

CREATE TABLE categorias(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id) 
)ENGINE=InnoDb;

CREATE TABLE tipos(
id_t              int(255) auto_increment not null,
tipo          varchar(100) not null,
CONSTRAINT pk_tipos PRIMARY KEY(id_t) 
)ENGINE=InnoDb;

CREATE TABLE productos(
id_p              int(255) auto_increment not null,
tipo_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          float(100,2) not null,
stock           int(255) not null,
oferta          varchar(2),
fecha           date not null,
imagen          varchar(255),
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_tipo FOREIGN KEY(tipo_id) REFERENCES tipos(id_t)
)ENGINE=InnoDb;


CREATE TABLE pedidos(
id              int(255) not null,
nombre          varchar(255) not null,
apellidos       varchar(255) not null,
empresa         varchar(255) null,
ciudad          varchar(100) not null,
departamento    varchar(100) not null,
pais            varchar(255) not null,
direccion       varchar(255) not null,
telefono        int(255) not null,
email           varchar(255) not null,
coste           float(200,2) not null,
estado          varchar(20) not null,
fecha           date,
hora            time,
CONSTRAINT pk_pedidos PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE lineas_pedidos(
id              int(255) auto_increment not null,
pedido_id       int(255) not null,
producto_id     int(255) not null,
unidades        int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id_p)
)ENGINE=InnoDb;


