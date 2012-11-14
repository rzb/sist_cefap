-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Nov 05, 2012 as 01:06 PM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Banco de Dados: `traj_cefap`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `agendamentos`
-- 

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `aprovado_por_id` int(11) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `periodo_inicial` varchar(45) default NULL,
  `periodo_final` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `unidade` varchar(45) default NULL,
  `valor_total` varchar(45) default NULL,
  `status_pagto` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `facility_id` (`facility_id`),
  KEY `projeto_id` (`projeto_id`),
  KEY `aprovado_por_id` (`aprovado_por_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `agendamentos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `ajudas`
-- 

CREATE TABLE `ajudas` (
  `id` int(11) NOT NULL,
  `created` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `conteudo` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `ajudas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `backups`
-- 

CREATE TABLE `backups` (
  `id` int(11) NOT NULL,
  `datetime` varchar(45) default NULL,
  `tamanho_total` varchar(45) default NULL,
  `tamanho_split` varchar(45) default NULL,
  `filenames` varchar(45) default NULL,
  `arquivos_presentes` varchar(45) default NULL,
  `path` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `backups`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `backups_emails`
-- 

CREATE TABLE `backups_emails` (
  `id` int(11) NOT NULL,
  `backup_id` int(11) default NULL,
  `datetime` varchar(45) default NULL,
  `email_to` varchar(45) default NULL,
  `anexo` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `backup_id` (`backup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `backups_emails`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `boletos`
-- 

CREATE TABLE `boletos` (
  `id` int(11) NOT NULL,
  `nosso_numero` varchar(45) default NULL,
  `chave` varchar(45) default NULL,
  `data_emissao` varchar(45) default NULL,
  `data_vencimento` varchar(45) default NULL,
  `valor_creditos` varchar(45) default NULL,
  `tava` varchar(45) default NULL,
  `valor_total` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `usuario_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `boletos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `campos`
-- 

CREATE TABLE `campos` (
  `id` int(11) NOT NULL,
  `label` varchar(45) default NULL,
  `tipo_campo` varchar(45) default NULL,
  `opcoes` varchar(45) default NULL,
  `valor_padrao` varchar(45) default NULL,
  `obrigatorio` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `campos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `configuracoes`
-- 

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `param` varchar(45) default NULL,
  `label` varchar(45) default NULL,
  `tipo_campo` varchar(45) default NULL,
  `opcoes` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `valor_padrao` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `configuracoes`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `contas`
-- 

CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `saldo` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_contas_usuarios1` (`usuarios_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `contas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `coordenadores_facilities`
-- 

CREATE TABLE `coordenadores_facilities` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) default NULL,
  `usuario_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `coordenadores_facilities`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities`
-- 

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `nome_abreviado` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `tipo_agendamento` varchar(45) default NULL,
  `arquivos` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `unidade_valor` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `facilities`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities_formularios`
-- 

CREATE TABLE `facilities_formularios` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) default NULL,
  `formulario_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `formulario_id` (`formulario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `facilities_formularios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `facilities_usuarios`
-- 

CREATE TABLE `facilities_usuarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `capacidades` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `facilities_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `fk_facilities_usuarios_facilities1` (`facilities_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `facilities_usuarios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `formularios`
-- 

CREATE TABLE `formularios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `formularios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `formulario_campos`
-- 

CREATE TABLE `formulario_campos` (
  `id` int(11) NOT NULL,
  `formulario_id` int(11) default NULL,
  `campo_id` int(11) default NULL,
  `secao` varchar(45) default NULL,
  `ordem` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `formulario_id` (`formulario_id`),
  KEY `campo_id` (`campo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `formulario_campos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `lancamentos`
-- 

CREATE TABLE `lancamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `chave` varchar(45) default NULL,
  `valor` varchar(45) default NULL,
  `tipo` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `medoto_pagto` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `cancelamento_justificativa` varchar(45) default NULL,
  `cancelamento_autor_id` int(11) default NULL,
  `cancelamento_datetime` varchar(45) default NULL,
  `lancamento_direto` varchar(45) default NULL,
  `boleto_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `autor_id` (`autor_id`),
  KEY `cancelamento_autor_id` (`cancelamento_autor_id`),
  KEY `fk_lancamentos_boletos1` (`boleto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `lancamentos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `logs`
-- 

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `facility_id` int(11) default NULL,
  `ip` varchar(45) default NULL,
  `acao` varchar(45) default NULL,
  `datetime` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `facility_id` (`facility_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `logs`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `mensagens`
-- 

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `from_id` int(11) default NULL,
  `to_id` int(11) default NULL,
  `conteudo` varchar(45) default NULL,
  `assunto` varchar(45) default NULL,
  `data_envio` varchar(45) default NULL,
  `data_ultima_leitura` varchar(45) default NULL,
  `cont_leituras` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `mensagens`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `periodos`
-- 

CREATE TABLE `periodos` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `periodo` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `obs` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `facility_id` (`facility_id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `periodos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `projetos`
-- 

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) default NULL,
  `responsavel` varchar(45) default NULL,
  `telefone1` varchar(45) default NULL,
  `telefone2` varchar(45) default NULL,
  `celular` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `departamento` varchar(45) default NULL,
  `instituicao` varchar(45) default NULL,
  `inst_fomento` varchar(45) default NULL,
  `numero_processo` varchar(45) default NULL,
  `tipo_responsavel` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `created_by` int(11) default NULL,
  `modified` varchar(45) default NULL,
  `arquivos` varchar(45) default NULL,
  `resumo` varchar(45) default NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_projetos_usuarios1` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `projetos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `relatorios`
-- 

CREATE TABLE `relatorios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `autor_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `slug` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `relatorios`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `respostas`
-- 

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `formulario_id` int(11) default NULL,
  `valores` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `formulario_id` (`formulario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `respostas`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `senha` varchar(45) default NULL,
  `created` varchar(45) default NULL,
  `modified` varchar(45) default NULL,
  `nome` varchar(45) default NULL,
  `sobrenome` varchar(45) default NULL,
  `endereco` varchar(45) default NULL,
  `instituicao` varchar(45) default NULL,
  `departamento` varchar(45) default NULL,
  `data_nascimento` varchar(45) default NULL,
  `key` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `obs` varchar(45) default NULL,
  `credencial` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `celular` varchar(45) default NULL,
  `telefone1` varchar(45) default NULL,
  `cpf` varchar(45) default NULL,
  `tipo` varchar(45) default NULL,
  `newsletter` varchar(45) default NULL,
  `cep` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'teste1', '123456', '', '', 'teste1', 'sobrenometeste', 'rua um', 'instituicaoteste1', 'departamentoteste1', '22-08-1989', 'keyTeste1', 'statusTeste1', 'obsTeste1', 'credencialTeste1', 'teste1@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste', 'newsletterTeste1', '07052200');
INSERT INTO `usuarios` VALUES (2, 'teste2', '654321', '', '', 'teste2', 'sobrenometeste2', 'rua dois', 'instituicaoteste2', 'departamentoteste2', '22-08-1989', 'keyTeste2', 'statusTeste2', 'obsTeste2', 'credencialTeste2', 'teste2@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste2', 'newsletterTeste2', '07052200');
INSERT INTO `usuarios` VALUES (3, 'teste3', '123456', '', '', 'teste3', 'sobrenometeste3', 'rua tres', 'instituicaoteste3', 'departamentoteste3', '22-08-1989', 'keyTeste3', 'statusTeste3', 'obsTeste3', 'credencialTeste3', 'teste3@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste3', 'newsletterTeste3', '07052200');
INSERT INTO `usuarios` VALUES (4, 'teste4', '654321', '', '', 'teste4', 'sobrenometeste4', 'rua quatro', 'instituicaoteste4', 'departamentoteste4', '22-08-1989', 'keyTeste4', 'statusTeste4', 'obsTeste4', 'credencialTeste4', 'teste4@teste.com', '(11)912345623', '(11)24218095', '38116290851', 'tipoTeste4', 'newsletterTeste4', '07052200');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuarios_projetos`
-- 

CREATE TABLE `usuarios_projetos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) default NULL,
  `projeto_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `projeto_id` (`projeto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `usuarios_projetos`
-- 

