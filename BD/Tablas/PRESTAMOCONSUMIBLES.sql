CREATE TABLE PRESTAMOCONSUMIBLES(
	IdPrestamo INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
	FechaEntrega DATETIME DEFAULT GETDATE() NOT NULL,
	Matricula INT NOT NULL,
	MatriculaPrestamo INT NOT NULL,
	CONSTRAINT fk_prestamoConsumibles_Usuario FOREIGN KEY (Matricula) REFERENCES USUARIOS(Matricula)
)