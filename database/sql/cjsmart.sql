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
CREATE  TABLE IF NOT EXISTS `cjsmart`.`aluno` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(50) NULL DEFAULT NULL ,
  `telefone` INT(9) NULL ,
  `data_nascimento` DATE NULL ,
  `responsavel` VARCHAR(100) NULL DEFAULT NULL ,
  `telefone_responsavel` INT(9) NULL ,
  `email_responsavel` VARCHAR(45) NULL ,
  `rg` VARCHAR(20) NULL DEFAULT NULL ,
  `cep` VARCHAR(80) NULL DEFAULT NULL ,
  `logradouro` VARCHAR(100) NULL DEFAULT NULL ,
  `numero` VARCHAR(20) NULL ,
  `bairro` VARCHAR(45) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;
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
CREATE  TABLE IF NOT EXISTS `cjsmart`.`educador` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `rg` VARCHAR(12) NOT NULL ,
  `telefone` VARCHAR(45) NULL ,
  `endereco` VARCHAR(500) NULL DEFAULT NULL ,
  `numero` VARCHAR(20) NULL ,
  `bairro` VARCHAR(45) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `cep` VARCHAR(8) NULL ,
  `materia_id` INT(11) NOT NULL ,
  `status` VARCHAR(1) NULL DEFAULT 'A' COMMENT '\'A:Ativado - D: Desativado\'' ,
  PRIMARY KEY (`id`, `materia_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;
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
CREATE  TABLE IF NOT EXISTS `cjsmart`.`turma` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(200) NOT NULL ,
  `periodo` VARCHAR(1) NOT NULL COMMENT 'M:Manhã, T:Tarde, N:Noite' ,
  `data_criacao` DATE NULL DEFAULT NULL ,
  `data_encerramento` DATE NULL ,
  `curso_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `aviso`
--
DROP TABLE IF EXISTS `cjsmart`.`aviso`;
CREATE  TABLE IF NOT EXISTS `cjsmart`.`aviso` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(1000) NOT NULL ,
  `status` ENUM('Aberto','Enviado','Arquivado') NOT NULL ,
  `data_cadastro` DATE NULL ,
  `data_envio` DATE NULL ,
  `matricula_id` INT(10) NOT NULL ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

DROP TABLE IF EXISTS `aula`;
CREATE  TABLE IF NOT EXISTS `cjsmart`.`aula` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `data` DATE NULL DEFAULT NULL ,
  `turma_id` INT(11) NULL DEFAULT NULL ,
  `materia_id` INT(11) NULL DEFAULT NULL ,
  `local_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `local_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

DROP TABLE IF EXISTS `matricula`;
CREATE  TABLE IF NOT EXISTS `cjsmart`.`matricula` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(200) NOT NULL ,
  `data` DATE NULL DEFAULT NULL ,
  `aluno_id` INT(10) NOT NULL ,
  `turma_id` INT(10) NOT NULL ,
  PRIMARY KEY (`id`, `aluno_id`, `turma_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

DROP TABLE IF EXISTS `ocorrencia`;
CREATE  TABLE IF NOT EXISTS `cjsmart`.`ocorrencia` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` TEXT NOT NULL ,
  `gravidade` VARCHAR(1) NULL DEFAULT 'B' COMMENT 'A:Alta - B:Baixa' ,
  `aula_id` INT(10) NOT NULL ,
  `matricula_id` INT(10) NOT NULL ,
  PRIMARY KEY (`id`, `aula_id`, `matricula_id`))
ENGINE = InnoDB;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--


DROP TABLE IF EXISTS `nota`;
CREATE  TABLE IF NOT EXISTS `cjsmart`.`nota` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `valor` DOUBLE NOT NULL ,
  `tipo` VARCHAR(45) NULL ,
  `data` DATE NOT NULL ,
  `materia_id` INT(11) NOT NULL ,
  `matricula_id` INT(10) NOT NULL ,
  PRIMARY KEY (`id`, `data`, `materia_id`, `matricula_id`))
ENGINE = InnoDB;

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
--
DROP TABLE IF EXISTS `presenca`;
CREATE  TABLE IF NOT EXISTS `cjsmart`.`presenca` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `status` ENUM('Presente','Ausente','Abonado') NOT NULL ,
  `aula_id` INT(10) NOT NULL ,
  `matricula_id` INT(10) NOT NULL ,
  `aviso_id` INT NULL ,
  PRIMARY KEY (`id`, `aula_id`))
ENGINE = InnoDB;
-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--
DROP TABLE IF EXISTS `local`;
CREATE  TABLE IF NOT EXISTS `cjsmart`.`local` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `local` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

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
(21, 'usuarios', 1, 1, 1, 1),
(22, 'aula', 1, 1, 1, 1),
(23, 'matricula', 1, 1, 1, 1),
(24, 'diarioaula', 1, 1, 1, 1),
(25, 'presenca', 1, 1, 1, 1),
(26, 'FinalizarSemestre', 1, 1, 1, 1),
(40, 'aluno', 0, 0, 0, 18),
(41, 'curso', 1, 1, 1, 18),
(42, 'educador', 1, 1, 1, 18),
(43, 'home', 1, 1, 1, 18),
(44, 'materia', 1, 1, 1, 18),
(45, 'responsavel', 0, 0, 0, 18),
(46, 'turma', 1, 1, 1, 18),
(47, 'usuarios', 0, 0, 0, 18),
(48, 'aula', 1, 1, 1, 18),
(49, 'matricula', 0, 0, 0, 18),
(50, 'diarioaula', 0, 0, 0, 18),
(51, 'presenca', 0, 0, 0, 18),
(52, 'FinalizarSemestre', 0, 0, 0, 18),
(53, 'administrativo', 0, 0, 0, 18),
(54, 'coordenacao', 1, 1, 1, 18),
(55, 'academico', 0, 0, 0, 18),
(56, 'coordenacao', 1, 1, 1, 1),
(57, 'academico', 1, 1, 1, 1),
(58, 'administrativo', 1, 1, 1, 1),
(59, 'aluno', 1, 1, 1, 19),
(60, 'curso', 0, 0, 0, 19),
(61, 'educador', 0, 0, 0, 19),
(62, 'home', 0, 0, 0, 19),
(63, 'materia', 0, 0, 0, 19),
(64, 'responsavel', 0, 0, 0, 19),
(65, 'turma', 0, 0, 0, 19),
(66, 'usuarios', 0, 0, 0, 19),
(67, 'aula', 0, 0, 0, 19),
(68, 'matricula', 1, 1, 1, 19),
(69, 'diarioaula', 1, 1, 1, 19),
(70, 'presenca', 1, 1, 1, 19),
(71, 'FinalizarSemestre', 0, 0, 0, 19),
(72, 'coordenacao', 0, 0, 0, 19),
(73, 'academico', 0, 0, 0, 19),
(74, 'administrativo', 1, 1, 1, 19),
(75, 'aluno', 0, 0, 0, 20),
(76, 'curso', 0, 0, 0, 20),
(77, 'educador', 0, 0, 0, 20),
(78, 'home', 0, 0, 0, 20),
(79, 'materia', 0, 0, 0, 20),
(80, 'responsavel', 0, 0, 0, 20),
(81, 'turma', 0, 0, 0, 20),
(82, 'usuarios', 0, 0, 0, 20),
(83, 'aula', 0, 0, 0, 20),
(84, 'matricula', 0, 0, 0, 20),
(85, 'diarioaula', 0, 0, 0, 20),
(86, 'presenca', 0, 0, 0, 20),
(87, 'FinalizarSemestre', 1, 1, 1, 20),
(88, 'coordenacao', 0, 0, 0, 20),
(89, 'academico', 1, 1, 1, 20),
(90, 'administrativo', 0, 0, 0, 20),
(91, 'boletim', 0, 0, 0, 20),
(92, 'boletim', 1, 1, 1, 19),
(93, 'boletim', 0, 0, 0, 18),
(94, 'boletim', 0, 0, 0, 1),
(95, 'GrupoUsuario', 0, 0, 0, 20),
(96, 'GrupoUsuario', 0, 0, 0, 19),
(97, 'GrupoUsuario', 0, 0, 0, 18),
(98, 'GrupoUsuario', 1, 1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuarios`
-- 

INSERT INTO `usuarios` (`id`, `email`, `nome`, `ultimo_nome`, `usuario`, `senha`, `ativo`, `grupo_usuario_id`) VALUES
(2, 'admin@hotmail.com', 'Admin', 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 1, 1),
(3, 'coordenacao@cjsmart.com', 'Coordenação', '', 'coordenacao', '202cb962ac59075b964b07152d234b70', 1, 18),
(4, 'administrativo@cjsmart.com', 'Administrativo', '', 'administrativo', '202cb962ac59075b964b07152d234b70', 1, 19),
(5, 'academico@cjsmart.com', 'Acadêmico', '', 'academico', '202cb962ac59075b964b07152d234b70', 1, 20);


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_grupo`
--

DROP TABLE IF EXISTS `usuario_grupo`;
CREATE TABLE IF NOT EXISTS `usuario_grupo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `usuario_grupo`
--

INSERT INTO `usuario_grupo` (`id`, `nome`) VALUES
(1, 'master'),
(18, 'coordenacao'),
(19, 'administrativo'),
(20, 'academico');


DROP TABLE IF EXISTS `atividade`;
CREATE  TABLE IF NOT EXISTS `atividade` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `data` DATE NULL DEFAULT NULL ,
  `local_id` INT NOT NULL ,
  `materia_id` INT(11) NOT NULL,
  `turma_id` INT(10) NOT NULL ,
  `educador_id` INT(10) NOT NULL ,
  PRIMARY KEY (`id`)
);