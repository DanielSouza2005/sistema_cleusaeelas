set foreign_key_checks=0;


#
# //Criação da Tabela : tb_agendamento
#

CREATE TABLE `tb_agendamento` (
  `age_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cli_codigo` int(10) unsigned NOT NULL,
  `tps_codigo` int(10) unsigned NOT NULL,
  `age_preco` decimal(15,4) DEFAULT NULL,
  `age_especificacao` varchar(30) DEFAULT NULL,
  `age_data` date DEFAULT NULL,
  `hor_codigo` int(11) NOT NULL,
  `tpg_codigo` int(11) NOT NULL,
  `sta_codigo` int(11) NOT NULL,
  PRIMARY KEY (`age_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_agendamento VALUES('185', '1', '2', '15.0000', 'Corte', '2022-10-05', '2', '6', '3')
,('186', '6', '3', '25.6000', '', '2022-10-06', '1', '4', '1')
,('187', '7', '4', '25.6000', '', '2022-10-06', '2', '5', '1')
,('188', '11', '5', '20.0000', 'Não especificado', '2022-10-06', '5', '5', '1')
,('189', '9', '15', '30.0000', 'Não especificado', '2022-10-06', '11', '1', '1')
,('190', '7', '2', '15.0000', 'Corte', '2022-10-07', '1', '4', '1')
,('191', '1', '2', '10.0000', 'Corte, luzes', '2022-10-13', '1', '5', '1')
,('192', '10', '2', '15.0000', 'Corte', '2022-10-13', '2', '2', '1')
,('195', '1', '2', '15.0000', 'Corte', '2022-10-12', '1', '6', '3')
,('196', '1', '2', '25.6000', 'Corte', '2022-10-12', '2', '6', '3')
,('197', '20', '2', '25.6000', 'Corte', '2022-10-12', '1', '6', '3')
,('199', '1', '2', '15.0000', 'Corte', '2022-10-12', '2', '6', '3')
,('200', '1', '2', '15.0000', 'Corte', '2022-10-12', '3', '6', '3')
,('201', '7', '2', '15.0000', 'Corte', '2022-10-12', '4', '1', '1')
,('202', '1', '2', '15.0000', 'Corte', '2022-10-12', '9', '6', '3')
,('203', '13', '3', '25.6000', '', '2022-10-12', '1', '6', '3')
,('204', '7', '3', '25.6000', '', '2022-10-12', '2', '6', '3')
,('205', '12', '4', '25.6000', 'Não especificado', '2022-10-12', '3', '5', '1')
,('206', '11', '3', '25.6000', '', '2022-10-12', '4', '6', '3')
,('207', '7', '2', '15.0000', 'Corte', '2022-10-12', '2', '5', '1')
,('208', '6', '2', '15.0000', 'Corte', '2022-10-12', '1', '2', '1')
,('209', '6', '15', '50.0000', '', '2022-10-12', '1', '1', '1')
,('210', '1', '2', '25.6000', 'Corte', '2022-10-14', '1', '5', '1')
,('211', '7', '2', '25.6000', 'Luzes', '2022-10-14', '2', '2', '1')
,('212', '13', '2', '25.6000', 'Corte', '2022-10-14', '3', '6', '3')
,('213', '6', '3', '25.6000', 'Não especificado', '2022-10-15', '1', '4', '1')
,('214', '1', '2', '15.0000', 'Corte', '2022-10-17', '1', '4', '1')
,('215', '7', '2', '15.0000', 'Corte', '2022-10-15', '1', '5', '1')
,('216', '9', '3', '15.0000', '', '2022-10-15', '2', '6', '2')
,('217', '11', '2', '15.0000', 'Corte', '2022-10-18', '5', '4', '1')
,('218', '8', '5', '25.6000', '', '2022-10-19', '1', '1', '1')
,('219', '1', '3', '25.6000', '', '2022-10-19', '2', '1', '1')
;

#
# //Criação da Tabela : tb_cliente
#

CREATE TABLE `tb_cliente` (
  `cli_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(80) NOT NULL,
  `cli_celular` varchar(15) NOT NULL,
  `cli_email` varchar(80) NOT NULL,
  `cli_data_nascimento` date DEFAULT NULL,
  `cli_sexo` varchar(1) NOT NULL,
  `cli_data_inclusao` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`cli_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_cliente VALUES('1', 'Daniel Simões de Souza', '(19) 99880-0114', 'danisimoes741@gmail.com', '2005-02-28', 'M', '2022-10-10')
,('6', 'Cinthia Simões de Souza', '(19) 99900-7079', 'cinthia@gmail.com', '2000-08-21', 'F', '2022-10-10')
,('7', 'Isabella Xavier da Rocha', '(19) 99109-7079', 'isabellarocha@gmail.com', '2005-04-13', 'F', '2022-10-10')
,('8', 'Maria Eduarda Torrico Baumeyer', '(19) 99778-5106', 'mariaeduardatorrico@gmail.com', '2005-02-18', 'F', '2022-10-10')
,('9', 'Luana Gualberto', '(19) 99479-0799', 'luanagual@gmail.com', '2005-08-03', 'F', '2022-10-10')
,('10', 'Tiago Trevisan', '(19) 97548-0790', 'tiaguinho@gmail.com', '2005-01-01', 'M', '2022-10-10')
,('11', 'Luana Araujo de Nascimento', '(19) 99774-7997', 'luanaaraujo@gmail.com', '2005-02-28', 'F', '2022-10-10')
,('12', 'Isinha Rocha', '(19) 99906-3052', 'isinha@gmail.com', '2005-04-26', 'F', '2022-10-10')
,('13', 'João Coleoni', '(19) 99489-0799', 'joaocoleoni@hotmail.com', '2000-01-01', 'M', '2022-10-10')
,('14', 'Caroline Luiza da Silva', '(19) 99494-9097', 'carolluiza@apple.com', '2005-04-13', 'F', '2022-10-10')
;

#
# //Criação da Tabela : tb_horario
#

CREATE TABLE `tb_horario` (
  `hor_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `per_codigo` int(10) unsigned NOT NULL,
  `hor_horario` time(5) NOT NULL,
  PRIMARY KEY (`hor_codigo`),
  KEY `tb_horarios_FKIndex1` (`per_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_horario VALUES('1', '1', '07:00:00.00000')
,('2', '1', '07:30:00.00000')
,('3', '1', '08:00:00.00000')
,('4', '1', '08:30:00.00000')
,('5', '1', '09:00:00.00000')
,('6', '1', '09:30:00.00000')
,('7', '1', '10:00:00.00000')
,('8', '1', '10:30:00.00000')
,('9', '1', '11:00:00.00000')
,('10', '1', '11:30:00.00000')
,('11', '2', '13:00:00.00000')
,('12', '2', '13:30:00.00000')
,('13', '2', '14:00:00.00000')
,('14', '2', '14:30:00.00000')
,('15', '2', '15:00:00.00000')
,('16', '2', '15:30:00.00000')
,('17', '2', '16:00:00.00000')
,('18', '2', '16:30:00.00000')
,('19', '2', '17:00:00.00000')
,('20', '2', '17:30:00.00000')
,('21', '2', '18:00:00.00000')
;

#
# //Criação da Tabela : tb_periodo
#

CREATE TABLE `tb_periodo` (
  `per_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `per_descricao` varchar(8) NOT NULL,
  PRIMARY KEY (`per_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_periodo VALUES('1', 'Manhã')
,('2', 'Tarde')
,('3', 'Noite')
;

#
# //Criação da Tabela : tb_profissional
#

CREATE TABLE `tb_profissional` (
  `prf_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prf_nome` varchar(20) NOT NULL,
  `prf_especialidade` varchar(15) NOT NULL,
  PRIMARY KEY (`prf_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_profissional VALUES('1', 'Graziela', 'Cabelo')
,('2', 'Cleusa', 'Cabelo')
,('3', 'Daniela', 'Estetica')
;

#
# //Criação da Tabela : tb_status
#

CREATE TABLE `tb_status` (
  `sta_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `sta_descricao` varchar(20) NOT NULL,
  `sta_cor` varchar(10) NOT NULL,
  `sta_data_modificacao` datetime NOT NULL,
  PRIMARY KEY (`sta_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_status VALUES('1', 'Realizado', '#007bff', '2022-08-03 19:06:00')
,('2', 'Confirmado', '#28a745', '2022-08-03 19:08:00')
,('3', 'Desmarcado', '#ffc107', '2022-08-03 19:09:00')
;

#
# //Criação da Tabela : tb_tipopgto
#

CREATE TABLE `tb_tipopgto` (
  `tpg_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tpg_descricao` varchar(40) NOT NULL,
  PRIMARY KEY (`tpg_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_tipopgto VALUES('1', 'Crédito')
,('2', 'Débito')
,('4', 'Dinheiro')
,('5', 'Pix')
,('6', 'Pendente')
;

#
# //Criação da Tabela : tb_tiposervico
#

CREATE TABLE `tb_tiposervico` (
  `tps_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prf_codigo` int(10) unsigned NOT NULL,
  `tps_descricao` varchar(20) NOT NULL,
  `tps_cor` varchar(10) NOT NULL,
  PRIMARY KEY (`tps_codigo`),
  KEY `tb_tiposervico_FKIndex1` (`prf_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_tiposervico VALUES('2', '2', 'Cabelo', '#007bff')
,('3', '3', 'Manicure', '#e83e8c')
,('4', '3', 'Pedicure', '#f012be')
,('5', '3', 'Depilação', '#605ca8')
,('15', '3', 'Maquiagem', '#d81b60')
;

#
# //Criação da Tabela : tb_usuario
#

CREATE TABLE `tb_usuario` (
  `usu_codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usu_login` varchar(20) NOT NULL,
  `usu_senha` varchar(20) NOT NULL,
  `usu_ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`usu_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_usuario VALUES('1', 'Graziela', 'Cleusa&ElasCabelo', 'A')
,('2', 'Daniela', 'Cleusa&ElasEstetica', 'A')
,('3', 'Cleusa', 'Cleusa&ElasADM', 'A')
,('4', 'Daniel', 'Espertinhos#2022', 'A')
;
