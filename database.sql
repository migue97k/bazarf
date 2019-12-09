CREATE DATABASE IF NOT EXISTS bazar;
USE bazar;

CREATE TABLE IF NOT EXISTS users(
id              int(255) auto_increment not null,
name            varchar(100),
surname_p         varchar(200),
surname_m         varchar(200),
sexo           varchar(100),
email           varchar(255),
password        varchar(255),
admi            TINYINT(1),
image           varchar(255),
created_at      datetime,
updated_at      datetime,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS areas(
id              int(255) auto_increment not null,
name            varchar(100),
descripcion    	varchar(100),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_areas PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS productos(
id              int(255) auto_increment not null,
nombre	    	varchar(100),
descripcion    	varchar(100),
precio_propuesto VARCHAR(45),
precio_vendido 	VARCHAR(45),
consignado 		VARCHAR(45),
clienta_vende 	int(255) NOT NULL,
area_id 		int(255) NOT NULL,
disponibles 	int(255),
image           varchar(255),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_users FOREIGN KEY(clienta_vende) REFERENCES users(id),
CONSTRAINT fk_producto_area FOREIGN KEY(area_id) REFERENCES areas(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS ventas(
id    		 	int(255) auto_increment not null,
producto_id 	int(255) NOT NULL,
Fecha      		date,
pagoscol		varchar(100),
quien_vendio	int(255) NOT NULL,
precio_venta 	varchar(100),
comprador 		int(255) NOT NULL,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_ventas PRIMARY KEY(id),
CONSTRAINT fk_ventas_userv FOREIGN KEY(quien_vendio) REFERENCES users(id),
CONSTRAINT fk_ventas_userc FOREIGN KEY(comprador) REFERENCES users(id),
CONSTRAINT fk_ventas_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS pagos(
id    		 	int(255) auto_increment not null,
Fecha      		date,
monto 			decimal(5),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_pagos PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS pagos_ventas(
id    		 	int(255) auto_increment not null,
pagos_id		int(255) NOT NULL,
venta_id 		int(255) NOT NULL,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_pagosventas PRIMARY KEY(id),
CONSTRAINT fk_pagosventas_ventas FOREIGN KEY(venta_id) REFERENCES ventas(id),
CONSTRAINT fk_pagosventas_pagos FOREIGN KEY(pagos_id) REFERENCES pagos(id)
)ENGINE=InnoDb;