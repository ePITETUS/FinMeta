CREATE TABLE Receita (
  idReceita INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  nmReceita VARCHAR(25) NULL,
  dscReceita VARCHAR(65) NULL,
  vlrReceita FLOAT(12) NULL,
  dthReceita DATE NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idReceita),
  INDEX Receita_FKIndex2(idPessoa),
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE PlanejamentoXPessoa (
  idPlanejamentoXPessoa INTEGER(4) UNSIGNED NOT NULL,
  idPlanejamento INTEGER(4) UNSIGNED NOT NULL,
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  PRIMARY KEY(idPlanejamentoXPessoa, idPlanejamento, idPessoa),
  INDEX Planejamentos_has_Dependentes_FKIndex2(idPessoa),
  INDEX PlanejamentosXDependentes_FKIndex2(idPlanejamento),
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idPlanejamento)
    REFERENCES Planejamento(idPlanejamento)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Obrigacao (
  idObrigacao INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idTipoObrigacao INTEGER(4) UNSIGNED NOT NULL,
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  nmObrigacao VARCHAR(25) NULL,
  dscObrigacao VARCHAR(65) NULL,
  fAtivo BIT NULL,
  VezesPagamento INTEGER(12) UNSIGNED NULL,
  dthObrigacao DATE NULL,
  PRIMARY KEY(idObrigacao),
  INDEX TipoObrigacao_FKIndex2(idPessoa),
  INDEX Obrigacao_FKIndex2(idTipoObrigacao),
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idTipoObrigacao)
    REFERENCES TipoObrigacao(idTipoObrigacao)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE ContaXPessoa (
  idContaXPessoa INTEGER(4) UNSIGNED NOT NULL,
  idConta INTEGER(4) UNSIGNED NOT NULL,
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  PRIMARY KEY(idContaXPessoa, idConta, idPessoa),
  INDEX Conta_has_Dependentes_FKIndex1(idConta),
  INDEX Conta_has_Dependentes_FKIndex2(idPessoa),
  FOREIGN KEY(idConta)
    REFERENCES Conta(idConta)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE CartaoCreditoXPessoa (
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  idCartaoCredito INTEGER(4) UNSIGNED NOT NULL,
  idCartaoCreditoXPessoa INTEGER(4) UNSIGNED NOT NULL,
  PRIMARY KEY(idPessoa, idCartaoCredito, idCartaoCreditoXPessoa),
  INDEX Pessoa_has_CartaoCredito_FKIndex1(idPessoa),
  INDEX Pessoa_has_CartaoCredito_FKIndex2(idCartaoCredito),
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idCartaoCredito)
    REFERENCES CartaoCredito(idCartaoCredito)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE DespesaFixaXPessoa (
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  idDespesaFixa INTEGER(4) UNSIGNED NOT NULL,
  idDespesaFixaXPessoa INTEGER(4) UNSIGNED NOT NULL,
  PRIMARY KEY(idPessoa, idDespesaFixa, idDespesaFixaXPessoa),
  INDEX Pessoa_has_DespesaFixa_FKIndex1(idPessoa),
  INDEX Pessoa_has_DespesaFixa_FKIndex2(idDespesaFixa),
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idDespesaFixa)
    REFERENCES DespesaFixa(idDespesaFixa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE ObjetivoXPessoa (
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  idObjetivo INTEGER(4) UNSIGNED NOT NULL,
  idObjetivoXPessoa INTEGER(4) UNSIGNED NOT NULL,
  PRIMARY KEY(idPessoa, idObjetivo, idObjetivoXPessoa),
  INDEX Pessoa_has_Objetivo_FKIndex1(idPessoa),
  INDEX Pessoa_has_Objetivo_FKIndex2(idObjetivo),
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idObjetivo)
    REFERENCES Objetivo(idObjetivo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Gasto (
  idGasto INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idTipoGasto INTEGER(4) UNSIGNED NOT NULL,
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  nmGasto VARCHAR(25) NULL,
  dscGasto VARCHAR(65) NULL,
  fAtivo BIT NULL,
  VezesPagamento INTEGER UNSIGNED NULL,
  PRIMARY KEY(idGasto),
  INDEX TipoGasto_FKIndex2(idPessoa),
  INDEX Gasto_FKIndex2(idTipoGasto),
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idTipoGasto)
    REFERENCES TipoGasto(idTipoGasto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);
