-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Out-2018 às 17:14
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odontosystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id_aulas` int(11) NOT NULL,
  `aula` binary(100) NOT NULL,
  `id_treinamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `salario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`, `salario`) VALUES
(1, 'Gerente', 1000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `ativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `cpf`, `endereco`, `id_cargo`, `sexo`, `senha`, `ativo`) VALUES
(3, 'leo', '1545454545', 'mumbaba', 1, 'masculino', '123', 1),
(4, 'jerry', '15453', 'sb', 1, 'indefinido', '123', 1),
(5, 'george', '20202202', 'sobral', 1, 'Feminino', '123', 1),
(6, 'fulano de tal', '666156646515666', 'putaquepariu', 1, 'Masculino', '123', 1),
(9, 'jaiane', '666156646515666', 'mumbaba', 1, 'Feminino', '123', 1),
(10, 'maria', '55615556', 'acre', 1, 'Feminino', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_grupo`
--

CREATE TABLE `funcionario_grupo` (
  `id_funcionario_Grupo` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario_grupo`
--

INSERT INTO `funcionario_grupo` (`id_funcionario_Grupo`, `id_funcionario`, `id_grupo`) VALUES
(20, 3, 1),
(21, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `ativo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `descricao`, `ativo`) VALUES
(1, 'Projetos', 1),
(2, 'Suporte', 1),
(3, 'Implantacao', 1),
(4, 'Financeiro', 1),
(5, 'Odontologos', 1),
(6, 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id_mensagem` int(11) NOT NULL,
  `mensagem` varchar(45) NOT NULL,
  `data` date DEFAULT NULL,
  `id_funcionario_remetente` int(11) NOT NULL,
  `id_funcionario_destinatario` int(11) NOT NULL,
  `excluido` int(11) DEFAULT NULL,
  `assunto` varchar(45) NOT NULL,
  `visualizado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id_mensagem`, `mensagem`, `data`, `id_funcionario_remetente`, `id_funcionario_destinatario`, `excluido`, `assunto`, `visualizado`) VALUES
(1, 'Va fazer o cafe va', '2018-10-02', 3, 4, 0, 'bom dia', 0),
(2, 'como ce ta?', '2018-10-01', 4, 3, 0, 'eai', 0),
(3, 'vai trabalhar', '2018-10-01', 3, 3, 0, 'work', 0),
(4, 'msg excluida', '2018-10-01', 3, 4, 1, 'excluida', 1),
(5, 'teste das msgs excluidas', '2018-10-02', 4, 3, 1, 'teste', 0),
(6, 'vai ter prova sim', '2018-10-17', 3, 4, 0, 'prova', 0),
(7, 'essa aqui Ã© a mensagem loketa de teste\r\n', '2018-10-17', 3, 3, 0, 'teste de novo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `id_permissao` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova`
--

CREATE TABLE `prova` (
  `id_prova` int(11) NOT NULL,
  `id_treinamento` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `id_questao` int(11) NOT NULL,
  `pergunta` varchar(45) NOT NULL,
  `alternativa1` varchar(45) DEFAULT NULL,
  `alternativa2` varchar(45) DEFAULT NULL,
  `alternativa3` varchar(45) DEFAULT NULL,
  `alternativa4` varchar(45) DEFAULT NULL,
  `resposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id_tarefa` int(11) NOT NULL,
  `descricao` varchar(256) NOT NULL,
  `data_inicio` varchar(15) NOT NULL,
  `data_fim` varchar(15) NOT NULL,
  `id_funcionario_remetente` int(11) NOT NULL,
  `id_funcionario_destinatario` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `excluido` varchar(5) DEFAULT NULL,
  `assunto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`id_tarefa`, `descricao`, `data_inicio`, `data_fim`, `id_funcionario_remetente`, `id_funcionario_destinatario`, `status`, `excluido`, `assunto`) VALUES
(1, 'fazer os relatorios', '01/01/2001', '02/02/2002', 3, 4, 'a fazer', '0', 'relatorios'),
(2, 'limpar os banheiros', '02/02/2002', '03/03/2003', 4, 3, 'fazendo', '0', 'limpeza'),
(3, 'tarefa de teste', '10/12/2008', '09/03/2009', 4, 3, 'a fazer', '0', 'teste'),
(4, 'quero que vc faca tudo pra mim', '01/01/2001', '02/02/2008', 3, 4, 'fazendo', '0', 'teste'),
(5, 'segue em anexo ', '2018-10-18 23:3', '2018-10-02', 4, 4, 'A fazer', '0', 'fulano faz aquilo'),
(6, 'tira uma copia da tua chave', '2018-10-18 23:3', '2018-10-04', 3, 3, 'A fazer', '0', 'Ola, miga'),
(7, 'vai ter prova do lider ', '2018-10-18 23:4', '2018-09-25', 3, 3, 'A fazer', '0', 'prova'),
(8, 'taqui tua passagem', '2018-10-18 23:4', '2005-05-01', 3, 9, 'A fazer', '0', 'viajem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamento`
--

CREATE TABLE `treinamento` (
  `id_treinamento` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `id_responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `treinamento`
--

INSERT INTO `treinamento` (`id_treinamento`, `descricao`, `id_responsavel`) VALUES
(1, 'Vendas', 3),
(2, 'Caixa', 4),
(3, 'Arrancar um dente', 4),
(4, 'Arranacar 2 dente', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamento_funcionario`
--

CREATE TABLE `treinamento_funcionario` (
  `id_treinamento_funcionario` int(11) NOT NULL,
  `id_treinamento` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `treinamento_funcionario`
--

INSERT INTO `treinamento_funcionario` (`id_treinamento_funcionario`, `id_treinamento`, `id_funcionario`) VALUES
(7, 1, 6),
(8, 2, 6),
(9, 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aulas`),
  ADD KEY `fk_Aulas_Treinamento1_idx` (`id_treinamento`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_Funcionario_Cargo_idx` (`id_cargo`);

--
-- Indexes for table `funcionario_grupo`
--
ALTER TABLE `funcionario_grupo`
  ADD PRIMARY KEY (`id_funcionario_Grupo`),
  ADD KEY `fk_Funcionario_Grupo_Funcionario1_idx` (`id_funcionario`),
  ADD KEY `fk_Funcionario_Grupo_Grupo1_idx` (`id_grupo`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_mensagem`),
  ADD KEY `fk_Mensagem_Funcionario1_idx` (`id_funcionario_remetente`),
  ADD KEY `fk_Mensagem_Funcionario2_idx` (`id_funcionario_destinatario`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`,`id_cargo`,`id_permissao`),
  ADD KEY `fk_Perfil_Cargo1_idx` (`id_cargo`),
  ADD KEY `fk_Perfil_Permissao1_idx` (`id_permissao`);

--
-- Indexes for table `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Indexes for table `prova`
--
ALTER TABLE `prova`
  ADD PRIMARY KEY (`id_prova`),
  ADD KEY `fk_Prova_Treinamento1_idx` (`id_treinamento`),
  ADD KEY `fk_Prova_Questao1_idx` (`id_questao`);

--
-- Indexes for table `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`id_questao`);

--
-- Indexes for table `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id_tarefa`),
  ADD KEY `fk_Tarefa_Funcionario1_idx` (`id_funcionario_remetente`),
  ADD KEY `fk_Tarefa_Funcionario2_idx` (`id_funcionario_destinatario`);

--
-- Indexes for table `treinamento`
--
ALTER TABLE `treinamento`
  ADD PRIMARY KEY (`id_treinamento`);

--
-- Indexes for table `treinamento_funcionario`
--
ALTER TABLE `treinamento_funcionario`
  ADD PRIMARY KEY (`id_treinamento_funcionario`),
  ADD KEY `fk_Treinamento_Funcionario_Treinamento1_idx` (`id_treinamento`),
  ADD KEY `fk_Treinamento_Funcionario_Funcionario1_idx` (`id_funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `funcionario_grupo`
--
ALTER TABLE `funcionario_grupo`
  MODIFY `id_funcionario_Grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `prova`
--
ALTER TABLE `prova`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questao`
--
ALTER TABLE `questao`
  MODIFY `id_questao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `treinamento`
--
ALTER TABLE `treinamento`
  MODIFY `id_treinamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `treinamento_funcionario`
--
ALTER TABLE `treinamento_funcionario`
  MODIFY `id_treinamento_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_Aulas_Treinamento1` FOREIGN KEY (`id_treinamento`) REFERENCES `treinamento` (`id_treinamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_Funcionario_Cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario_grupo`
--
ALTER TABLE `funcionario_grupo`
  ADD CONSTRAINT `fk_Funcionario_Grupo_Funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Funcionario_Grupo_Grupo1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fk_Mensagem_Funcionario1` FOREIGN KEY (`id_funcionario_remetente`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mensagem_Funcionario2` FOREIGN KEY (`id_funcionario_destinatario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `fk_Perfil_Cargo1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Perfil_Permissao1` FOREIGN KEY (`id_permissao`) REFERENCES `permissao` (`id_permissao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prova`
--
ALTER TABLE `prova`
  ADD CONSTRAINT `fk_Prova_Questao1` FOREIGN KEY (`id_questao`) REFERENCES `questao` (`id_questao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prova_Treinamento1` FOREIGN KEY (`id_treinamento`) REFERENCES `treinamento` (`id_treinamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fk_Tarefa_Funcionario1` FOREIGN KEY (`id_funcionario_remetente`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tarefa_Funcionario2` FOREIGN KEY (`id_funcionario_destinatario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `treinamento_funcionario`
--
ALTER TABLE `treinamento_funcionario`
  ADD CONSTRAINT `fk_Treinamento_Funcionario_Funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Treinamento_Funcionario_Treinamento1` FOREIGN KEY (`id_treinamento`) REFERENCES `treinamento` (`id_treinamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
