-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql310.infinityfree.com
-- Tempo de geração: 08/01/2025 às 22:02
-- Versão do servidor: 10.6.19-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `if0_37647538_dbfinmeta`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ativo`
--

CREATE TABLE `ativo` (
  `idAtivo` int(4) UNSIGNED NOT NULL,
  `idTipoAtivo` int(4) UNSIGNED NOT NULL,
  `idAtivoStatus` int(4) UNSIGNED DEFAULT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `nmAtivo` varchar(25) DEFAULT NULL,
  `dscAtivo` varchar(65) DEFAULT NULL,
  `Rendimento` int(4) UNSIGNED DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL,
  `dthRegistro` date DEFAULT NULL,
  `dthAquisicao` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `ativo`
--

INSERT INTO `ativo` (`idAtivo`, `idTipoAtivo`, `idAtivoStatus`, `idUsuarioTitular`, `idPessoa`, `nmAtivo`, `dscAtivo`, `Rendimento`, `fAtivo`, `dthRegistro`, `dthAquisicao`) VALUES
(1, 1, NULL, 1, 1, 'PETR4', 'Compra de AÃ§Ãµes', 0, b'1', NULL, '2024-11-04'),
(2, 4, NULL, 1, 1, 'IPCA + 6', 'Compra de Papel', 6, b'1', NULL, '2024-10-01'),
(3, 8, NULL, 1, 1, 'BITCOIN', 'Compra de Criptomoeda', 0, b'1', NULL, '2024-09-06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ativostatus`
--

CREATE TABLE `ativostatus` (
  `idAtivoStatus` int(4) UNSIGNED NOT NULL,
  `dscAtivoStatus` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `caratermovimentacao`
--

CREATE TABLE `caratermovimentacao` (
  `idCaraterMovimentacao` int(4) UNSIGNED NOT NULL,
  `dscCaraterMovimentacao` varchar(7) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `caratermovimentacao`
--

INSERT INTO `caratermovimentacao` (`idCaraterMovimentacao`, `dscCaraterMovimentacao`, `fAtivo`) VALUES
(1, 'ENTRADA', b'1'),
(2, 'SAIDA', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartao`
--

CREATE TABLE `cartao` (
  `idCartao` int(4) UNSIGNED NOT NULL,
  `idCartaoStatus` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `idTipoCartao` int(4) UNSIGNED NOT NULL,
  `idConta` int(4) UNSIGNED NOT NULL,
  `nmCartao` varchar(40) NOT NULL,
  `diaVencimentoFatura` int(2) UNSIGNED DEFAULT NULL,
  `dscCartao` varchar(30) DEFAULT NULL,
  `dthRegistro` datetime NOT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `cartao`
--

INSERT INTO `cartao` (`idCartao`, `idCartaoStatus`, `idUsuarioTitular`, `idTipoCartao`, `idConta`, `nmCartao`, `diaVencimentoFatura`, `dscCartao`, `dthRegistro`, `fAtivo`) VALUES
(1, 1, 1, 1, 1, 'CartÃ£o do Carlos', 15, 'CartÃ£o que o Carlos usa', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartaostatus`
--

CREATE TABLE `cartaostatus` (
  `idCartaoStatus` int(4) UNSIGNED NOT NULL,
  `dscCartaoStatus` varchar(12) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `cartaostatus`
--

INSERT INTO `cartaostatus` (`idCartaoStatus`, `dscCartaoStatus`, `fAtivo`) VALUES
(1, 'ATIVO', b'1'),
(2, 'BLOQUEADO', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartaoxpessoa`
--

CREATE TABLE `cartaoxpessoa` (
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `idCartao` int(4) UNSIGNED NOT NULL,
  `idCartaoXPessoa` int(4) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `idConta` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `idTipoConta` int(4) UNSIGNED NOT NULL,
  `nmConta` varchar(25) NOT NULL,
  `dscConta` varchar(35) DEFAULT NULL,
  `dthRegistro` datetime DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `conta`
--

INSERT INTO `conta` (`idConta`, `idUsuarioTitular`, `idTipoConta`, `nmConta`, `dscConta`, `dthRegistro`, `fAtivo`) VALUES
(1, 1, 1, 'Santander', 'Conta principal', NULL, b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contaxpessoa`
--

CREATE TABLE `contaxpessoa` (
  `idContaXPessoa` int(4) UNSIGNED NOT NULL,
  `idConta` int(4) UNSIGNED NOT NULL,
  `idPessoa` int(4) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesafixa`
--

CREATE TABLE `despesafixa` (
  `idDespesaFixa` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `nmDespesaFixa` varchar(25) DEFAULT NULL,
  `dscDespesaFixa` varchar(65) DEFAULT NULL,
  `diaDespesa` int(2) UNSIGNED DEFAULT NULL,
  `mesDespesa` int(2) UNSIGNED DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `despesafixa`
--

INSERT INTO `despesafixa` (`idDespesaFixa`, `idUsuarioTitular`, `nmDespesaFixa`, `dscDespesaFixa`, `diaDespesa`, `mesDespesa`, `fAtivo`) VALUES
(1, 1, 'Financiamento Casa', 'Parcela do Financiamento Casa', 5, 0, b'1'),
(2, 1, 'IPVA Carro', 'Pagamento IPVA', 23, 1, b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesafixaxpessoa`
--

CREATE TABLE `despesafixaxpessoa` (
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `idDespesaFixa` int(4) UNSIGNED NOT NULL,
  `idDespesaFixaXPessoa` int(4) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `idEmprestimo` int(4) UNSIGNED NOT NULL,
  `idEmprestimoSituacao` int(4) UNSIGNED NOT NULL,
  `idJurosPeriodicidade` int(4) UNSIGNED NOT NULL,
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `nmEmprestimo` varchar(25) DEFAULT NULL,
  `dscEmprestimo` varchar(90) DEFAULT NULL,
  `vlrEmprestimo` float DEFAULT NULL,
  `VezesPagamento` int(10) UNSIGNED DEFAULT NULL,
  `Juros` int(10) UNSIGNED DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `emprestimo`
--

INSERT INTO `emprestimo` (`idEmprestimo`, `idEmprestimoSituacao`, `idJurosPeriodicidade`, `idPessoa`, `nmEmprestimo`, `dscEmprestimo`, `vlrEmprestimo`, `VezesPagamento`, `Juros`, `fAtivo`) VALUES
(1, 1, 1, 1, 'EmprÃ©stimo', 'Abrindo um novo negÃ³cio', 10000, 20, 15, b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimosituacao`
--

CREATE TABLE `emprestimosituacao` (
  `idEmprestimoSituacao` int(4) UNSIGNED NOT NULL,
  `dscEmprestimoSituacao` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `emprestimosituacao`
--

INSERT INTO `emprestimosituacao` (`idEmprestimoSituacao`, `dscEmprestimoSituacao`) VALUES
(1, 'PAGANDO'),
(2, 'PAGO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fatura`
--

CREATE TABLE `fatura` (
  `idFatura` int(4) UNSIGNED NOT NULL,
  `idFaturaStatus` int(4) UNSIGNED NOT NULL,
  `idCartao` int(4) UNSIGNED NOT NULL,
  `MesReferencia` date DEFAULT NULL,
  `Pagamento` bit(1) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `faturastatus`
--

CREATE TABLE `faturastatus` (
  `idFaturaStatus` int(4) UNSIGNED NOT NULL,
  `dscFaturaStatus` varchar(15) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `faturastatus`
--

INSERT INTO `faturastatus` (`idFaturaStatus`, `dscFaturaStatus`, `fAtivo`) VALUES
(1, 'ABERTA', b'1'),
(2, 'FECHADA', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `formapagamento`
--

CREATE TABLE `formapagamento` (
  `idFormaPagamento` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `idCartao` int(4) UNSIGNED DEFAULT NULL,
  `dscFormaPagamento` varchar(40) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `formapagamento`
--

INSERT INTO `formapagamento` (`idFormaPagamento`, `idUsuarioTitular`, `idCartao`, `dscFormaPagamento`, `fAtivo`) VALUES
(1, 1, 1, 'DÉBITO - CartÃ£o teste', b'1'),
(13, 0, NULL, 'DEPOSITO', b'1'),
(2, 1, NULL, 'DINHEIRO', b'1'),
(3, 1, NULL, 'PIX', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `gasto`
--

CREATE TABLE `gasto` (
  `idGasto` int(4) UNSIGNED NOT NULL,
  `idTipoGasto` int(4) UNSIGNED NOT NULL,
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `nmGasto` varchar(25) DEFAULT NULL,
  `dscGasto` varchar(65) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL,
  `VezesPagamento` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jurosperiodicidade`
--

CREATE TABLE `jurosperiodicidade` (
  `idJurosPeriodicidade` int(4) UNSIGNED NOT NULL,
  `nmJurosPeriodicidade` varchar(3) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `jurosperiodicidade`
--

INSERT INTO `jurosperiodicidade` (`idJurosPeriodicidade`, `nmJurosPeriodicidade`, `fAtivo`) VALUES
(1, 'ANU', b'1'),
(2, 'SEM', b'1'),
(3, 'TRI', b'1'),
(4, 'BIM', b'1'),
(5, 'MEN', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `idMovimentacao` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `idTipoGasto` int(4) UNSIGNED DEFAULT NULL,
  `idTipoObrigacao` int(4) UNSIGNED DEFAULT NULL,
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `idConta` int(4) UNSIGNED NOT NULL,
  `idAtivo` int(4) UNSIGNED DEFAULT NULL,
  `idPlanejamento` int(4) UNSIGNED DEFAULT NULL,
  `idReceita` int(4) UNSIGNED DEFAULT NULL,
  `idEmprestimo` int(4) UNSIGNED DEFAULT NULL,
  `idObjetivo` int(4) UNSIGNED DEFAULT NULL,
  `idFormaPagamento` int(4) UNSIGNED NOT NULL,
  `idDespesaFixa` int(4) UNSIGNED DEFAULT NULL,
  `idCaraterMovimentacao` int(4) UNSIGNED NOT NULL,
  `vlrMovimentacao` decimal(10,2) DEFAULT NULL,
  `dthRegistro` datetime DEFAULT NULL,
  `dthMovimentacao` datetime DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`idMovimentacao`, `idUsuarioTitular`, `idTipoGasto`, `idTipoObrigacao`, `idPessoa`, `idConta`, `idAtivo`, `idPlanejamento`, `idReceita`, `idEmprestimo`, `idObjetivo`, `idFormaPagamento`, `idDespesaFixa`, `idCaraterMovimentacao`, `vlrMovimentacao`, `dthRegistro`, `dthMovimentacao`, `fAtivo`) VALUES
(1, 1, NULL, 1, 1, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, 2, '150.00', '2024-11-12 15:07:50', '0000-00-00 00:00:00', b'1'),
(5, 1, NULL, 4, 1, 1, NULL, 1, NULL, NULL, NULL, 3, NULL, 1, '50.00', '2024-11-12 16:47:11', '2024-11-12 00:00:00', b'0'),
(3, 1, NULL, 4, 1, 1, NULL, 1, NULL, NULL, NULL, 3, NULL, 1, '1500.00', '2024-11-12 16:14:48', '2024-11-05 00:00:00', b'1'),
(4, 1, NULL, 1, 5, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, 2, '1500000.00', '2024-11-12 16:15:13', '0000-00-00 00:00:00', b'1'),
(6, 1, NULL, 4, 1, 1, NULL, 1, NULL, NULL, NULL, 2, NULL, 1, '150.00', '2024-11-14 07:05:58', '2024-11-26 00:00:00', b'0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nivelrelacionamento`
--

CREATE TABLE `nivelrelacionamento` (
  `idNivelRelacionamento` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED DEFAULT NULL,
  `dscRelacionamento` varchar(20) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `nivelrelacionamento`
--

INSERT INTO `nivelrelacionamento` (`idNivelRelacionamento`, `idUsuarioTitular`, `dscRelacionamento`, `fAtivo`) VALUES
(1, NULL, 'PAI', b'1'),
(2, NULL, 'MAE', b'1'),
(3, NULL, 'IRMAO', b'1'),
(4, NULL, 'IRMA', b'1'),
(5, NULL, 'FILHO', b'1'),
(6, NULL, 'FILHA', b'1'),
(7, NULL, 'MARIDO', b'1'),
(8, NULL, 'ESPOSA', b'1'),
(9, NULL, 'SOBRINHO', b'1'),
(10, NULL, 'SOBRINHA', b'1'),
(11, NULL, 'PRIMO', b'1'),
(12, NULL, 'PRIMA', b'1'),
(13, NULL, 'TIA', b'1'),
(14, NULL, 'TIO', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `objetivo`
--

CREATE TABLE `objetivo` (
  `idObjetivo` int(4) UNSIGNED NOT NULL,
  `idTipoObjetivo` int(4) UNSIGNED DEFAULT NULL,
  `idObjetivoStatus` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `nmObjetivo` varchar(25) DEFAULT NULL,
  `dscObjetivo` varchar(65) DEFAULT NULL,
  `vlrObjetivo` float DEFAULT NULL,
  `dthPrevisao` date DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `objetivo`
--

INSERT INTO `objetivo` (`idObjetivo`, `idTipoObjetivo`, `idObjetivoStatus`, `idUsuarioTitular`, `nmObjetivo`, `dscObjetivo`, `vlrObjetivo`, `dthPrevisao`, `fAtivo`) VALUES
(1, NULL, 6, 1, 'Carro Novo', 'Uno c/ Escada', 25000, '2024-12-31', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `objetivostatus`
--

CREATE TABLE `objetivostatus` (
  `idObjetivoStatus` int(4) UNSIGNED NOT NULL,
  `dscObjetivoStatus` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `objetivostatus`
--

INSERT INTO `objetivostatus` (`idObjetivoStatus`, `dscObjetivoStatus`) VALUES
(1, 'CONQUISTADO'),
(2, 'ADIADO'),
(3, 'ATRASADO'),
(4, 'CANCELADO'),
(5, 'ATUALIZADA'),
(6, 'EM ANDAMENTO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `objetivoxpessoa`
--

CREATE TABLE `objetivoxpessoa` (
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `idObjetivo` int(4) UNSIGNED NOT NULL,
  `idObjetivoXPessoa` int(4) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `obrigacao`
--

CREATE TABLE `obrigacao` (
  `idObrigacao` int(4) UNSIGNED NOT NULL,
  `idTipoObrigacao` int(4) UNSIGNED NOT NULL,
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `nmObrigacao` varchar(25) DEFAULT NULL,
  `dscObrigacao` varchar(65) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL,
  `VezesPagamento` int(12) UNSIGNED DEFAULT NULL,
  `dthObrigacao` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `idTipoAcesso` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `idNivelRelacionamento` int(4) UNSIGNED DEFAULT NULL,
  `nmPessoa` varchar(30) DEFAULT NULL,
  `dthNasc` date DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `dthRegistro` datetime DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `LoginAcesso` varchar(15) DEFAULT NULL,
  `Senha` varchar(50) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `idTipoAcesso`, `idUsuarioTitular`, `idNivelRelacionamento`, `nmPessoa`, `dthNasc`, `CPF`, `dthRegistro`, `Email`, `LoginAcesso`, `Senha`, `fAtivo`) VALUES
(1, 1, 1, NULL, 'Dom Pedro Segundo', NULL, NULL, '2024-11-12 08:09:43', 'email@email.com', 'email@email.com', 'MTIz', b'1'),
(5, 2, 1, 1, 'Dom Pedro Primeiro', NULL, '10987654321', NULL, NULL, 'pedro', 'MTIz', b'1'),
(4, 2, 1, 6, 'Princesa Isabel', NULL, '12345678901', NULL, NULL, 'isabel', 'MTIz', b'1'),
(6, 2, 1, 2, 'Maria Leopoldina da Ãustria', NULL, '1123581321', NULL, NULL, 'maria', 'MTIz', b'1'),
(7, 1, 3, NULL, 'teste', NULL, NULL, '2024-11-12 15:57:46', 'a@a.com', 'a@a.com', 'MTIz', b'1'),
(8, 1, 4, NULL, 'teste', NULL, NULL, '2024-11-12 16:36:47', 'teste@gmail.com', 'teste@gmail.com', 'MTIz', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planejamento`
--

CREATE TABLE `planejamento` (
  `idPlanejamento` int(4) UNSIGNED NOT NULL,
  `idTipoPlanejamento` int(4) UNSIGNED DEFAULT NULL,
  `idPlanejamentoStatus` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `nmPlanejamento` varchar(25) DEFAULT NULL,
  `dscPlanejamento` varchar(65) DEFAULT NULL,
  `vlrPlanejamento` float DEFAULT NULL,
  `dthRegistro` datetime DEFAULT NULL,
  `mesPlanejamento` int(2) UNSIGNED DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `planejamento`
--

INSERT INTO `planejamento` (`idPlanejamento`, `idTipoPlanejamento`, `idPlanejamentoStatus`, `idUsuarioTitular`, `nmPlanejamento`, `dscPlanejamento`, `vlrPlanejamento`, `dthRegistro`, `mesPlanejamento`, `fAtivo`) VALUES
(1, NULL, 1, 1, 'OrÃ§amento do MÃªs', 'Reduzir gastos', 500, NULL, 11, b'1'),
(2, NULL, 1, 1, 'teste', 'teste', 500, NULL, 12, b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planejamentostatus`
--

CREATE TABLE `planejamentostatus` (
  `idPlanejamentoStatus` int(4) UNSIGNED NOT NULL,
  `dscPlanejamentoStatus` varchar(24) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `planejamentostatus`
--

INSERT INTO `planejamentostatus` (`idPlanejamentoStatus`, `dscPlanejamentoStatus`) VALUES
(1, 'DENTRO DO ORÇAMENTO'),
(2, 'FORA DO ORÇAMENTO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planejamentoxpessoa`
--

CREATE TABLE `planejamentoxpessoa` (
  `idPlanejamentoXPessoa` int(4) UNSIGNED NOT NULL,
  `idPlanejamento` int(4) UNSIGNED NOT NULL,
  `idPessoa` int(4) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `receita`
--

CREATE TABLE `receita` (
  `idReceita` int(4) UNSIGNED NOT NULL,
  `idPessoa` int(4) UNSIGNED NOT NULL,
  `nmReceita` varchar(25) DEFAULT NULL,
  `dscReceita` varchar(65) DEFAULT NULL,
  `vlrReceita` float DEFAULT NULL,
  `dthReceita` date DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `receita`
--

INSERT INTO `receita` (`idReceita`, `idPessoa`, `nmReceita`, `dscReceita`, `vlrReceita`, `dthReceita`, `fAtivo`) VALUES
(1, 1, 'SalÃ¡rio', 'Fonte de Renda Principal', 2000, '0000-00-00', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `rendimentoperiodicidade`
--

CREATE TABLE `rendimentoperiodicidade` (
  `idRendimentoPeriodicidade` int(4) UNSIGNED NOT NULL,
  `dscRendimentoPeriodicidade` varchar(10) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoacesso`
--

CREATE TABLE `tipoacesso` (
  `idTipoAcesso` int(4) UNSIGNED NOT NULL,
  `nmTipoAcesso` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tipoacesso`
--

INSERT INTO `tipoacesso` (`idTipoAcesso`, `nmTipoAcesso`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoativo`
--

CREATE TABLE `tipoativo` (
  `idTipoAtivo` int(4) UNSIGNED NOT NULL,
  `idRendimentoPeriodicidade` int(4) UNSIGNED DEFAULT NULL,
  `nmTipoAtivo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tipoativo`
--

INSERT INTO `tipoativo` (`idTipoAtivo`, `idRendimentoPeriodicidade`, `nmTipoAtivo`) VALUES
(1, NULL, 'AÇÕES'),
(2, NULL, 'FUNDOS DE INVESTIMENTO IMOBILIÁRIOS (FII)'),
(3, NULL, 'EXCHANGE TRADED FUNDS (ETF)'),
(4, NULL, 'TÍTULOS DE RENDA FIXA'),
(5, NULL, 'MOEDAS ESTRANGEIRAS'),
(6, NULL, 'SEGUROS'),
(7, NULL, 'OURO'),
(8, NULL, 'CRIPTOMOEDAS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipocartao`
--

CREATE TABLE `tipocartao` (
  `idTipoCartao` int(4) UNSIGNED NOT NULL,
  `dscTipoCartao` varchar(15) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tipocartao`
--

INSERT INTO `tipocartao` (`idTipoCartao`, `dscTipoCartao`, `fAtivo`) VALUES
(1, 'DÉBITO', b'1'),
(2, 'CRÉDITO', b'1'),
(3, 'REFEIÇÃO', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoconta`
--

CREATE TABLE `tipoconta` (
  `idTipoConta` int(4) UNSIGNED NOT NULL,
  `dscTipoConta` varchar(30) NOT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tipoconta`
--

INSERT INTO `tipoconta` (`idTipoConta`, `dscTipoConta`, `fAtivo`) VALUES
(1, 'CONTA CORRENTE', b'1'),
(2, 'CONTA POUPANÇA', b'1'),
(3, 'CONTA SALÁRIO', b'1'),
(4, 'CONTA CONJUNTA', b'1'),
(5, 'CONTA DE INVESTIMENTO', b'1'),
(6, 'CONTA DIGITAL', b'1'),
(7, 'CONTA EMPRESARIAL', b'1'),
(8, 'CONTA INFANTIL', b'1'),
(9, 'CONTA UNIVERSITÁRIA', b'1'),
(10, 'CONTA DE DEPÓSITO A PRAZO', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipogasto`
--

CREATE TABLE `tipogasto` (
  `idTipoGasto` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `nmTipoGasto` varchar(15) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tipogasto`
--

INSERT INTO `tipogasto` (`idTipoGasto`, `idUsuarioTitular`, `nmTipoGasto`, `fAtivo`) VALUES
(1, 1, 'Lanche', b'1'),
(2, 1, 'Roupa', b'1'),
(3, 1, 'Doces', b'1'),
(4, 1, 'Bebida', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoobjetivo`
--

CREATE TABLE `tipoobjetivo` (
  `idTipoObjetivo` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `nmTipoOjetivo` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoobrigacao`
--

CREATE TABLE `tipoobrigacao` (
  `idTipoObrigacao` int(4) UNSIGNED NOT NULL,
  `idCaraterMovimentacao` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `nmTipoObrigacao` varchar(15) DEFAULT NULL,
  `fAtivo` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tipoobrigacao`
--

INSERT INTO `tipoobrigacao` (`idTipoObrigacao`, `idCaraterMovimentacao`, `idUsuarioTitular`, `nmTipoObrigacao`, `fAtivo`) VALUES
(1, 2, 1, 'HOSPITAL', b'1'),
(2, 2, 1, 'REMÃ‰DIOS', b'1'),
(3, 2, 1, 'MULTA DE CARRO', b'1'),
(4, 1, 1, 'FREELANCE', b'1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoplanejamento`
--

CREATE TABLE `tipoplanejamento` (
  `idTipoPlanejamento` int(4) UNSIGNED NOT NULL,
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `dscTipoPlanejamento` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuariotitular`
--

CREATE TABLE `usuariotitular` (
  `idUsuarioTitular` int(4) UNSIGNED NOT NULL,
  `nmUsuario` varchar(30) DEFAULT NULL,
  `dthRegistro` datetime DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `Senha` varchar(50) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuariotitular`
--

INSERT INTO `usuariotitular` (`idUsuarioTitular`, `nmUsuario`, `dthRegistro`, `CPF`, `Senha`, `Email`) VALUES
(1, 'Dom Pedro Segundo', '2024-11-12 08:09:43', '00000000000', 'MTIz', 'email@email.com'),
(3, 'teste', '2024-11-12 15:57:46', '1234567980', 'MTIz', 'a@a.com'),
(4, 'teste', '2024-11-12 16:36:47', '11111111111', 'MTIz', 'teste@gmail.com');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ativo`
--
ALTER TABLE `ativo`
  ADD PRIMARY KEY (`idAtivo`),
  ADD KEY `Ativo_FKIndex2` (`idPessoa`),
  ADD KEY `Ativo_FKIndex3` (`idUsuarioTitular`),
  ADD KEY `Ativo_FKIndex4` (`idAtivoStatus`),
  ADD KEY `Ativo_FKIndex5` (`idTipoAtivo`);

--
-- Índices de tabela `ativostatus`
--
ALTER TABLE `ativostatus`
  ADD PRIMARY KEY (`idAtivoStatus`);

--
-- Índices de tabela `caratermovimentacao`
--
ALTER TABLE `caratermovimentacao`
  ADD PRIMARY KEY (`idCaraterMovimentacao`);

--
-- Índices de tabela `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`idCartao`),
  ADD KEY `Cartao_FKIndex1` (`idConta`),
  ADD KEY `Cartao_FKIndex2` (`idUsuarioTitular`),
  ADD KEY `Cartao_FKIndex3` (`idCartaoStatus`),
  ADD KEY `Cartao_FKIndex4` (`idTipoCartao`);

--
-- Índices de tabela `cartaostatus`
--
ALTER TABLE `cartaostatus`
  ADD PRIMARY KEY (`idCartaoStatus`);

--
-- Índices de tabela `cartaoxpessoa`
--
ALTER TABLE `cartaoxpessoa`
  ADD PRIMARY KEY (`idPessoa`,`idCartao`,`idCartaoXPessoa`),
  ADD KEY `Pessoa_has_Cartao_FKIndex1` (`idPessoa`),
  ADD KEY `Pessoa_has_Cartao_FKIndex2` (`idCartao`);

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`idConta`),
  ADD KEY `Conta_FKIndex2` (`idTipoConta`),
  ADD KEY `Conta_FKIndex3` (`idUsuarioTitular`);

--
-- Índices de tabela `contaxpessoa`
--
ALTER TABLE `contaxpessoa`
  ADD PRIMARY KEY (`idContaXPessoa`,`idConta`,`idPessoa`),
  ADD KEY `Conta_has_Dependentes_FKIndex1` (`idConta`),
  ADD KEY `Conta_has_Dependentes_FKIndex2` (`idPessoa`);

--
-- Índices de tabela `despesafixa`
--
ALTER TABLE `despesafixa`
  ADD PRIMARY KEY (`idDespesaFixa`),
  ADD KEY `DespesaFixa_FKIndex2` (`idUsuarioTitular`);

--
-- Índices de tabela `despesafixaxpessoa`
--
ALTER TABLE `despesafixaxpessoa`
  ADD PRIMARY KEY (`idPessoa`,`idDespesaFixa`,`idDespesaFixaXPessoa`),
  ADD KEY `Pessoa_has_DespesaFixa_FKIndex1` (`idPessoa`),
  ADD KEY `Pessoa_has_DespesaFixa_FKIndex2` (`idDespesaFixa`);

--
-- Índices de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`idEmprestimo`),
  ADD KEY `Emprestimo_FKIndex2` (`idJurosPeriodicidade`),
  ADD KEY `Emprestimo_FKIndex3` (`idPessoa`),
  ADD KEY `Emprestimo_FKIndex4` (`idEmprestimoSituacao`);

--
-- Índices de tabela `emprestimosituacao`
--
ALTER TABLE `emprestimosituacao`
  ADD PRIMARY KEY (`idEmprestimoSituacao`);

--
-- Índices de tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`idFatura`),
  ADD KEY `Faturas_FKIndex2` (`idCartao`),
  ADD KEY `Fatura_FKIndex2` (`idFaturaStatus`);

--
-- Índices de tabela `faturastatus`
--
ALTER TABLE `faturastatus`
  ADD PRIMARY KEY (`idFaturaStatus`);

--
-- Índices de tabela `formapagamento`
--
ALTER TABLE `formapagamento`
  ADD PRIMARY KEY (`idFormaPagamento`),
  ADD KEY `FormaPagamento_FKIndex1` (`idCartao`),
  ADD KEY `FormaPagamento_FKIndex2` (`idUsuarioTitular`);

--
-- Índices de tabela `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`idGasto`),
  ADD KEY `TipoGasto_FKIndex2` (`idPessoa`),
  ADD KEY `Gasto_FKIndex2` (`idTipoGasto`);

--
-- Índices de tabela `jurosperiodicidade`
--
ALTER TABLE `jurosperiodicidade`
  ADD PRIMARY KEY (`idJurosPeriodicidade`);

--
-- Índices de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`idMovimentacao`),
  ADD KEY `Movimentacoes_FKIndex1` (`idTipoObrigacao`),
  ADD KEY `Movimentacoes_FKIndex2` (`idAtivo`),
  ADD KEY `Movimentacoes_FKIndex3` (`idObjetivo`),
  ADD KEY `Movimentacoes_FKIndex4` (`idEmprestimo`),
  ADD KEY `Movimentacoes_FKIndex5` (`idReceita`),
  ADD KEY `Movimentacoes_FKIndex6` (`idPlanejamento`),
  ADD KEY `Movimentacoes_FKIndex7` (`idFormaPagamento`),
  ADD KEY `Movimentacoes_FKIndex8` (`idTipoGasto`),
  ADD KEY `Movimentacoes_FKIndex9` (`idDespesaFixa`),
  ADD KEY `Movimentacao_FKIndex10` (`idConta`),
  ADD KEY `Movimentacao_FKIndex11` (`idPessoa`),
  ADD KEY `Movimentacao_FKIndex12` (`idCaraterMovimentacao`),
  ADD KEY `Movimentacao_FKIndex13` (`idUsuarioTitular`);

--
-- Índices de tabela `nivelrelacionamento`
--
ALTER TABLE `nivelrelacionamento`
  ADD PRIMARY KEY (`idNivelRelacionamento`),
  ADD KEY `NivelRelacionamento_FKIndex1` (`idUsuarioTitular`);

--
-- Índices de tabela `objetivo`
--
ALTER TABLE `objetivo`
  ADD PRIMARY KEY (`idObjetivo`),
  ADD KEY `Objetivo_FKIndex2` (`idUsuarioTitular`),
  ADD KEY `Objetivo_FKIndex3` (`idObjetivoStatus`),
  ADD KEY `Objetivo_FKIndex4` (`idTipoObjetivo`);

--
-- Índices de tabela `objetivostatus`
--
ALTER TABLE `objetivostatus`
  ADD PRIMARY KEY (`idObjetivoStatus`);

--
-- Índices de tabela `objetivoxpessoa`
--
ALTER TABLE `objetivoxpessoa`
  ADD PRIMARY KEY (`idPessoa`,`idObjetivo`,`idObjetivoXPessoa`),
  ADD KEY `Pessoa_has_Objetivo_FKIndex1` (`idPessoa`),
  ADD KEY `Pessoa_has_Objetivo_FKIndex2` (`idObjetivo`);

--
-- Índices de tabela `obrigacao`
--
ALTER TABLE `obrigacao`
  ADD PRIMARY KEY (`idObrigacao`),
  ADD KEY `TipoObrigacao_FKIndex2` (`idPessoa`),
  ADD KEY `Obrigacao_FKIndex2` (`idTipoObrigacao`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `Dependentes_FKIndex1` (`idUsuarioTitular`),
  ADD KEY `Dependente_FKIndex2` (`idNivelRelacionamento`),
  ADD KEY `Pessoa_FKIndex3` (`idTipoAcesso`);

--
-- Índices de tabela `planejamento`
--
ALTER TABLE `planejamento`
  ADD PRIMARY KEY (`idPlanejamento`),
  ADD KEY `Planejamento_FKIndex2` (`idUsuarioTitular`),
  ADD KEY `Planejamento_FKIndex3` (`idPlanejamentoStatus`),
  ADD KEY `Planejamento_FKIndex4` (`idTipoPlanejamento`);

--
-- Índices de tabela `planejamentostatus`
--
ALTER TABLE `planejamentostatus`
  ADD PRIMARY KEY (`idPlanejamentoStatus`);

--
-- Índices de tabela `planejamentoxpessoa`
--
ALTER TABLE `planejamentoxpessoa`
  ADD PRIMARY KEY (`idPlanejamentoXPessoa`,`idPlanejamento`,`idPessoa`),
  ADD KEY `Planejamentos_has_Dependentes_FKIndex2` (`idPessoa`),
  ADD KEY `PlanejamentosXDependentes_FKIndex2` (`idPlanejamento`);

--
-- Índices de tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`idReceita`),
  ADD KEY `Receita_FKIndex2` (`idPessoa`);

--
-- Índices de tabela `rendimentoperiodicidade`
--
ALTER TABLE `rendimentoperiodicidade`
  ADD PRIMARY KEY (`idRendimentoPeriodicidade`);

--
-- Índices de tabela `tipoacesso`
--
ALTER TABLE `tipoacesso`
  ADD PRIMARY KEY (`idTipoAcesso`);

--
-- Índices de tabela `tipoativo`
--
ALTER TABLE `tipoativo`
  ADD PRIMARY KEY (`idTipoAtivo`),
  ADD KEY `TipoAtivo_FKIndex1` (`idRendimentoPeriodicidade`);

--
-- Índices de tabela `tipocartao`
--
ALTER TABLE `tipocartao`
  ADD PRIMARY KEY (`idTipoCartao`);

--
-- Índices de tabela `tipoconta`
--
ALTER TABLE `tipoconta`
  ADD PRIMARY KEY (`idTipoConta`);

--
-- Índices de tabela `tipogasto`
--
ALTER TABLE `tipogasto`
  ADD PRIMARY KEY (`idTipoGasto`),
  ADD KEY `TipoGasto_FKIndex1` (`idUsuarioTitular`);

--
-- Índices de tabela `tipoobjetivo`
--
ALTER TABLE `tipoobjetivo`
  ADD PRIMARY KEY (`idTipoObjetivo`),
  ADD KEY `TipoObjetivo_FKIndex1` (`idUsuarioTitular`);

--
-- Índices de tabela `tipoobrigacao`
--
ALTER TABLE `tipoobrigacao`
  ADD PRIMARY KEY (`idTipoObrigacao`),
  ADD KEY `TipoObrigacao_FKIndex1` (`idUsuarioTitular`),
  ADD KEY `TipoObrigacao_FKIndex2` (`idCaraterMovimentacao`);

--
-- Índices de tabela `tipoplanejamento`
--
ALTER TABLE `tipoplanejamento`
  ADD PRIMARY KEY (`idTipoPlanejamento`),
  ADD KEY `TipoPlanejamento_FKIndex1` (`idUsuarioTitular`);

--
-- Índices de tabela `usuariotitular`
--
ALTER TABLE `usuariotitular`
  ADD PRIMARY KEY (`idUsuarioTitular`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ativo`
--
ALTER TABLE `ativo`
  MODIFY `idAtivo` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ativostatus`
--
ALTER TABLE `ativostatus`
  MODIFY `idAtivoStatus` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `caratermovimentacao`
--
ALTER TABLE `caratermovimentacao`
  MODIFY `idCaraterMovimentacao` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cartao`
--
ALTER TABLE `cartao`
  MODIFY `idCartao` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cartaostatus`
--
ALTER TABLE `cartaostatus`
  MODIFY `idCartaoStatus` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `idConta` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `despesafixa`
--
ALTER TABLE `despesafixa`
  MODIFY `idDespesaFixa` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `idEmprestimo` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `emprestimosituacao`
--
ALTER TABLE `emprestimosituacao`
  MODIFY `idEmprestimoSituacao` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `idFatura` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `faturastatus`
--
ALTER TABLE `faturastatus`
  MODIFY `idFaturaStatus` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `formapagamento`
--
ALTER TABLE `formapagamento`
  MODIFY `idFormaPagamento` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `gasto`
--
ALTER TABLE `gasto`
  MODIFY `idGasto` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jurosperiodicidade`
--
ALTER TABLE `jurosperiodicidade`
  MODIFY `idJurosPeriodicidade` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `idMovimentacao` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `nivelrelacionamento`
--
ALTER TABLE `nivelrelacionamento`
  MODIFY `idNivelRelacionamento` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `objetivo`
--
ALTER TABLE `objetivo`
  MODIFY `idObjetivo` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `objetivostatus`
--
ALTER TABLE `objetivostatus`
  MODIFY `idObjetivoStatus` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `obrigacao`
--
ALTER TABLE `obrigacao`
  MODIFY `idObrigacao` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `planejamento`
--
ALTER TABLE `planejamento`
  MODIFY `idPlanejamento` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `planejamentostatus`
--
ALTER TABLE `planejamentostatus`
  MODIFY `idPlanejamentoStatus` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `idReceita` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `rendimentoperiodicidade`
--
ALTER TABLE `rendimentoperiodicidade`
  MODIFY `idRendimentoPeriodicidade` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipoacesso`
--
ALTER TABLE `tipoacesso`
  MODIFY `idTipoAcesso` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipoativo`
--
ALTER TABLE `tipoativo`
  MODIFY `idTipoAtivo` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tipocartao`
--
ALTER TABLE `tipocartao`
  MODIFY `idTipoCartao` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipoconta`
--
ALTER TABLE `tipoconta`
  MODIFY `idTipoConta` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tipogasto`
--
ALTER TABLE `tipogasto`
  MODIFY `idTipoGasto` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipoobjetivo`
--
ALTER TABLE `tipoobjetivo`
  MODIFY `idTipoObjetivo` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipoobrigacao`
--
ALTER TABLE `tipoobrigacao`
  MODIFY `idTipoObrigacao` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipoplanejamento`
--
ALTER TABLE `tipoplanejamento`
  MODIFY `idTipoPlanejamento` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuariotitular`
--
ALTER TABLE `usuariotitular`
  MODIFY `idUsuarioTitular` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
