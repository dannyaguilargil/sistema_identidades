--DATABASE = sistema_nuevo
--

----------------------------------------------------------------
create table solicitud_usuario(
    nombre varchar(40),
    cargo varchar(40),
    fechafinalcontrato varchar(40),
    cedula integer primary key,
    supervisor varchar(40),
    email varchar(40),
    rol varchar(40)
)
insert into solicitud_usuario values ('DANNY','TECNICO CONTROL DE ACCESO','2022-12-31',1090492324,'LUCAS LIENDO RAMIREZ','SISTEMAS.ACCESO@IMSALUD.GOV.CO','DEVELOPER');
insert into solicitud_usuario values ('ZULLY YURIMA IBARRA ','TECNICO ASISTENCIA ADMINISTRATIVA','2022-12-31',1090492325,'LUCAS LIENDO','SISTEMAS.APOYO@IMSALUD.GOV.CO','USUARIO');

------------------------------------------------------------------
create table usuarios_registrados(
    nombre varchar(40),
    cargo varchar(40),
    fechafinalcontrato varchar(40), 
    cedula integer primary key,
    supervisor varchar(40),
    email varchar(40),
    rol varchar(40),
    password varchar(40)
);
insert into usuarios_registrados values ('DANNY','TECNICO CONTROL DE ACCESO','2022-12-31',1090492324,'LUCAS LIENDO','SISTEMAS.ACCESO@IMSALUD.GOV.CO','ACCESO',cedula);
insert into usuarios_registrados values ('ZULY YURIMA IBARRA','TECNICO ASISTENCIA ADMINISTRATIVA','2022-12-31',1090492325,'LUCAS LIENDO','SISTEMAS.APOYO@IMSALUD.GOV.CO','USUARIO',cedula);
insert into usuarios_registrados values ('LUCAS LIENDO RAMIREZ','JEFE DE SISTEMAS','2032-12-31',1111111111,'JUAN AGUSTIN','SISTEMAS@IMSALUD.GOV.CO','ADMINISTRADOR',cedula);
------------------------------------------------------------------
-- COMO EL USUARIO YA ESTA REGISTRADO DEBE CARGAR LOS DATOS PREVIAMENTE EN EL SISTEMA
create table solicitud_sistema(
    id autoincrement not null,
    nombre varchar(40),
    tipodocumento varchar(40),
    cedula integer(20),
    lugarexpedicion varchar(40),
    sexo varchar(40),
    telefono integer(20),
    celular integer(20),
    direccion varchar(40),
    cargo varchar(40),
    supervisor varchar(40),
    correo varchar(40),
    ubicacion_laboral varchar(40),
    tiposolicitud varchar(40),
    aplicativo varchar(40),
    observaciones varchar(40)
)
insert into solicitud_sistema values ("DANNY STIVEENS AGUILAR GIL","CC",1090492324,"CUCUTA","M",5813604,3223390961,"CALE 9NA #10-64 NIDIA","TECNICO CONTROL DE ACCESO","LUCAS LIENDO RAMIREZ","SISTEMAS.ACCESO@IMSALUD.GOV.CO","SISTEMAS","CREAR","HIKCENTRAL","ENROLAR TARETAS RFID");

create table sistema_validado_supervisor(
    nombre varchar(40),
    tipodocumento varchar(40),
    cedula integer primary key,
    lugarexpedicion varchar(40),
    sexo varchar(40),
    telefonofijo integer(20),
    celular integer(20),
    direccion varchar(40),
    cargo varchar(40),
    supervisor varchar(40),
    correo varchar(40),
    ubicacion_laboral varchar(40),
    tiposolicitud varchar(40),
    aplicativo varchar(40),
    observaciones varchar(40),
    observaciones_supervisor varchar(40)
)
create table sistema_validado_admin(
    nombre varchar(40),
    tipodocumento varchar(40),
    cedula integer primary key,
    lugarexpedicion varchar(40),
    sexo varchar(40),
    telefonofijo integer(20),
    celular integer(20),
    direccion varchar(40),
    cargo varchar(40),
    supervisor varchar(40),
    correo varchar(40),
    ubicacion_laboral varchar(40),
    tiposolicitud varchar(40),
    aplicativo varchar(40),
    observaciones varchar(40),
    observaciones_supervisor varchar(200)
)
insert into sistema_validado_Supervisor values ("DANNY STIVEENS AGUILAR GIL","CC",1090492324,"CUCUTA","M",5813604,3223390961,"CALE 9NA #10-64 NIDIA","TECNICO CONTROL DE ACCESO","LUCAS LIENDO RAMIREZ","SISTEMAS.ACCESO@IMSALUD.GOV.CO","SISTEMAS","CREAR","HIKCENTRAL","ENROLAR TARETAS RFID");
--AQUI DEBO TENER TODO LOS PERMISOS Y REGSTROS EN APLICATIVOS PARA VISUALIZARLOS
CREATE TABLE permisos(
    nombre varchar(40),
    cedula primary key
)
create table aldeamosms(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table almera(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table email(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table kubapp(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table hikcentral(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table nube(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varc4har(40)
)
create table orthanc(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table mesadeayuda(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table aulavirtual(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table tns(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)
create table otro(
    nombre varchar(40),
    cedula integer(20),
    fechafinalcontrato varchar(40)
)-- el paz y salvo tiene 3 estados, solicitud, aprobados y el generado
-- SE AGREGO LO DEL DEFAULT 
create table pazysalvo_solicitud(
    nombre varchar(40),
    cedula integer primary key,
    revocar_permisos varchar(40)
);
insert into pazysalvo_solicitud values('DANNY STIVEENS AGUILAR GIL',1090492324,'SI');
-- luego de que se genere el paz y salvo, debo hacer una union con los aplicativos para saber cuales son los permisos que debo renovar
create table pazysalvo_aprobar(
    nombre varchar(40),
    cedula integer primary key,
    rfid varchar(40),
    equipos varchar(40),
    revocar_permisos varchar(40)
)
--aqui le genero el pdf o paz y salvo
create table pazysalvo(
    cedula integer primary key,
    rfid varchar(40),
    equipos varchar(40),
    pdf varchar(40)
)
insert into pazysalvo_aprobar (cedula,rfid,equipos) values(1090492324,'SI','SI');
--UNA FORMA DE HACER EL PAZYSALVO ES GENERAR POR DEFECTO EL NO Y EL SUPERVISOR LE HACE EL UPDATE DEL SI
--UNA VEZ ESTE EL SIS, GENERA EL BOTON DE DESCARGA DEL PDF 

creta table sede (
    nombre varchar(40));

INSERT INTO sede values ('UBA COMUNEROS');
INSERT INTO sede values ('UBA LOMA BOLIVAR');
INSERT INTO sede values ('ADMINISTRATIVA');
INSERT INTO sede values ('UBA LIBERTAD');
INSERT INTO sede values ('UBA POLICLINICO');