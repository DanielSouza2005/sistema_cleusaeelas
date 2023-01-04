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
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_agendamento VALUES('113', '10', '2', '50.0000', 'Coloracao', '2022-11-11', '3', '6', '2')
,('114', '1', '2', '25.6000', 'Coloracao', '2022-11-11', '5', '6', '2')
,('116', '28', '2', '15.0000', 'Coloracao', '2022-11-11', '9', '6', '2')
,('118', '18', '2', '25.6000', 'Coloracao', '2022-11-11', '4', '6', '2')
,('120', '9', '2', '25.6000', 'Coloracao', '2022-11-11', '8', '6', '2')
,('121', '13', '2', '15.0000', 'Coloracao', '2022-11-11', '10', '6', '2')
,('122', '21', '2', '25.6000', 'Coloracao', '2022-11-11', '11', '6', '2')
,('123', '3', '2', '50.0000', 'Coloracao', '2022-11-11', '12', '6', '2')
,('125', '23', '2', '15.0000', 'Coloracao', '2022-11-11', '14', '6', '2')
,('127', '4', '2', '15.0000', 'Coloracao', '2022-11-04', '1', '4', '1')
,('128', '6', '3', '15.0000', 'Unhas', '2022-11-04', '4', '1', '1')
,('129', '23', '15', '25.6000', 'Simples', '2022-11-03', '1', '1', '1')
,('130', '1', '3', '20.0000', 'Unhas', '2022-11-03', '2', '4', '1')
,('131', '4', '4', '15.0000', 'Esmaltagem', '2022-11-02', '1', '5', '1')
,('132', '13', '5', '25.6000', 'Geral', '2022-11-02', '2', '1', '1')
,('135', '21', '3', '30.0000', 'Unhas', '2022-11-10', '4', '4', '1')
,('136', '6', '4', '15.0000', 'Esmaltagem', '2022-11-10', '7', '4', '1')
,('137', '10', '5', '300.0000', 'Geral', '2022-11-10', '1', '4', '1')
,('138', '28', '2', '25.6000', 'Coloracao', '2022-11-11', '16', '6', '2')
,('140', '16', '2', '25.6000', 'Coloracao', '2022-11-11', '18', '6', '2')
,('141', '22', '2', '15.0000', 'Coloracao', '2022-11-11', '20', '6', '2')
,('142', '7', '2', '25.6000', 'Coloracao', '2022-11-11', '17', '6', '2')
,('143', '6', '2', '300.0000', 'Coloracao', '2022-11-11', '21', '6', '2')
,('144', '4', '3', '15.0000', 'Unhas', '2022-11-09', '3', '5', '1')
,('145', '28', '4', '40.0000', 'Esmaltagem', '2022-11-09', '1', '6', '2')
,('146', '3', '5', '300.0000', 'Geral', '2022-11-08', '1', '2', '1')
,('147', '23', '4', '25.6000', 'Esmaltagem', '2022-11-08', '2', '2', '1')
,('148', '1', '3', '15.0000', 'Unhas', '2022-11-07', '1', '1', '1')
,('149', '21', '15', '15.0000', 'Simples', '2022-11-07', '2', '2', '1')
,('153', '4', '2', '25.6000', 'Hidratação', '2022-11-18', '1', '6', '2')
,('154', '8', '2', '15.0000', 'Corte', '2022-10-03', '1', '2', '1')
,('155', '3', '2', '25.6000', 'Hidratação', '2022-10-03', '2', '4', '1')
,('156', '11', '2', '25.6000', 'Corte', '2022-10-03', '3', '1', '1')
,('157', '3', '3', '15.0000', 'Esmaltagem', '2022-10-03', '1', '5', '1')
,('158', '17', '4', '25.6000', 'Unhas', '2022-10-04', '1', '4', '1')
,('159', '12', '3', '25.6000', 'Unhas', '2022-10-04', '6', '4', '1')
,('160', '6', '5', '25.6000', 'Geral', '2022-10-04', '2', '2', '1')
,('161', '4', '15', '25.6000', 'Simples', '2022-10-05', '1', '1', '1')
,('162', '3', '4', '20.0000', 'Unhas', '2022-10-05', '2', '5', '1')
,('163', '4', '4', '20.0000', 'Unhas', '2022-10-05', '3', '2', '1')
,('164', '17', '5', '15.0000', 'Geral', '2022-10-06', '1', '5', '1')
,('165', '17', '5', '15.0000', 'Geral', '2022-10-06', '1', '1', '1')
,('166', '17', '2', '15.0000', 'Corte', '2022-10-06', '1', '1', '1')
,('167', '23', '15', '25.6000', 'Simples', '2022-10-07', '1', '1', '1')
,('168', '11', '4', '25.6000', 'Unhas', '2022-10-07', '2', '4', '1')
,('169', '17', '3', '15.0000', 'Unhas', '2022-10-07', '3', '4', '1')
,('170', '7', '2', '15.0000', 'Corte', '2022-10-10', '1', '4', '1')
,('171', '12', '3', '25.6000', 'Unhas', '2022-10-10', '1', '1', '1')
,('172', '3', '3', '15.0000', 'Unhas', '2022-10-10', '2', '4', '1')
,('173', '17', '4', '25.6000', 'Esmaltagem', '2022-10-11', '1', '5', '1')
,('174', '21', '3', '15.0000', 'Unhas', '2022-10-11', '2', '4', '1')
,('175', '3', '4', '25.6000', 'Unhas', '2022-10-11', '3', '2', '1')
,('176', '23', '5', '25.6000', 'Geral', '2022-10-12', '1', '1', '1')
,('177', '3', '2', '15.0000', 'Corte', '2022-10-12', '1', '1', '1')
,('178', '4', '5', '25.6000', 'Geral', '2022-10-12', '2', '1', '1')
,('179', '12', '2', '25.6000', 'Corte', '2022-10-13', '1', '1', '1')
,('180', '22', '4', '25.6000', 'Unhas', '2022-10-13', '1', '5', '1')
,('181', '23', '3', '25.6000', 'Unhas', '2022-10-13', '2', '4', '1')
,('182', '7', '15', '25.6000', 'Simples', '2022-10-14', '1', '1', '1')
,('183', '9', '4', '25.6000', 'Unhas', '2022-10-14', '2', '4', '1')
,('184', '12', '3', '25.6000', 'Unhas', '2022-10-14', '3', '4', '1')
,('185', '7', '2', '25.6000', 'Corte', '2022-10-17', '1', '1', '1')
,('186', '3', '5', '15.0000', 'Geral', '2022-10-17', '1', '2', '1')
,('187', '9', '4', '25.6000', 'Unhas', '2022-10-17', '2', '1', '1')
,('188', '7', '2', '25.6000', 'Corte', '2022-10-18', '1', '1', '1')
,('189', '17', '2', '25.6000', 'Corte', '2022-10-18', '2', '5', '1')
,('190', '18', '5', '25.6000', 'Geral', '2022-10-18', '1', '4', '1')
,('191', '7', '3', '25.6000', 'Unhas', '2022-10-19', '1', '1', '1')
,('192', '6', '4', '25.6000', 'Unhas', '2022-10-19', '2', '4', '1')
,('193', '23', '15', '25.6000', 'Simples', '2022-10-19', '3', '5', '1')
,('194', '7', '2', '25.6000', 'Corte', '2022-10-20', '1', '5', '1')
,('195', '22', '3', '25.6000', 'Unhas', '2022-10-20', '1', '4', '1')
,('196', '4', '4', '25.6000', 'Unhas', '2022-10-20', '2', '1', '1')
,('197', '4', '2', '25.6000', 'Corte', '2022-10-21', '1', '1', '1')
,('198', '4', '4', '15.0000', 'Unhas', '2022-10-21', '1', '1', '1')
,('199', '17', '5', '25.6000', 'Geral', '2022-10-21', '2', '4', '1')
,('200', '3', '4', '15.0000', 'Unhas', '2022-10-24', '1', '1', '1')
,('201', '4', '3', '25.6000', 'Unhas', '2022-10-24', '2', '2', '1')
,('202', '22', '3', '25.6000', 'Unhas', '2022-10-24', '3', '4', '1')
,('203', '18', '5', '25.6000', 'Geral', '2022-10-25', '1', '4', '1')
,('204', '12', '4', '25.6000', 'Unhas', '2022-10-25', '2', '2', '1')
,('205', '17', '15', '25.6000', 'Simples', '2022-10-25', '3', '1', '1')
,('206', '3', '4', '25.6000', 'Unhas', '2022-10-26', '1', '5', '1')
,('207', '23', '5', '25.6000', 'Geral', '2022-10-26', '2', '1', '1')
,('208', '10', '3', '25.6000', 'Unhas', '2022-10-26', '3', '1', '1')
,('209', '17', '2', '25.6000', 'Corte', '2022-10-27', '1', '4', '1')
,('210', '4', '15', '25.6000', 'Simples', '2022-10-27', '1', '2', '1')
,('211', '4', '3', '25.6000', 'Unhas', '2022-10-27', '2', '5', '1')
,('212', '17', '3', '15.0000', 'Unhas', '2022-10-28', '1', '1', '1')
,('213', '23', '4', '25.6000', 'Unhas', '2022-10-28', '2', '4', '1')
,('214', '11', '3', '25.6000', 'Unhas', '2022-10-28', '3', '4', '1')
,('215', '9', '2', '15.0000', 'Corte', '2022-10-31', '1', '1', '1')
,('216', '12', '5', '15.0000', 'Geral', '2022-10-31', '1', '5', '1')
,('217', '9', '3', '25.6000', 'Unhas', '2022-10-31', '2', '4', '1')
,('218', '3', '4', '15.0000', 'Unhas', '2022-11-01', '1', '1', '1')
,('219', '3', '4', '15.0000', 'Unhas', '2022-11-01', '2', '1', '1')
,('220', '9', '2', '25.6000', 'Corte', '2022-11-01', '1', '2', '1')
,('221', '17', '4', '25.6000', 'Unhas', '2022-11-02', '3', '5', '1')
,('222', '21', '5', '25.6000', 'Geral', '2022-11-03', '3', '1', '1')
,('223', '6', '4', '25.6000', 'Unhas', '2022-11-04', '1', '5', '1')
,('224', '16', '4', '10.0000', 'Unhas', '2022-11-07', '3', '1', '1')
,('225', '7', '4', '25.6000', 'Unhas', '2022-11-08', '3', '2', '1')
,('226', '9', '4', '25.6000', 'Unhas', '2022-11-09', '2', '4', '1')
,('227', '22', '2', '25.6000', 'Corte', '2022-11-09', '1', '5', '1')
,('229', '17', '4', '25.6000', 'Unhas', '2022-11-14', '1', '6', '2')
,('230', '12', '5', '25.6000', 'Geral', '2022-11-14', '2', '6', '2')
,('231', '3', '3', '25.6000', 'Unhas', '2022-11-15', '1', '6', '2')
,('232', '8', '5', '25.6000', 'Geral', '2022-11-15', '2', '6', '2')
,('233', '22', '5', '25.6000', 'Geral', '2022-11-15', '3', '6', '2')
,('234', '9', '3', '25.6000', 'Unhas', '2022-11-16', '1', '6', '2')
,('235', '3', '5', '25.6000', 'Geral', '2022-11-16', '2', '6', '2')
,('236', '6', '15', '25.6000', 'Simples', '2022-11-16', '3', '6', '2')
,('237', '9', '3', '25.6000', 'Unhas', '2022-11-17', '1', '6', '2')
,('238', '23', '3', '25.6000', 'Unhas', '2022-11-17', '2', '6', '2')
,('239', '4', '4', '25.6000', 'Unhas', '2022-11-17', '3', '6', '2')
,('240', '7', '5', '25.6000', 'Geral', '2022-11-18', '1', '6', '2')
,('241', '11', '5', '25.6000', 'Geral', '2022-11-18', '2', '6', '2')
,('242', '3', '4', '25.6000', 'Unhas', '2022-11-21', '1', '6', '2')
,('243', '7', '15', '25.6000', 'Simples', '2022-11-21', '2', '6', '2')
,('244', '21', '4', '25.6000', 'Unhas', '2022-11-21', '3', '6', '2')
,('245', '11', '3', '15.0000', 'Unhas', '2022-11-22', '1', '6', '2')
,('246', '4', '15', '25.6000', 'Simples', '2022-11-22', '2', '6', '2')
,('247', '3', '3', '25.6000', 'Unhas', '2022-11-22', '3', '6', '2')
,('249', '1', '5', '25.6000', 'Geral', '2022-11-23', '2', '6', '2')
,('250', '9', '4', '15.0000', 'Unhas', '2022-11-23', '3', '6', '2')
,('251', '9', '4', '15.0000', 'Unhas', '2022-11-23', '3', '6', '2')
,('252', '18', '4', '15.0000', 'Unhas', '2022-11-24', '1', '6', '2')
,('253', '7', '4', '25.6000', 'Unhas', '2022-11-24', '2', '6', '2')
,('254', '4', '3', '25.6000', 'Unhas', '2022-11-24', '3', '6', '2')
,('255', '12', '4', '25.6000', 'Unhas', '2022-11-25', '1', '6', '2')
,('256', '3', '4', '25.6000', 'Unhas', '2022-11-25', '2', '6', '2')
,('257', '3', '4', '25.6000', 'Unhas', '2022-11-25', '3', '6', '2')
,('258', '22', '2', '25.6000', 'Corte', '2022-11-28', '1', '6', '2')
,('259', '4', '5', '25.6000', 'Geral', '2022-11-28', '1', '6', '2')
,('260', '18', '5', '45.0000', 'Geral', '2022-11-28', '2', '6', '2')
,('261', '16', '5', '15.0000', 'Geral', '2022-11-29', '1', '6', '2')
,('262', '12', '15', '25.6000', 'Simples', '2022-11-29', '2', '6', '2')
,('263', '8', '4', '25.6000', 'Unhas', '2022-11-29', '3', '6', '2')
,('264', '11', '2', '25.6000', 'Corte', '2022-11-30', '1', '6', '2')
,('265', '4', '4', '15.0000', 'Unhas', '2022-11-30', '1', '6', '2')
,('266', '23', '3', '25.6000', 'Unhas', '2022-11-30', '2', '6', '2')
,('267', '11', '2', '15.0000', 'Corte', '2022-12-01', '1', '6', '3')
,('268', '3', '5', '25.6000', 'Geral', '2022-12-01', '1', '6', '3')
,('269', '21', '4', '25.6000', 'Unhas', '2022-12-01', '2', '6', '3')
,('270', '22', '2', '25.6000', 'Corte', '2022-12-02', '1', '6', '3')
,('271', '11', '5', '25.6000', 'Geral', '2022-12-02', '1', '6', '3')
,('272', '18', '4', '25.6000', 'Unhas', '2022-12-02', '2', '6', '3')
,('275', '3', '2', '15.0000', 'Corte', '2022-11-12', '6', '6', '3')
,('277', '1', '3', '20.0000', 'Unhas', '2022-11-14', '3', '6', '2')
,('278', '1', '3', '20.0000', 'Unhas', '2022-11-14', '4', '6', '2')
,('279', '7', '2', '50.0000', 'Hidratação', '2022-11-14', '12', '6', '2')
,('280', '3', '4', '50.0000', 'Esmaltagem', '2022-11-14', '14', '2', '1')
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ;

#
# //Dados a serem incluídos na tabela
#

INSERT INTO tb_cliente VALUES('1', 'Daniel Simoes de Souza', '(19) 99757-2802', 'danisimoes741@gmail.com', '2005-02-28', 'M', '2022-10-11')
,('3', 'Maria Eduarda Baumeyer', '(19) 99554-8746', 'mariaedutbau@gmail.com', '2005-02-13', 'F', '2022-10-11')
,('4', 'Cinthia Simoes de Souza', '(19) 99758-4152', 'cinthia.cinth@gmail.com', '1997-07-21', 'F', '2022-10-11')
,('6', 'Caroline Luiza da Silva', '(19) 99548-7451', 'carolluiza@apple.com', '2005-04-13', 'F', '2022-10-11')
,('7', 'Guilherme Bordon Gatti', '(19) 99658-4847', 'guilhermebordon@gmail.com', '2005-05-21', 'M', '2022-10-11')
,('8', 'Gabriel Henrique Bartelli', '(19) 99548-4945', 'gbartelli598@gmail.com', '2005-02-02', 'M', '2022-10-11')
,('9', 'Ilian Fernando Feliciano', '(19) 99622-5145', 'ilianfeliciano456@gmail.com', '2002-12-28', 'M', '2022-10-11')
,('10', 'Carla Macedo', '(19) 99468-7461', 'carlamacedo@gmail.com', '1995-05-26', 'F', '2022-10-11')
,('11', 'Jair Baldo Filho', '(19) 99586-5168', 'jairbaldofilho@gmail.com', '1986-10-08', 'M', '2022-10-11')
,('12', 'João Frederico Delgado', '(19) 99595-8494', 'joaofd12@gmail.com', '2002-06-12', 'M', '2022-10-11')
,('13', 'Tiago Trevisan', '(19) 99757-2802', 'tiaguinho@outlook.com', '2000-01-07', 'M', '2022-10-11')
,('16', 'Colegio Politec', '(19) 99790-9880', 'colegio@colegiopolitec.com.br', '1000-01-01', 'I', '2022-10-11')
,('17', 'Lucas Stocco', '(19) 19975-7981', 'lucasstocco@hotmail.com', '2003-01-01', 'M', '2022-10-11')
,('18', 'Claudio Denardi ', '(19) 99749-2187', 'claudiodenardi8@gmail.com', '1985-09-21', 'M', '2022-10-11')
,('21', 'Roseli Rocha', '(19) 99974-0947', 'roselirocha@outlook.com', '2000-04-12', 'F', '2022-10-11')
,('22', 'Isabella Xavier da Rocha', '(19) 99940-7907', 'isabellarocha@gmail.com', '2005-04-26', 'F', '2022-10-11')
,('23', 'Luana Gualberto', '(19) 98794-9490', 'luanagual@gmail.com', '2005-03-14', 'F', '2022-10-11')
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ;

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