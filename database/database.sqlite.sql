BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "estudiantes" (
	"id"	integer NOT NULL,
	"numero"	INTEGER,
	"cedula"	varchar NOT NULL,
	"nombre"	varchar NOT NULL,
	"apellido"	varchar NOT NULL,
	"correo"	varchar NOT NULL,
	"celular"	varchar NOT NULL,
	"genero"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "eventos" (
	"id"	integer NOT NULL,
	"numero"	INTEGER,
	"nombre"	varchar NOT NULL,
	"fecha_evento"	date NOT NULL,
	"duracion"	varchar NOT NULL,
	"auspiciante1"	varchar,
	"auspiciante2"	varchar,
	"auspiciante3"	varchar,
	"auspiciante4"	varchar,
	"auspiciante5"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "registros" (
	"id"	integer NOT NULL,
	"numero"	INTEGER,
	"codigo_usuario"	integer NOT NULL,
	"codigo_evento"	integer NOT NULL,
	"codigo_estudiante"	integer NOT NULL,
	"fecha_registro"	date NOT NULL,
	"carrera"	varchar NOT NULL,
	"ciclo"	varchar NOT NULL,
	"jornada_evento"	varchar NOT NULL,
	"area_asignada"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("codigo_estudiante") REFERENCES "estudiantes"("id") on delete cascade,
	FOREIGN KEY("codigo_evento") REFERENCES "tipo_eventos"("id") on delete cascade,
	FOREIGN KEY("codigo_usuario") REFERENCES "usuarios"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "roles" (
	"id"	integer NOT NULL,
	"numero"	INTEGER,
	"nombre"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "seccion" (
	"id"	integer NOT NULL,
	"usuario"	varchar NOT NULL,
	"password"	varchar NOT NULL,
	"estado"	tinyint(1) NOT NULL DEFAULT '1',
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "sessions" (
	"id"	varchar NOT NULL,
	"user_id"	integer,
	"ip_address"	varchar,
	"user_agent"	text,
	"payload"	text NOT NULL,
	"last_activity"	integer NOT NULL,
	PRIMARY KEY("id")
);
CREATE TABLE IF NOT EXISTS "tipo_eventos" (
	"id"	integer NOT NULL,
	"numero"	INTEGER,
	"nombre"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "tipo_usuarios" (
	"id"	integer NOT NULL,
	"numero"	INTEGER,
	"nombre"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "usuarios" (
	"id"	integer NOT NULL,
	"numero"	INTEGER,
	"cedula"	varchar NOT NULL,
	"nombre"	varchar NOT NULL,
	"apellido"	varchar NOT NULL,
	"correo"	varchar NOT NULL,
	"celular"	varchar,
	"genero"	varchar NOT NULL,
	"role_id"	integer NOT NULL,
	"tipo_usuario_id"	integer NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("role_id") REFERENCES "roles"("id") on delete cascade,
	FOREIGN KEY("tipo_usuario_id") REFERENCES "tipo_usuarios"("id") on delete cascade
);
INSERT INTO "estudiantes" VALUES (1,1,'0302522685','Johanna','Merchan','merchanjohanna.16@gmail.com','0967284372','femenino','2025-07-15 07:15:31','2025-07-15 07:15:31');
INSERT INTO "estudiantes" VALUES (2,2,'020351689','Jenny','Jimenez','jnjimenez@gmail.com','0962244552','femenino','2025-07-18 01:06:38','2025-07-18 01:06:38');
INSERT INTO "eventos" VALUES (1,1,'Reciclaje','2025-06-30','30 dias','1','2','3','4','5','2025-07-15 07:14:11','2025-07-15 07:14:11');
INSERT INTO "eventos" VALUES (2,2,'Siembra','2025-07-26','3 DIAS','3','4','5','6','7','2025-07-19 17:56:17','2025-07-19 17:56:17');
INSERT INTO "migrations" VALUES (1,'2025_07_15_055550_create_roles_table',1);
INSERT INTO "migrations" VALUES (2,'2025_07_15_055712_create_tipo_usuarios_table',1);
INSERT INTO "migrations" VALUES (3,'2025_07_15_055728_create_usuarios_table',1);
INSERT INTO "migrations" VALUES (4,'2025_07_15_055738_create_tipo_eventos_table',1);
INSERT INTO "migrations" VALUES (5,'2025_07_15_055752_create_estudiantes_table',1);
INSERT INTO "migrations" VALUES (6,'2025_07_15_055801_create_eventos_table',1);
INSERT INTO "migrations" VALUES (7,'2025_07_15_055811_create_seccion_table',1);
INSERT INTO "migrations" VALUES (8,'2025_07_15_055825_create_sessions_table',1);
INSERT INTO "migrations" VALUES (9,'2025_07_15_055836_create_registros_table',1);
INSERT INTO "migrations" VALUES (10,'2025_07_16_150649_create_seccion_table',2);
INSERT INTO "migrations" VALUES (11,'2025_07_16_151918_create_seccion_table',3);
INSERT INTO "registros" VALUES (4,1,1,1,1,'2025-07-20','web','5','nocturna','patio central','2025-07-19 17:47:16','2025-07-19 17:47:16');
INSERT INTO "registros" VALUES (5,1,1,2,2,'2025-07-23','WEB','5','NOCTURNA','PATIO PRINCIPAL','2025-07-19 17:57:04','2025-07-19 17:57:04');
INSERT INTO "roles" VALUES (1,1,'Coordinador','2025-07-15 06:33:01','2025-07-15 06:33:01');
INSERT INTO "roles" VALUES (2,2,'Seccion','',NULL);
INSERT INTO "roles" VALUES (3,3,'Administrador',NULL,NULL);
INSERT INTO "seccion" VALUES (2,'ConCienciaVerde','$2y$12$LuqZqeDHOZw0bJn8rCsXVOEwgDtZ0RuplB2rNsYEi8o3JaZK1UEVq',1,NULL,'2025-07-17 04:27:29');
INSERT INTO "sessions" VALUES ('ImR2ODAbbCkcoeMu248YEGlbeiyeaL2KZl3j9agj',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidHREem9nVGpyZlN0aFhiSWF3cU1WakdEeXc5bzBqRlY2d0U4ZjdJRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9jb25jaWVuY2lhX3ZlcmRlaXN0bHQudGVzdC9zZWNjaW9uZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEwOiJzZWNjaW9uX2lkIjtpOjE7fQ==',1752687507);
INSERT INTO "tipo_eventos" VALUES (1,1,'reciclaje','2025-07-15 07:14:29','2025-07-15 07:14:29');
INSERT INTO "tipo_eventos" VALUES (2,2,'Siembras','2025-07-17 04:34:48','2025-07-17 04:34:48');
INSERT INTO "tipo_usuarios" VALUES (1,1,'Administrador','2025-07-15 07:03:44','2025-07-15 07:03:44');
INSERT INTO "tipo_usuarios" VALUES (2,2,'Coordinador','2025-07-17 04:31:48','2025-07-17 04:31:48');
INSERT INTO "tipo_usuarios" VALUES (3,3,'Estudiante','2025-07-17 04:32:15','2025-07-17 04:32:15');
INSERT INTO "usuarios" VALUES (1,1,'0302522685','Cecilia ','Naula','cecinaula.23@gmail.com','0962455225','Femenino',1,1,'2025-07-15 07:13:18','2025-07-15 07:13:18');
CREATE UNIQUE INDEX IF NOT EXISTS "seccion_usuario_unique" ON "seccion" (
	"usuario"
);
CREATE INDEX IF NOT EXISTS "sessions_last_activity_index" ON "sessions" (
	"last_activity"
);
CREATE INDEX IF NOT EXISTS "sessions_user_id_index" ON "sessions" (
	"user_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "usuarios_correo_unique" ON "usuarios" (
	"correo"
);
COMMIT;
