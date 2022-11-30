-- Adminer 4.7.8 PostgreSQL dump

DROP TABLE IF EXISTS "failed_jobs";
DROP SEQUENCE IF EXISTS failed_jobs_id_seq;
CREATE SEQUENCE failed_jobs_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."failed_jobs" (
    "id" bigint DEFAULT nextval('failed_jobs_id_seq') NOT NULL,
    "connection" text NOT NULL,
    "queue" text NOT NULL,
    "payload" text NOT NULL,
    "exception" text NOT NULL,
    "failed_at" timestamp(0) DEFAULT CURRENT_TIMESTAMP NOT NULL,
    CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "merks";
DROP SEQUENCE IF EXISTS merks_id_seq;
CREATE SEQUENCE merks_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."merks" (
    "id" bigint DEFAULT nextval('merks_id_seq') NOT NULL,
    "name" character varying(255) NOT NULL,
    "type" character varying(255),
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "merks_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "merks" ("id", "name", "type", "created_at", "updated_at") VALUES
(1,	'Canon',	NULL,	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(2,	'Epson',	NULL,	'2022-11-30 22:37:00',	'2022-11-30 22:37:00');

DROP TABLE IF EXISTS "migrations";
DROP SEQUENCE IF EXISTS migrations_id_seq;
CREATE SEQUENCE migrations_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."migrations" (
    "id" integer DEFAULT nextval('migrations_id_seq') NOT NULL,
    "migration" character varying(255) NOT NULL,
    "batch" integer NOT NULL,
    CONSTRAINT "migrations_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "migrations" ("id", "migration", "batch") VALUES
(7,	'2014_10_12_000000_create_users_table',	1),
(8,	'2014_10_12_100000_create_password_resets_table',	1),
(9,	'2019_08_19_000000_create_failed_jobs_table',	1),
(10,	'2021_09_13_094650_create_orders_table',	1),
(11,	'2021_11_22_071955_create_merks_table',	1),
(12,	'2022_11_30_200314_create_permission_tables',	1);

DROP TABLE IF EXISTS "model_has_permissions";
CREATE TABLE "public"."model_has_permissions" (
    "permission_id" bigint NOT NULL,
    "model_type" character varying(255) NOT NULL,
    "model_id" bigint NOT NULL,
    CONSTRAINT "model_has_permissions_pkey" PRIMARY KEY ("permission_id", "model_id", "model_type"),
    CONSTRAINT "model_has_permissions_permission_id_foreign" FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "model_has_permissions_model_id_model_type_index" ON "public"."model_has_permissions" USING btree ("model_id", "model_type");


DROP TABLE IF EXISTS "model_has_roles";
CREATE TABLE "public"."model_has_roles" (
    "role_id" bigint NOT NULL,
    "model_type" character varying(255) NOT NULL,
    "model_id" bigint NOT NULL,
    CONSTRAINT "model_has_roles_pkey" PRIMARY KEY ("role_id", "model_id", "model_type"),
    CONSTRAINT "model_has_roles_role_id_foreign" FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "model_has_roles_model_id_model_type_index" ON "public"."model_has_roles" USING btree ("model_id", "model_type");

INSERT INTO "model_has_roles" ("role_id", "model_type", "model_id") VALUES
(2,	'App\User',	1),
(1,	'App\User',	2);

DROP TABLE IF EXISTS "orders";
DROP SEQUENCE IF EXISTS orders_id_seq;
CREATE SEQUENCE orders_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."orders" (
    "id" bigint DEFAULT nextval('orders_id_seq') NOT NULL,
    "code" character varying(255),
    "user_id" bigint NOT NULL,
    "type" character varying(255) NOT NULL,
    "merk_id" integer NOT NULL,
    "location_name" character varying(255),
    "location_address" character varying(255),
    "location_latitude" character varying(255),
    "location_longitude" character varying(255),
    "description" text NOT NULL,
    "price_total" integer,
    "price_dp" integer,
    "price_paid_off" integer,
    "price_transport" integer,
    "other_cost" text,
    "status_id" integer NOT NULL,
    "service_type" character varying(255) NOT NULL,
    "admin_description" text,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "orders_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "orders" ("id", "code", "user_id", "type", "merk_id", "location_name", "location_address", "location_latitude", "location_longitude", "description", "price_total", "price_dp", "price_paid_off", "price_transport", "other_cost", "status_id", "service_type", "admin_description", "created_at", "updated_at") VALUES
(1,	'1',	1,	'indoor',	1,	NULL,	NULL,	NULL,	NULL,	'Coba',	100000,	NULL,	NULL,	NULL,	NULL,	1,	'pengecekan',	NULL,	'2022-11-30 22:37:01',	'2022-11-30 22:37:01');

DROP TABLE IF EXISTS "password_resets";
CREATE TABLE "public"."password_resets" (
    "email" character varying(255) NOT NULL,
    "token" character varying(255) NOT NULL,
    "created_at" timestamp(0)
) WITH (oids = false);

CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree ("email");


DROP TABLE IF EXISTS "permissions";
DROP SEQUENCE IF EXISTS permissions_id_seq;
CREATE SEQUENCE permissions_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."permissions" (
    "id" bigint DEFAULT nextval('permissions_id_seq') NOT NULL,
    "name" character varying(255) NOT NULL,
    "guard_name" character varying(255) NOT NULL,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "permissions_name_guard_name_unique" UNIQUE ("name", "guard_name"),
    CONSTRAINT "permissions_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "permissions" ("id", "name", "guard_name", "created_at", "updated_at") VALUES
(1,	'dashboard',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(2,	'list admin',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(3,	'create admin',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(4,	'edit admin',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(5,	'delete admin',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(6,	'list guest',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(7,	'create guest',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(8,	'edit guest',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(9,	'delete guest',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(10,	'list order',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(11,	'edit order',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(12,	'delete order',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00');

DROP TABLE IF EXISTS "role_has_permissions";
CREATE TABLE "public"."role_has_permissions" (
    "permission_id" bigint NOT NULL,
    "role_id" bigint NOT NULL,
    CONSTRAINT "role_has_permissions_pkey" PRIMARY KEY ("permission_id", "role_id"),
    CONSTRAINT "role_has_permissions_permission_id_foreign" FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE NOT DEFERRABLE,
    CONSTRAINT "role_has_permissions_role_id_foreign" FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

INSERT INTO "role_has_permissions" ("permission_id", "role_id") VALUES
(1,	1),
(10,	1),
(1,	2),
(2,	2),
(3,	2),
(4,	2),
(5,	2),
(6,	2),
(7,	2),
(8,	2),
(9,	2),
(10,	2),
(11,	2),
(12,	2);

DROP TABLE IF EXISTS "roles";
DROP SEQUENCE IF EXISTS roles_id_seq;
CREATE SEQUENCE roles_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."roles" (
    "id" bigint DEFAULT nextval('roles_id_seq') NOT NULL,
    "name" character varying(255) NOT NULL,
    "guard_name" character varying(255) NOT NULL,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "roles_name_guard_name_unique" UNIQUE ("name", "guard_name"),
    CONSTRAINT "roles_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "roles" ("id", "name", "guard_name", "created_at", "updated_at") VALUES
(1,	'guest',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00'),
(2,	'admin',	'web',	'2022-11-30 22:37:00',	'2022-11-30 22:37:00');

DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."users" (
    "id" bigint DEFAULT nextval('users_id_seq') NOT NULL,
    "fullname" character varying(255) NOT NULL,
    "username" character varying(255),
    "email" character varying(255) NOT NULL,
    "email_verified_at" timestamp(0),
    "password" character varying(255),
    "phone" character varying(255),
    "photo" text,
    "description" text,
    "address" text,
    "role" character varying(255) NOT NULL,
    "remember_token" character varying(100),
    "deleted_at" timestamp(0),
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "users_email_unique" UNIQUE ("email"),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "users" ("id", "fullname", "username", "email", "email_verified_at", "password", "phone", "photo", "description", "address", "role", "remember_token", "deleted_at", "created_at", "updated_at") VALUES
(1,	'Admin',	'Admin',	'admin@gmail.com',	NULL,	'$2y$10$2HoKgHkM5p2n.TBfHz2YweAvzeiE6ZRiMa0gZ5Lp4fiBIqgKURBV.',	'123456789',	NULL,	NULL,	'ipsum',	'admin',	NULL,	NULL,	'2022-11-30 22:37:01',	'2022-11-30 22:37:01'),
(2,	'guest',	'guest',	'guest@gmail.com',	NULL,	'$2y$10$qULelj8XzhTBpRuPnLw0L.a8gsNLPycH6YcadcmtHsyfO7tvvKUNu',	'123456789',	NULL,	NULL,	'ipsum',	'guest',	NULL,	NULL,	'2022-11-30 22:37:01',	'2022-11-30 22:37:01'),
(3,	'admin2',	NULL,	'admin3@gmail.com',	NULL,	'$2y$10$filvdcNo5kn8PRfxQhYzYubF7I9Zv42gohnhyinTg./p1iZW2ZjUu',	'123456789',	NULL,	NULL,	NULL,	'admin',	NULL,	'2022-11-30 22:38:36',	'2022-11-30 22:37:56',	'2022-11-30 22:38:36'),
(4,	'guest2',	'guest2',	'guest2@gmail.com-deleted2',	NULL,	'$2y$10$d/RzcqkkiVClTt9n0JDQpuNQi6rM4o6O8m7XfMNlfoYK8RO7h4.R6',	'12345',	'90243.jpeg',	'test',	'test',	'guest',	NULL,	'2022-11-30 22:39:54',	'2022-11-30 22:39:41',	'2022-11-30 22:39:54');

-- 2022-11-30 23:02:26.306232+07
