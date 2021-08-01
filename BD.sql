create database bec_market;
use bec_market;

create table usuario(
codigo_usuario varchar(10),
email varchar(50) UNIQUE,
nombre varchar(20),
apellidos varchar(20),
contrasena varchar(200),
telefono varchar(20),
estado int,
direccion varchar(50),
tipo int,
imagen varchar(300),
fechaCreacion date,
primary key(codigo_usuario)
);

create table negocio(
rut_negocio varchar(20),
nombre varchar(20),
direccion varchar(30),
imagen varchar(300),
estado int,
costoEnvio int,
tipoNegocio varchar(20),
horarioAtencion varchar(20),
diasAtencion varchar(20),
abierto_cerrado varchar(20),
email varchar(30),
telefono varchar(20),
vendedorfk varchar(10),
primary key(rut_negocio),
foreign key(vendedorfk) references usuario(codigo_usuario) on delete set null
);


create table producto(
codigo_producto varchar(30),
nombre varchar(20),
precio int,
stock int,
descripcion varchar(20),
imagen varchar (300),
negociofk varchar(20),
primary key(codigo_producto),
foreign key(negociofk) references negocio(rut_negocio) on delete set null
);


create table pedido(
codigo_pedido varchar(20),
fecha date,
hora varchar(10),
precio_Total int,
metodo_pago varchar(10),
monto int,
estado varchar(10),
compradorfk varchar(10),
negociofk varchar(20),
primary key(codigo_pedido),
foreign key(compradorfk) references usuario(codigo_usuario) on delete set null,
foreign key(negociofk) references negocio(rut_negocio) on delete set null
);


create table detalle(
codigo_pedido varchar(20),
codigo_producto varchar(30),
nombre_producto varchar(20),
cantidad int,
precioUnit int
);
