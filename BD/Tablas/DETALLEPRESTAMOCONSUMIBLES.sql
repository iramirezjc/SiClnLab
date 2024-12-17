CREATE TABLE DETALLEPRESTAMOCONSUMIBLES(
	IdDetallePrestamo INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
	IdPrestamo INT NOT NULL,
	IdReactivo INT  NOT NULL,
	Cantidad INT NOT NULL,
	CONSTRAINT fk_detallePrestamoConsumible_prestamoConsumible FOREIGN KEY (IdPrestamo) REFERENCES PRESTAMOCONSUMIBLES(IdPrestamo),
	CONSTRAINT fk_detallePrestamoConsumible_reactivos FOREIGN KEY (IdReactivo) REFERENCES REACTIVOS(idReactivo)
)