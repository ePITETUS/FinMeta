CREATE TABLE TipoAtivo (
  idTipoAtivo INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idRendimentoPeriodicidade INTEGER(4) UNSIGNED NULL,
  nmTipoAtivo VARCHAR(50) NULL,
  PRIMARY KEY(idTipoAtivo),
  INDEX TipoAtivo_FKIndex1(idRendimentoPeriodicidade),
  FOREIGN KEY(idRendimentoPeriodicidade)
    REFERENCES RendimentoPeriodicidade(idRendimentoPeriodicidade)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


CREATE TABLE TipoPlanejamento (
  idTipoPlanejamento INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  dscTipoPlanejamento INTEGER UNSIGNED NULL,
  PRIMARY KEY(idTipoPlanejamento),
  INDEX TipoPlanejamento_FKIndex1(idUsuarioTitular),
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Conta (
  idConta INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  idTipoConta INTEGER(4) UNSIGNED NOT NULL,
  nmConta VARCHAR(25) NOT NULL,
  dscConta VARCHAR(35) NULL,
  dthRegistro DATETIME NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idConta),
  INDEX Conta_FKIndex2(idTipoConta),
  INDEX Conta_FKIndex3(idUsuarioTitular),
  FOREIGN KEY(idTipoConta)
    REFERENCES TipoConta(idTipoConta)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE CartaoCredito (
  idCartaoCredito INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idCartaoCreditoStatus INTEGER(4) UNSIGNED NOT NULL,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  idConta INTEGER(4) UNSIGNED NOT NULL,
  nmCartao VARCHAR(25) NOT NULL,
  diaVencimentoFatura INTEGER(2) UNSIGNED NULL,
  dscCartao VARCHAR(30) NULL,
  dthRegistro DATETIME NOT NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idCartaoCredito),
  INDEX CartoesCredito_FKIndex2(idConta),
  INDEX CartaoCredito_FKIndex2(idUsuarioTitular),
  INDEX CartaoCredito_FKIndex3(idCartaoCreditoStatus),
  FOREIGN KEY(idConta)
    REFERENCES Conta(idConta)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idCartaoCreditoStatus)
    REFERENCES CartaoCreditoStatus(idCartaoCreditoStatus)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Objetivo (
  idObjetivo INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idTipoObjetivo INTEGER(4) UNSIGNED NULL,
  idObjetivoStatus INTEGER(4) UNSIGNED NOT NULL,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  nmObjetivo VARCHAR(25) NULL,
  dscObjetivo VARCHAR(65) NULL,
  vlrObjetivo FLOAT(12) NULL,
  dthPrevisao DATE NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idObjetivo),
  INDEX Objetivo_FKIndex2(idUsuarioTitular),
  INDEX Objetivo_FKIndex3(idObjetivoStatus),
  INDEX Objetivo_FKIndex4(idTipoObjetivo),
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idObjetivoStatus)
    REFERENCES ObjetivoStatus(idObjetivoStatus)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idTipoObjetivo)
    REFERENCES TipoObjetivo(idTipoObjetivo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Planejamento (
  idPlanejamento INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idTipoPlanejamento INTEGER(4) UNSIGNED NULL,
  idPlanejamentoStatus INTEGER(4) UNSIGNED NOT NULL,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  nmPlanejamento VARCHAR(25) NULL,
  dscPlanejamento VARCHAR(65) NULL,
  vlrPlanejamento FLOAT(12) NULL,
  dthRegistro DATETIME NULL,
  mesPlanejamento INTEGER(2) UNSIGNED NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idPlanejamento),
  INDEX Planejamento_FKIndex2(idUsuarioTitular),
  INDEX Planejamento_FKIndex3(idPlanejamentoStatus),
  INDEX Planejamento_FKIndex4(idTipoPlanejamento),-- Surgiu um aviso ao fazer o push 
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idPlanejamentoStatus)
    REFERENCES PlanejamentoStatus(idPlanejamentoStatus)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idTipoPlanejamento)
    REFERENCES TipoPlanejamento(idTipoPlanejamento)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Pessoa (
  idPessoa INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idTipoAcesso INTEGER(4) UNSIGNED NOT NULL,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  idNivelRelacionamento INTEGER(4) UNSIGNED,
  nmPessoa VARCHAR(30) NULL,
  dthNasc DATE NULL,
  CPF VARCHAR(11) NULL,
  dthRegistro DATETIME NULL,
  Email VARCHAR(30) NULL,
  LoginAcesso VARCHAR(15) NULL,
  Senha VARCHAR(50) NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idPessoa),
  INDEX Dependentes_FKIndex1(idUsuarioTitular),
  INDEX Dependente_FKIndex2(idNivelRelacionamento),
  INDEX Pessoa_FKIndex3(idTipoAcesso),
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idNivelRelacionamento)
    REFERENCES NivelRelacionamento(idNivelRelacionamento)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idTipoAcesso)
    REFERENCES TipoAcesso(idTipoAcesso)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Ativo (
  idAtivo INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idTipoAtivo INTEGER(4) UNSIGNED NOT NULL,
  idAtivoStatus INTEGER(4) UNSIGNED NULL,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  nmAtivo VARCHAR(25) NULL,
  dscAtivo VARCHAR(65) NULL,
  Rendimento INTEGER(4) UNSIGNED NULL,
  fAtivo BIT NULL,
  dthRegistro DATE NULL,
  dthAquisicao DATE NULL,
  PRIMARY KEY(idAtivo),
  INDEX Ativo_FKIndex2(idPessoa),
  INDEX Ativo_FKIndex3(idUsuarioTitular),
  INDEX Ativo_FKIndex4(idAtivoStatus),
  INDEX Ativo_FKIndex5(idTipoAtivo),
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idAtivoStatus)
    REFERENCES AtivoStatus(idAtivoStatus)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idTipoAtivo)
    REFERENCES TipoAtivo(idTipoAtivo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);