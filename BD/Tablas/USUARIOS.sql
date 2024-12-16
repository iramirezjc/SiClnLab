CREATE TABLE USUARIOS(
	Matricula INT PRIMARY KEY NOT NULL,
	Nombre VARCHAR(100) NOT NULL,
	Apellido VARCHAR(100) NOT NULL,
	Contrasenia VARCHAR(45) NOT NULL,
	FechaNacimiento DATE DEFAULT GETDATE() NOT NULL, 
	Telefono VARCHAR(20) NOT NULL,
	IdNivelUsuario INT NOT NULL,
	NombreUsuario VARCHAR(10) NOT NULL
	CONSTRAINT fk_usuarios_nivelUsuarios FOREIGN KEY (IdNivelUsuario) REFERENCES NIVELUSUARIOS(IdNivelUsuario)
)