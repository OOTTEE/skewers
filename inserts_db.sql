INSERT INTO `configuracion`(`id`, `logo`, `nombre`, `descripcion`, `imagen`, `f_inicio`, `f_fin`, `votacionesGanadores`, `votacionesFinalistas`, `votacionesPopulares`) 
			VALUES (1,'logo.png','Pinchos Ourense','Descripcion del concurso de Ourense','portada.png','2014-01-01','2014-01-01', 0, 0, 0);

INSERT INTO `users`(`usuario_id`, `name`, `username`, `password`, `role`, `phone`, `email`) 
	VALUES ( 1,'Jurado Profesional 1','Jurado1','ED6D3CDEBC0E7ACA','profesional','600600001','jurado1@correo.es'),
		   ( 2,'Jurado Profesional 2','Jurado2','ED6D3CDEBC0E7ACA','profesional','600600002','jurado2@correo.es'),
		   ( 3,'Jurado Profesional 3','Jurado3','ED6D3CDEBC0E7ACA','profesional','600600003','jurado3@correo.es'),
		   ( 4,'Jurado Profesional 4','Jurado4','ED6D3CDEBC0E7ACA','profesional','600600004','jurado4@correo.es'),
		   ( 5,'Jurado Profesional 5','Jurado5','ED6D3CDEBC0E7ACA','profesional','600600005','jurado5@correo.es'),
		   ( 6,'Jurado Profesional 6','Jurado6','ED6D3CDEBC0E7ACA','profesional','600600006','jurado6@correo.es'),
		   ( 7,'Jurado Popular 1','Popular1','ED6D3CDEBC0E7ACA','popular','600500001','juradopopular1@correo.es'),
		   ( 8,'Jurado Popular 2','Popular2','ED6D3CDEBC0E7ACA','popular','600500002','juradopopular2@correo.es'),
		   ( 9,'Jurado Popular 3','Popular3','ED6D3CDEBC0E7ACA','popular','600500003','juradopopular3@correo.es'),
		   (10,'Jurado Popular 4','Popular4','ED6D3CDEBC0E7ACA','popular','600500004','juradopopular4@correo.es'),
		   (11,'Jurado Popular 5','Popular5','ED6D3CDEBC0E7ACA','popular','600500005','juradopopular5@correo.es'),
		   (12,'Jurado Popular 6','Popular6','ED6D3CDEBC0E7ACA','popular','600500006','juradopopular6@correo.es'),
		   (13,'Jurado Popular 7','Popular7','ED6D3CDEBC0E7ACA','popular','600500007','juradopopular7@correo.es'),
		   (14,'Jurado Popular 8','Popular8','ED6D3CDEBC0E7ACA','popular','600500008','juradopopular8@correo.es'),
		   (15,'Jurado Popular 9','Popular9','ED6D3CDEBC0E7ACA','popular','600500009','juradopopular9@correo.es'),
		   (16,'Jurado Popular 10','Popular10','ED6D3CDEBC0E7ACA','popular','600500010','juradopopular10@correo.es'),
		   (17,'Jurado Popular 11','Popular11','ED6D3CDEBC0E7ACA','popular','600500011','juradopopular11@correo.es'),
		   (18,'Jurado Popular 12','Popular12','ED6D3CDEBC0E7ACA','popular','600500012','juradopopular12@correo.es'),
		   (19,'Establecimiento 1','Establecimiento1','ED6D3CDEBC0E7ACA','establecimiento','600400001','establecimiento1@correo.es'),
		   (20,'Establecimiento 2','Establecimiento2','ED6D3CDEBC0E7ACA','establecimiento','600400002','establecimiento2@correo.es'),
		   (21,'Establecimiento 3','Establecimiento3','ED6D3CDEBC0E7ACA','establecimiento','600400003','establecimiento3@correo.es'),
		   (22,'Establecimiento 4','Establecimiento4','ED6D3CDEBC0E7ACA','establecimiento','600400004','establecimiento4@correo.es'),
		   (23,'Establecimiento 5','Establecimiento5','ED6D3CDEBC0E7ACA','establecimiento','600400005','establecimiento5@correo.es'),
		   (24,'Establecimiento 6','Establecimiento6','ED6D3CDEBC0E7ACA','establecimiento','600400006','establecimiento6@correo.es'),
		   (25,'Establecimiento 7','Establecimiento7','ED6D3CDEBC0E7ACA','establecimiento','600400007','establecimiento7@correo.es'),
		   (26,'Establecimiento 8','Establecimiento8','ED6D3CDEBC0E7ACA','establecimiento','600400008','establecimiento8@correo.es'),
		   (27,'Establecimiento 9','Establecimiento9','ED6D3CDEBC0E7ACA','establecimiento','600400009','establecimiento9@correo.es'),
		   (28,'Establecimiento 10','Establecimiento10','ED6D3CDEBC0E7ACA','establecimiento','600400010','establecimiento10@correo.es'),
		   (29,'Establecimiento 11','Establecimiento11','ED6D3CDEBC0E7ACA','establecimiento','600400011','establecimiento11@correo.es'),
		   (30,'Establecimiento 12','Establecimiento12','ED6D3CDEBC0E7ACA','establecimiento','600400012','establecimiento12@correo.es'),
		   (31,'Administrador','administrador','ED6D3CDEBC0E7ACA','administrador','666666666','administrador@correo.es');
		   
		   
INSERT INTO `establecimientos`(`usuario_id`, `imagen`, `horario`, `descripcion`, `web`, `direccion`)
			VALUES (19,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento1','www.establecimiento1.com','direccion del establecimiento'),
				   (20,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento2','www.establecimiento2.com','direccion del establecimiento'),
				   (21,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento3','www.establecimiento3.com','direccion del establecimiento'),
				   (22,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento4','www.establecimiento4.com','direccion del establecimiento'),
				   (23,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento5','www.establecimiento5.com','direccion del establecimiento'),
				   (24,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento6','www.establecimiento6.com','direccion del establecimiento'),
				   (25,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento7','www.establecimiento7.com','direccion del establecimiento'),
				   (26,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento8','www.establecimiento8.com','direccion del establecimiento'),
				   (27,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento9','www.establecimiento9.com','direccion del establecimiento'),
				   (28,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento10','www.establecimiento10.com','direccion del establecimiento'),
				   (29,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento11','www.establecimiento11.com','direccion del establecimiento'),
				   (30,'establecimiento.png','12:00 - 24:00','Exquisito pincho del establecimiento12','www.establecimiento12.com','direccion del establecimiento');
				   
				   