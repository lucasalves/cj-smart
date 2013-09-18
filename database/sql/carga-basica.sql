truncate table aluno;
truncate table aula;
truncate table aviso;
truncate table curso;
truncate table curso_materia;
truncate table educador;
truncate table materia;
truncate table matricula;
truncate table nota;
truncate table presenca;
truncate table turma;
truncate table aluno;
truncate table local;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `telefone`, `data_nascimento`, `responsavel`, `telefone_responsavel`, `email_responsavel`, `rg`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `email`) VALUES
(1, 'Bruno Leonardo', 1195447877, '2013-09-07', 'Maria das Merces', 32778610, 'maria@merces.com.br', '47.452.922-8', '01535000', 'Rua Paulo Orozimbo,', '379', 'AclimaÃ§Ã£o', 'SÃ£o Paulo', 'bruno@gmail.com');

--
-- Extraindo dados da tabela `aula`
--

INSERT INTO `aula` (`id`, `data`, `turma_id`, `materia_id`, `local_id`) VALUES
(1, '2013-08-01', 3, 45, 1),
(2, '2013-07-28', 3, 45, 1),
(3, '2013-07-30', 3, 45, 1),
(4, '2013-08-07', 3, 45, 1),
(5, '2013-08-09', 3, 45, 1),
(6, '2013-07-29', 4, 48, 1),
(10, '2013-09-01', 6, 48, 2),
(11, '2013-09-02', 8, 51, 5),
(12, '2013-09-04', 7, 48, 3),
(13, '2013-09-05', 7, 48, 5),
(15, '2013-09-01', 1, 1, 1),
(16, '2013-09-09', 1, 1, 1),
(17, '2013-09-10', 1, 1, 1),
(18, '2013-09-11', 1, 1, 1),
(19, '2013-09-12', 1, 1, 1),
(20, '2013-09-13', 1, 1, 1),
(21, '2013-09-16', 1, 1, 1),
(22, '2013-09-17', 1, 1, 1),
(23, '2013-09-18', 1, 1, 1),
(24, '2013-09-19', 1, 1, 1),
(25, '2013-09-20', 1, 1, 1),
(26, '2013-09-23', 1, 1, 1),
(27, '2013-09-24', 1, 1, 1),
(28, '2013-09-25', 1, 1, 1),
(29, '2013-09-26', 1, 1, 1),
(30, '2013-09-27', 1, 1, 1),
(31, '2013-09-03', 1, 1, 1),
(32, '2013-09-05', 1, 1, 1),
(33, '2013-09-06', 1, 1, 1),
(34, '2013-09-04', 1, 1, 1),
(35, '2013-09-04', 20, 1, 1);

--
-- Extraindo dados da tabela `aviso`
--

INSERT INTO `aviso` (`id`, `descricao`, `status`, `data_cadastro`, `data_envio`, `matricula_id`) VALUES
(1, 'Aluno Faltou mais de 1 vez no perÃ­odo de 5 dias', 'Enviado', '2013-09-07', '2013-09-07', 2),
(2, 'Aluno Faltou mais de 1 vez no perÃ­odo de 5 dias', 'Enviado', '2013-09-07', '2013-09-07', 2),
(3, 'Aluno Faltou mais de 1 vez no perÃ­odo de 5 dias', 'Aberto', '2013-09-07', NULL, 2);

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `descricao`, `duracao`) VALUES
(1, 'Assistente Administrativo', 'Este curso tem como objetivo formar profissionais para o desenvolvimento de atividades administrativas em escritÃ³rios\r\n', 6),
(2, 'Caixa Supermercado', 'Este curso tem como objetivo a capacitaÃ§Ã£o de profissionais para o exercÃ­cio de atividades como caixa de mercado\r\n', 6),
(3, 'Atendente de Loja', 'Este curso tem como objetivo formar profissionais capazes de realizar o atendimento ao cliente em lojas\r\n', 6),
(4, 'Office Boy', 'Este curso tem com objetivo a capacitaÃ§Ã£o de profissionais para o exercÃ­cio das atividades de Office Boy\r\n', 6);

--
-- Extraindo dados da tabela `curso_materia`
--

INSERT INTO `curso_materia` (`id`, `materia_id`, `curso_id`) VALUES
(9, 16, 2),
(10, 16, 3),
(11, 16, 4),
(12, 16, 5),
(13, 17, 2),
(14, 17, 3),
(15, 17, 4),
(16, 17, 5),
(21, 21, 47),
(22, 21, 48),
(23, 22, 47),
(24, 22, 48),
(25, 23, 50),
(26, 1, 1),
(27, 1, 2),
(28, 1, 3),
(29, 1, 4),
(30, 1, 5),
(31, 1, 6),
(32, 2, 3),
(33, 2, 4),
(34, 2, 5),
(35, 2, 6),
(36, 3, 3),
(37, 3, 4),
(38, 3, 5),
(39, 4, 1),
(40, 4, 2),
(41, 4, 3),
(42, 4, 6);

--
-- Extraindo dados da tabela `educador`
--

INSERT INTO `educador` (`id`, `nome`, `email`, `rg`, `telefone`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `materia_id`, `status`) VALUES
(1, 'kassion', 'k@meneglim.com.br', '47.452.922-8', '954478779', 'Rua Paulo Orozimbo', '379', 'AclimaÃ§Ã£o', 'SÃ£o Paulo', '01535000', 48, 'A'),
(2, 'Fabio Zorneli', 'fzorneli@gmail.com', '45.234.1230-', '999999999', '', '', '', '', '01535000', 47, 'A'),
(3, 'Carlos Eduardo', 'carlos@eduardo.com.br', '47.452.922-8', '21313131', 'Rua Paulo Orozimbo', '379', 'AclimaÃ§Ã£o', 'SÃ£o Paulo', '01535000', 51, 'A');

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`id`, `local`) VALUES
(1, 'Sala 01'),
(2, 'Sala 02'),
(3, 'Biblioteca'),
(4, 'Salão'),
(5, 'Sala 03');

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`id`, `nome`, `codigo`) VALUES
(1, 'MatemÃ¡tica', ''),
(2, 'PortuguÃªs', ''),
(3, 'InglÃªs', ''),
(4, 'InformÃ¡tica', ''),
(5, 'AdministraÃ§Ã£o', ''),
(6, 'Geografia', '');

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id`, `codigo`, `data`, `aluno_id`, `turma_id`) VALUES
(2, '2', '2013-09-07', 1, 1);

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`id`, `valor`, `tipo`, `data`, `materia_id`, `matricula_id`) VALUES
(1, 10, NULL, '2012-01-01', 15, 1),
(2, 5, NULL, '2012-02-01', 15, 1),
(3, 6, NULL, '2012-03-01', 15, 1),
(4, 3, NULL, '2012-04-01', 15, 1),
(5, 0, NULL, '2012-05-01', 15, 1),
(6, 0, NULL, '2012-06-01', 15, 1);

--
-- Extraindo dados da tabela `presenca`
--

INSERT INTO `presenca` (`id`, `status`, `aula_id`, `matricula_id`, `aviso_id`) VALUES
(11, 'Ausente', 16, 1, 7),
(12, 'Ausente', 17, 1, 7),
(13, 'Ausente', 18, 1, 8),
(14, 'Ausente', 19, 1, 8),
(15, 'Ausente', 16, 2, 1),
(16, 'Ausente', 17, 2, 1),
(17, 'Ausente', 17, 2, 1),
(18, 'Ausente', 18, 2, 1),
(19, 'Ausente', 19, 2, 1),
(20, 'Ausente', 20, 2, 2),
(21, 'Ausente', 22, 2, 2),
(22, 'Ausente', 23, 2, 3),
(23, 'Ausente', 24, 2, 3);

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`, `periodo`, `data_criacao`, `curso_id`, `data_encerramento`) VALUES
(1, 'ADMIN 1-2012', 'M', '2012-01-01', 1, NULL),
(6, 'ADMIN 2-2012', 'T', '2012-06-04', 1, NULL),
(7, 'ADMIN 1-2013', 'M', '2013-01-01', 1, NULL),
(8, 'ADMIN 2-2013', 'N', '2013-06-01', 1, NULL),
(9, 'CSUPER 1-2012', 'M', '2012-01-01', 2, NULL),
(10, 'CSUPER 2-2012', 'T', '2012-06-04', 2, NULL),
(11, 'CSUPER 1-2013', 'M', '2013-01-01', 2, NULL),
(12, 'CSUPER 2-2013', 'N', '2013-06-01', 2, NULL),
(13, 'ATLOJA 1-2012', 'M', '2012-01-01', 3, NULL),
(14, 'ATLOJA 2-2012', 'T', '2012-06-04', 3, NULL),
(15, 'ATLOJA 1-2013', 'M', '2013-01-01', 3, NULL),
(16, 'ATLOJA 2-2013', 'N', '2013-06-01', 3, NULL),
(17, 'OFBOY 1-2012', 'M', '2012-01-01', 4, NULL),
(18, 'OFBOY 1-2012', 'M', '2012-01-01', 4, NULL),
(19, 'OFBOY 2-2012', 'T', '2012-06-04', 4, NULL),
(20, 'OFBOY 1-2013', 'M', '2013-01-01', 4, NULL),
(21, 'OFBOY 2-2013', 'N', '2013-06-01', 4, NULL);
