CREATE TABLE EQUIPOS (
	IdEquipo INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Nombre VARCHAR(50) NOT NULL, 
	Cantidad INT NOT NULL,
	Descripcion VARCHAR(200) NOT NULL,
	TipoEquipo VARCHAR(30) NOT NULL,
)