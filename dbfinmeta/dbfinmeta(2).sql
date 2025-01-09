CREATE TABLE UsuarioTitular (
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  nmUsuario VARCHAR(30) NULL,
  dthRegistro DATETIME NULL,
  CPF VARCHAR(11) NULL,
  Senha VARCHAR(50) NULL,
  Email VARCHAR(30),
  PRIMARY KEY(idUsuarioTitular)
);

CREATE TABLE AtivoStatus (
  idAtivoStatus INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscAtivoStatus VARCHAR(50) NULL,
  PRIMARY KEY(idAtivoStatus)
);

CREATE TABLE RendimentoPeriodicidade (
  idRendimentoPeriodicidade INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscRendimentoPeriodicidade VARCHAR(10) NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idRendimentoPeriodicidade)
);

CREATE TABLE TipoGasto (
  idTipoGasto INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  nmTipoGasto VARCHAR(15) NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idTipoGasto),
  INDEX TipoGasto_FKIndex1(idUsuarioTitular),
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE NivelRelacionamento (
  idNivelRelacionamento INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuarioTitular INTEGER(4) UNSIGNED NULL,
  dscRelacionamento VARCHAR(20) NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idNivelRelacionamento),
  INDEX NivelRelacionamento_FKIndex1(idUsuarioTitular),
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE DespesaFixa (
  idDespesaFixa INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  nmDespesaFixa VARCHAR(25) NULL,
  dscDespesaFixa VARCHAR(65) NULL,
  diaDespesa INTEGER(2) UNSIGNED NULL,
  mesDespesa INTEGER(2) UNSIGNED NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idDespesaFixa),
  INDEX DespesaFixa_FKIndex2(idUsuarioTitular),
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE TipoObjetivo (
  idTipoObjetivo INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  nmTipoOjetivo VARCHAR(15) NULL,
  PRIMARY KEY(idTipoObjetivo),
  INDEX TipoObjetivo_FKIndex1(idUsuarioTitular),
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE TipoObrigacao (
  idTipoObrigacao INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  nmTipoObrigacao VARCHAR(15) NULL,
  idCaraterMovimentacao INTEGER(4) UNSIGNED NOT NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idTipoObrigacao),
  INDEX TipoObrigacao_FKIndex1(idUsuarioTitular),
  INDEX TipoObrigacao_FKIndex2(idCaraterMovimentacao),
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idCaraterMovimentacao)
    REFERENCES CaraterMovimentacao(idCaraterMovimentacao)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);
