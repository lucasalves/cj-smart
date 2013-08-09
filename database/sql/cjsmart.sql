-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 04-Ago-2013 às 20:51
-- Versão do servidor: 5.6.12
-- versão do PHP: 5.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de Dados: `cjsmart`
--
CREATE DATABASE IF NOT EXISTS `cjsmart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cjsmart`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `cep` varchar(80) DEFAULT NULL,
  `responsavel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` text,
  `duracao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_materia`
--

DROP TABLE IF EXISTS `curso_materia`;
CREATE TABLE IF NOT EXISTS `curso_materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materia_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `educador`
--

DROP TABLE IF EXISTS `educador`;
CREATE TABLE IF NOT EXISTS `educador` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(500) DEFAULT NULL,
  `curriculo` text NOT NULL,
  `rg` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `educador_materia`
--

DROP TABLE IF EXISTS `educador_materia`;
CREATE TABLE IF NOT EXISTS `educador_materia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `educador_id` int(10) NOT NULL,
  `materia_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(200) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_permissoes`
--

DROP TABLE IF EXISTS `grupo_permissoes`;
CREATE TABLE IF NOT EXISTS `grupo_permissoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pagina` varchar(45) NOT NULL,
  `visualizar` tinyint(1) NOT NULL DEFAULT '1',
  `editar` tinyint(1) NOT NULL DEFAULT '1',
  `apagar` tinyint(1) NOT NULL DEFAULT '1',
  `usuario_grupos_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Extraindo dados da tabela `grupo_permissoes`
--

INSERT INTO `grupo_permissoes` (`id`, `pagina`, `visualizar`, `editar`, `apagar`, `usuario_grupos_id`) VALUES
(1, 'aluno', 1, 1, 1, 1),
(2, 'curso', 1, 1, 1, 1),
(3, 'educador', 1, 1, 1, 1),
(4, 'home', 1, 1, 1, 1),
(5, 'materia', 1, 1, 1, 1),
(19, 'responsavel', 1, 1, 1, 1),
(20, 'turma', 1, 1, 1, 1),
(21, 'usuarios', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45)  NOT NULL,
  `codigo` varchar(45)  NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
);

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`id`, `nome`, `codigo`) VALUES
(1, 'Cabelo', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

DROP TABLE IF EXISTS `responsavel`;
CREATE TABLE IF NOT EXISTS `responsavel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `endereco_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `periodo` enum('Manha','Tarde','Noite') NOT NULL,
  `data_criacao` date DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `ultimo_nome` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `grupo_usuario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nome`, `ultimo_nome`, `usuario`, `senha`, `ativo`, `grupo_usuario_id`) VALUES
(2, 'admin@hotmail.com', 'Admin', 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_grupo`
--

DROP TABLE IF EXISTS `usuario_grupo`;
CREATE TABLE IF NOT EXISTS `usuario_grupo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
--
-- Extraindo dados da tabela `usuario_grupo`
--

INSERT INTO `usuario_grupo` (`id`, `nome`) VALUES
(1, 'master');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

DROP TABLE IF EXISTS `aula`;
CREATE TABLE IF NOT EXISTS `aula` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `local` varchar(200) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

DROP TABLE IF EXISTS `matricula`;
CREATE TABLE IF NOT EXISTS `matricula` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(200) NOT NULL,
  `data` date DEFAULT NULL,
  `aluno_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);



-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_matricula`
--

DROP TABLE IF EXISTS `turma_matricula`;
CREATE TABLE IF NOT EXISTS `turma_matricula` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `turma_id` int(11) NOT NULL,
  `matricula_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
