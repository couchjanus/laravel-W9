-- Database: homestead

-- DROP DATABASE homestead;

CREATE DATABASE homestead
  WITH OWNER = dev
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'ru_UA.UTF-8'
       LC_CTYPE = 'ru_UA.UTF-8'
       CONNECTION LIMIT = -1;

-- Table: public.migrations

-- DROP TABLE public.migrations;

CREATE TABLE public.migrations
(
  id integer NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  migration character varying(255) NOT NULL,
  batch integer NOT NULL,
  CONSTRAINT migrations_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.migrations
  OWNER TO dev;
