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
  `age_data` datetime DEFAULT NULL,
  `tpg_codigo` int(11) NOT NULL,
  `sta_codigo` int(11) NOT NULL,
  PRIMARY KEY (`age_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_agendamento VALUES('147', '1', '2', '15.0000', 'Corte', '2022-09-22 07:00:00', '6', '2')
,('148', '1', '2', '10.0000', 'Corte', '2022-09-23 07:30:00', '6', '2')
,('149', '1', '2', '15.0000', 'Corte', '2022-09-23 08:00:00', '6', '2')
,('150', '1', '2', '10.0000', 'Corte', '2022-09-25 07:30:00', '4', '1')
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
  PRIMARY KEY (`cli_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_cliente VALUES('1', 'Daniel', '(19) 99880-0114', 'danisimoes741@gmail.com', '2005-02-28')
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_tiposervico VALUES('2', '2', 'Cabelo', '#007bff')
,('3', '3', 'Manicure', '#e83e8c')
,('4', '3', 'Pedicure', '#f012be')
,('5', '3', 'Depilação', '#605ca8')
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
,('4', 'Daniel', '123', 'A')
;
