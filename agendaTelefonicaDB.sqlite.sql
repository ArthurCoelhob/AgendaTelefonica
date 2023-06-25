BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "contatos" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"nome"	varchar(100) NOT NULL,
	"idade"	integer(3) NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime
);
CREATE TABLE IF NOT EXISTS "telefones" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"numero"	varchar NOT NULL,
	"contato_id"	integer NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	FOREIGN KEY("contato_id") REFERENCES "contatos"("id") on delete cascade on update cascade
);
CREATE TABLE IF NOT EXISTS "personal_access_tokens" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"tokenable_type"	varchar NOT NULL,
	"tokenable_id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"abilities"	text,
	"last_used_at"	datetime,
	"created_at"	datetime,
	"updated_at"	datetime
);
CREATE TABLE IF NOT EXISTS "failed_jobs" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"uuid"	varchar NOT NULL,
	"connection"	text NOT NULL,
	"queue"	text NOT NULL,
	"payload"	text NOT NULL,
	"exception"	text NOT NULL,
	"failed_at"	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS "password_resets" (
	"email"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"created_at"	datetime
);
CREATE TABLE IF NOT EXISTS "users" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"name"	varchar NOT NULL,
	"email"	varchar NOT NULL,
	"email_verified_at"	datetime,
	"password"	varchar NOT NULL,
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime
);
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL
);
INSERT INTO "contatos" VALUES (1,'ARTHURRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR',61,'2023-06-25 13:39:16','2023-06-25 13:39:16');
INSERT INTO "telefones" VALUES (1,'31993482351',1,'2023-06-25 13:39:16','2023-06-25 13:39:16');
INSERT INTO "migrations" VALUES (10,'2023_06_23_022336_create_flights_table',1);
INSERT INTO "migrations" VALUES (22,'2023_06_23_182508_create_contratos_table',3);
INSERT INTO "migrations" VALUES (72,'2014_10_12_000000_create_users_table',4);
INSERT INTO "migrations" VALUES (73,'2014_10_12_100000_create_password_resets_table',4);
INSERT INTO "migrations" VALUES (83,'2019_08_19_000000_create_failed_jobs_table',5);
INSERT INTO "migrations" VALUES (84,'2019_12_14_000001_create_personal_access_tokens_table',5);
INSERT INTO "migrations" VALUES (89,'2023_06_23_182637_create_contatos_table',6);
INSERT INTO "migrations" VALUES (90,'2023_06_23_192604_create_telefones_table',6);
CREATE UNIQUE INDEX IF NOT EXISTS "personal_access_tokens_token_unique" ON "personal_access_tokens" (
	"token"
);
CREATE INDEX IF NOT EXISTS "personal_access_tokens_tokenable_type_tokenable_id_index" ON "personal_access_tokens" (
	"tokenable_type",
	"tokenable_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "failed_jobs_uuid_unique" ON "failed_jobs" (
	"uuid"
);
CREATE INDEX IF NOT EXISTS "password_resets_email_index" ON "password_resets" (
	"email"
);
CREATE UNIQUE INDEX IF NOT EXISTS "users_email_unique" ON "users" (
	"email"
);
COMMIT;
