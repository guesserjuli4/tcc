-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2025 às 12:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agendamentoonline`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `idagenda` int(11) NOT NULL,
  `nome_agenda` varchar(45) DEFAULT NULL,
  `diasemana` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `disciplina` varchar(45) DEFAULT NULL,
  `professor_responsavel` varchar(45) DEFAULT NULL,
  `paciente_agendado` varchar(45) DEFAULT NULL,
  `telefone_paciente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `RA` int(11) NOT NULL,
  `nome_aluno` varchar(45) NOT NULL,
  `gmail_aluno` varchar(45) DEFAULT NULL,
  `datanasc_aluno` varchar(45) DEFAULT NULL,
  `inicio_graduacao` varchar(45) DEFAULT NULL,
  `alunocel` varchar(45) DEFAULT NULL,
  `login_idlogin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaboradoradmin`
--

CREATE TABLE `colaboradoradmin` (
  `matricula` int(11) NOT NULL,
  `nome_colaborador` varchar(45) DEFAULT NULL,
  `gmail_colaborador` varchar(45) DEFAULT NULL,
  `datanasc_colaborador` varchar(45) DEFAULT NULL,
  `login_idlogin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `iddisciplina` int(11) NOT NULL,
  `disciplina` varchar(45) DEFAULT NULL,
  `professores` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `listaspera`
--

CREATE TABLE `listaspera` (
  `idlista` int(11) NOT NULL,
  `nomepaciente` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `servico` varchar(45) DEFAULT NULL,
  `colaboradoradmin_matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `cpf_paciente` int(11) NOT NULL,
  `nome_paciente` varchar(45) DEFAULT NULL,
  `telefone_paciente` varchar(45) DEFAULT NULL,
  `datanasc_paciente` varchar(45) DEFAULT NULL,
  `gmail_paciente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professoradmin`
--

CREATE TABLE `professoradmin` (
  `cpf_professor` int(11) NOT NULL,
  `nome_professor` varchar(45) NOT NULL,
  `telefone_professor` varchar(45) DEFAULT NULL,
  `datanasc_professor` varchar(45) DEFAULT NULL,
  `especialidade` varchar(45) DEFAULT NULL,
  `disciplinaservico` varchar(45) DEFAULT NULL,
  `gmail_professor` varchar(45) DEFAULT NULL,
  `login_idlogin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `idservicos` int(11) NOT NULL,
  `odontopedi` varchar(45) DEFAULT NULL,
  `endodontia` varchar(45) DEFAULT NULL,
  `periodontia` varchar(45) DEFAULT NULL,
  `avaliacao` varchar(45) DEFAULT NULL,
  `restauracao` varchar(45) DEFAULT NULL,
  `extracao` varchar(45) DEFAULT NULL,
  `proteseremovivel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idagenda`);

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`RA`),
  ADD KEY `login_idlogin` (`login_idlogin`);

--
-- Índices de tabela `colaboradoradmin`
--
ALTER TABLE `colaboradoradmin`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `login_idlogin` (`login_idlogin`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`iddisciplina`);

--
-- Índices de tabela `listaspera`
--
ALTER TABLE `listaspera`
  ADD PRIMARY KEY (`idlista`),
  ADD KEY `colaboradoradmin_matricula` (`colaboradoradmin_matricula`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cpf_paciente`);

--
-- Índices de tabela `professoradmin`
--
ALTER TABLE `professoradmin`
  ADD PRIMARY KEY (`cpf_professor`),
  ADD KEY `login_idlogin` (`login_idlogin`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idservicos`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `iddisciplina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`);

--
-- Restrições para tabelas `colaboradoradmin`
--
ALTER TABLE `colaboradoradmin`
  ADD CONSTRAINT `colaboradoradmin_ibfk_1` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`);

--
-- Restrições para tabelas `listaspera`
--
ALTER TABLE `listaspera`
  ADD CONSTRAINT `listaspera_ibfk_1` FOREIGN KEY (`colaboradoradmin_matricula`) REFERENCES `colaboradoradmin` (`matricula`);

--
-- Restrições para tabelas `professoradmin`
--
ALTER TABLE `professoradmin`
  ADD CONSTRAINT `professoradmin_ibfk_1` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
