CREATE TABLE FaturaStatus (
  idFaturaStatus INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscFaturaStatus VARCHAR(15) NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idFaturaStatus)
);

CREATE TABLE PlanejamentoStatus (
  idPlanejamentoStatus INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscPlanejamentoStatus VARCHAR(24) NULL,
  PRIMARY KEY(idPlanejamentoStatus)
);


CREATE TABLE EmprestimoSituacao (
  idEmprestimoSituacao INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscEmprestimoSituacao VARCHAR(15) NULL,
  PRIMARY KEY(idEmprestimoSituacao)
);


CREATE TABLE TipoConta (
  idTipoConta INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscTipoConta VARCHAR(30) NOT NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idTipoConta)
);


CREATE TABLE ObjetivoStatus (
  idObjetivoStatus INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscObjetivoStatus VARCHAR(15) NULL,
  PRIMARY KEY(idObjetivoStatus)
);

CREATE TABLE JurosPeriodicidade (
  idJurosPeriodicidade INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  nmJurosPeriodicidade VARCHAR(3) NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idJurosPeriodicidade)
);

CREATE TABLE CartaoCreditoStatus (
  idCartaoCreditoStatus INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscCartaoCreditoStatus VARCHAR(12) NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idCartaoCreditoStatus)
);

CREATE TABLE TipoAcesso (
  idTipoAcesso INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  nmTipoAcesso VARCHAR(15) NULL,
  PRIMARY KEY(idTipoAcesso)
);

CREATE TABLE CaraterMovimentacao (
  idCaraterMovimentacao INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  dscCaraterMovimentacao VARCHAR(7) NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idCaraterMovimentacao)
);

