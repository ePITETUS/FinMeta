CREATE TABLE Fatura (
  idFatura INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idFaturaStatus INTEGER(4) UNSIGNED NOT NULL,
  idCartaoCredito INTEGER(4) UNSIGNED NOT NULL,
  MesReferencia DATE NULL,
  Pagamento BIT NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idFatura),
  INDEX Faturas_FKIndex2(idCartaoCredito),
  INDEX Fatura_FKIndex2(idFaturaStatus),
  FOREIGN KEY(idCartaoCredito)
    REFERENCES CartaoCredito(idCartaoCredito)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idFaturaStatus)
    REFERENCES FaturaStatus(idFaturaStatus)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Emprestimo (
  idEmprestimo INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idEmprestimoSituacao INTEGER(4) UNSIGNED NOT NULL,
  idJurosPeriodicidade INTEGER(4) UNSIGNED NOT NULL,
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  nmEmprestimo VARCHAR(25) NULL,
  dscEmprestimo VARCHAR(90) NULL,
  vlrEmprestimo FLOAT(11) NULL,
  VezesPagamento INTEGER UNSIGNED NULL,
  Juros INTEGER UNSIGNED NULL,
  fAtivo BIT NULL,
  PRIMARY KEY(idEmprestimo),
  INDEX Emprestimo_FKIndex2(idJurosPeriodicidade),
  INDEX Emprestimo_FKIndex3(idPessoa),
  INDEX Emprestimo_FKIndex4(idEmprestimoSituacao),
  FOREIGN KEY(idJurosPeriodicidade)
    REFERENCES JurosPeriodicidade(idJurosPeriodicidade)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idEmprestimoSituacao)
    REFERENCES EmprestimoSituacao(idEmprestimoSituacao)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Movimentacao (
  idMovimentacao INTEGER(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuarioTitular INTEGER(4) UNSIGNED NOT NULL,
  idGasto INTEGER(4) UNSIGNED NOT NULL,
  idObrigacao INTEGER(4) UNSIGNED NOT NULL,
  idPessoa INTEGER(4) UNSIGNED NOT NULL,
  idConta INTEGER(4) UNSIGNED NOT NULL,
  idAtivo INTEGER(4) UNSIGNED NOT NULL,
  idPlanejamento INTEGER(4) UNSIGNED NOT NULL,
  idReceita INTEGER(4) UNSIGNED NOT NULL,
  idEmprestimo INTEGER(4) UNSIGNED NOT NULL,
  idObjetivo INTEGER(4) UNSIGNED NOT NULL,
  idFatura INTEGER(4) UNSIGNED NOT NULL,
  idDespesaFixa INTEGER(4) UNSIGNED NOT NULL,
  idCaraterMovimentacao INTEGER(4) UNSIGNED NOT NULL,
  vlrMovimentacao FLOAT(12) NULL,
  dthRegistro DATETIME NULL,
  dthMovimentacao DATETIME NULL,
  PRIMARY KEY(idMovimentacao),
  INDEX Movimentacoes_FKIndex1(idObrigacao),
  INDEX Movimentacoes_FKIndex2(idAtivo),
  INDEX Movimentacoes_FKIndex3(idObjetivo),
  INDEX Movimentacoes_FKIndex4(idEmprestimo),
  INDEX Movimentacoes_FKIndex5(idReceita),
  INDEX Movimentacoes_FKIndex6(idPlanejamento),
  INDEX Movimentacoes_FKIndex7(idFatura),
  INDEX Movimentacoes_FKIndex8(idGasto),
  INDEX Movimentacoes_FKIndex9(idDespesaFixa),
  INDEX Movimentacao_FKIndex10(idConta),
  INDEX Movimentacao_FKIndex11(idPessoa),
  INDEX Movimentacao_FKIndex12(idCaraterMovimentacao),
  INDEX Movimentacao_FKIndex13(idUsuarioTitular),
  FOREIGN KEY(idFatura)
    REFERENCES Fatura(idFatura)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idGasto)
    REFERENCES Gasto(idGasto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idObrigacao)
    REFERENCES Obrigacao(idObrigacao)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idDespesaFixa)
    REFERENCES DespesaFixa(idDespesaFixa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idCaraterMovimentacao)
    REFERENCES CaraterMovimentacao(idCaraterMovimentacao)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idAtivo)
    REFERENCES Ativo(idAtivo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idObjetivo)
    REFERENCES Objetivo(idObjetivo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idEmprestimo)
    REFERENCES Emprestimo(idEmprestimo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idReceita)
    REFERENCES Receita(idReceita)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idPlanejamento)
    REFERENCES Planejamento(idPlanejamento)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idConta)
    REFERENCES Conta(idConta)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idPessoa)
    REFERENCES Pessoa(idPessoa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
    FOREIGN KEY(idUsuarioTitular)
    REFERENCES UsuarioTitular(idUsuarioTitular)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

INSERT INTO `CaraterMovimentacao` (`idCaraterMovimentacao`, `dscCaraterMovimentacao`, `fAtivo`) VALUES (1, 'ENTRADA', b'1'), (2, 'SAÍDA', b'1');

INSERT INTO `FaturaStatus` (`idFaturaStatus`, `dscFaturaStatus`, `fAtivo`) VALUES (1, 'ABERTA', b'1'), (2, 'FECHADA', b'1');

INSERT INTO `PlanejamentoStatus` (`idPlanejamentoStatus`, `dscPlanejamentoStatus`) VALUES (1, 'DENTRO DO ORÇAMENTO'), (2, 'FORA DO ORÇAMENTO');

INSERT INTO `EmprestimoSituacao` (`idEmprestimoSituacao`, `dscEmprestimoSituacao`) VALUES (1, 'PAGANDO'), (2, 'PAGO');

INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (1, 'CONTA CORRENTE', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (2, 'CONTA POUPANÇA', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (3, 'CONTA SALÁRIO', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (4, 'CONTA CONJUNTA', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (5, 'CONTA DE INVESTIMENTO', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (6, 'CONTA DIGITAL', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (7, 'CONTA EMPRESARIAL', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (8, 'CONTA INFANTIL', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (9, 'CONTA UNIVERSITÁRIA', b'1');
INSERT INTO `TipoConta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES (10, 'CONTA DE DEPÓSITO A PRAZO', b'1');

INSERT INTO `ObjetivoStatus` (`idObjetivoStatus`, `dscObjetivoStatus`) VALUES (1, 'CONQUISTADO');
INSERT INTO `ObjetivoStatus` (`idObjetivoStatus`, `dscObjetivoStatus`) VALUES (2, 'ADIADO');
INSERT INTO `ObjetivoStatus` (`idObjetivoStatus`, `dscObjetivoStatus`) VALUES (3, 'ATRASADO');
INSERT INTO `ObjetivoStatus` (`idObjetivoStatus`, `dscObjetivoStatus`) VALUES (4, 'CANCELADO');
INSERT INTO `ObjetivoStatus` (`idObjetivoStatus`, `dscObjetivoStatus`) VALUES (5, 'ATUALIZADA');
INSERT INTO `ObjetivoStatus` (`idObjetivoStatus`, `dscObjetivoStatus`) VALUES (6, 'EM ANDAMENTO');

INSERT INTO `JurosPeriodicidade` (`idJurosPeriodicidade`, `nmJurosPeriodicidade`, `fAtivo`) VALUES (1, 'ANU', NULL);
INSERT INTO `JurosPeriodicidade` (`idJurosPeriodicidade`, `nmJurosPeriodicidade`, `fAtivo`) VALUES (2, 'SEM', NULL);
INSERT INTO `JurosPeriodicidade` (`idJurosPeriodicidade`, `nmJurosPeriodicidade`, `fAtivo`) VALUES (3, 'TRI', NULL);
INSERT INTO `JurosPeriodicidade` (`idJurosPeriodicidade`, `nmJurosPeriodicidade`, `fAtivo`) VALUES (4, 'BIM', NULL);
INSERT INTO `JurosPeriodicidade` (`idJurosPeriodicidade`, `nmJurosPeriodicidade`, `fAtivo`) VALUES (5, 'MEN', NULL);

INSERT INTO `CartaoCreditoStatus` (`idCartaoCreditoStatus`, `dscCartaoCreditoStatus`, `fAtivo`) VALUES (1, 'ATIVO', b'1'), (2, 'BLOQUEADO', b'1');

INSERT INTO `TipoAcesso` (`idTipoAcesso`, `nmTipoAcesso`) VALUES ('1', 'ADMINISTRADOR'), ('2', 'USUÁRIO');

INSERT INTO `TipoAtivo` (`idTipoAtivo`, `nmTipoAtivo`) VALUES (1, 'AÇÕES');
INSERT INTO `TipoAtivo` (`idTipoAtivo`, `nmTipoAtivo`) VALUES (2, 'FUNDOS DE INVESTIMENTO IMOBILIÁRIOS (FII)');
INSERT INTO `TipoAtivo` (`idTipoAtivo`, `nmTipoAtivo`) VALUES (3, 'EXCHANGE TRADED FUNDS (ETF)');
INSERT INTO `TipoAtivo` (`idTipoAtivo`, `nmTipoAtivo`) VALUES (4, 'TÍTULOS DE RENDA FIXA');
INSERT INTO `TipoAtivo` (`idTipoAtivo`, `nmTipoAtivo`) VALUES (5, 'MOEDAS ESTRANGEIRAS');
INSERT INTO `TipoAtivo` (`idTipoAtivo`, `nmTipoAtivo`) VALUES (6, 'SEGUROS');
INSERT INTO `TipoAtivo` (`idTipoAtivo`, `nmTipoAtivo`) VALUES (7, 'OURO');
INSERT INTO `TipoAtivo` (`idTipoAtivo`, `nmTipoAtivo`) VALUES (8, 'CRIPTOMOEDAS');

INSERT INTO `NivelRelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES ('1', NULL, 'PAI', b'1'), ('2', NULL, 'MÃE', b'1');
INSERT INTO `NivelRelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES ('3', NULL, 'IRMÃO', b'1'), ('4', NULL, 'IRMÃ', b'1');
INSERT INTO `NivelRelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES ('5', NULL, 'FILHO', b'1'), ('6', NULL, 'FILHA', b'1');
INSERT INTO `NivelRelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES ('7', NULL, 'MARIDO', b'1'), ('8', NULL, 'ESPOSA', b'1');
INSERT INTO `NivelRelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES ('9', NULL, 'SOBRINHO', b'1'), ('10', NULL, 'SOBRINHA', b'1');
INSERT INTO `NivelRelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES ('11', NULL, 'PRIMO', b'1'), ('12', NULL, 'PRIMA', b'1');
INSERT INTO `NivelRelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES ('13', NULL, 'TIA', b'1'), ('14', NULL, 'TIO', b'1');
INSERT INTO `NivelRelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES ('15', NULL, 'AVÔ', b'1'), ('16', NULL, 'AVÓ', b'1');