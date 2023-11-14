CREATE SCHEMA IF NOT EXISTS saloneDB DEFAULT CHARACTER SET utf8 ;
USE saloneDB ;

CREATE TABLE IF NOT EXISTS marcas (
  id_marcas INT UNSIGNED NOT NULL AUTO_INCREMENT,
  desc_marcas VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_marcas),
  UNIQUE INDEX desc_marcas_UNIQUE (desc_marcas ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS combustiveis (
  id_combustiveis INT UNSIGNED NOT NULL AUTO_INCREMENT,
  desc_combustiveis VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_combustiveis))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS versoes (
  id_versoes INT UNSIGNED NOT NULL AUTO_INCREMENT,
  combustiveis_id INT UNSIGNED NOT NULL,
  desc_versoes VARCHAR(100) NOT NULL,
  ano_versoes INT NOT NULL,
  PRIMARY KEY (id_versoes, combustiveis_id),
  UNIQUE INDEX desc_versoes_UNIQUE (desc_versoes ASC),
  INDEX fk_versoes_combustiveis1_idx (combustiveis_id ASC),
  CONSTRAINT fk_versoes_combustiveis1
    FOREIGN KEY (combustiveis_id)
    REFERENCES saloneDB.combustiveis (id_combustiveis)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS modelos (
  id_modelos INT UNSIGNED NOT NULL AUTO_INCREMENT,
  marcas_id INT UNSIGNED NOT NULL,
  versoes_id INT UNSIGNED NOT NULL,
  nome_modelos VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_modelos, marcas_id, versoes_id),
  INDEX fk_modelos_marcas_idx (marcas_id ASC),
  UNIQUE INDEX nome_modelos_UNIQUE (nome_modelos ASC),
  INDEX fk_modelos_versoes1_idx (versoes_id ASC),
  CONSTRAINT fk_modelos_marcas
    FOREIGN KEY (marcas_id)
    REFERENCES saloneDB.marcas (id_marcas)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_modelos_versoes1
    FOREIGN KEY (versoes_id)
    REFERENCES saloneDB.versoes (id_versoes)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS cidades (
  id_cidades INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_cidades VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_cidades))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS usuarios (
  id_usuarios INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_usuarios VARCHAR(100) NOT NULL,
  email_usuarios VARCHAR(100) NOT NULL,
  senha_usuarios VARCHAR(100) NOT NULL,
  cel_usuarios VARCHAR(15) NOT NULL,
  cpf_usuarios VARCHAR(11) NOT NULL,
  dat_nasc_usuarios DATETIME NOT NULL,
  PRIMARY KEY (id_usuarios))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS cores (
  id_cores INT UNSIGNED NOT NULL AUTO_INCREMENT,
  desc_cores VARCHAR(100) NOT NULL,
  hex_cores VARCHAR(6) NOT NULL,
  PRIMARY KEY (id_cores))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS anuncios (
  id_anuncios INT UNSIGNED NOT NULL AUTO_INCREMENT,
  vendido_anuncios BIT NOT NULL DEFAULT 0,
  cidades_id INT UNSIGNED NOT NULL,
  usuarios_id INT UNSIGNED NOT NULL,
  modelos_id INT UNSIGNED NOT NULL,
  cores_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id_anuncios, cidades_id, usuarios_id, modelos_id, cores_id),
  INDEX fk_anuncios_cidades1_idx (cidades_id ASC),
  INDEX fk_anuncios_usuarios1_idx (usuarios_id ASC),
  INDEX fk_anuncios_modelos1_idx (modelos_id ASC),
  INDEX fk_anuncios_cores1_idx (cores_id ASC),
  CONSTRAINT fk_anuncios_cidades1
    FOREIGN KEY (cidades_id)
    REFERENCES saloneDB.cidades (id_cidades)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_anuncios_usuarios1
    FOREIGN KEY (usuarios_id)
    REFERENCES saloneDB.usuarios (id_usuarios)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_anuncios_modelos1
    FOREIGN KEY (modelos_id)
    REFERENCES saloneDB.modelos (id_modelos)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_anuncios_cores1
    FOREIGN KEY (cores_id)
    REFERENCES saloneDB.cores (id_cores)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;