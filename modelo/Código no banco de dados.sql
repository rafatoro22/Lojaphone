-- É só copiar e colar

create database bdloja;
use bdloja;

	create table usuario(

		idUsuario INT(100) AUTO_INCREMENT,
		tipo VARCHAR(5) NOT NULL,
		nome VARCHAR(60) NOT NULL,
		sobrenome VARCHAR(60),
		email VARCHAR(60) NOT NULL,
		sexo VARCHAR(9),
		numero VARCHAR(11),
		cpf VARCHAR(11),
		senha VARCHAR(60) NOT NULL,
		data datetime,
		PRIMARY KEY(idUsuario)

	)engine = innoDB;



	create table produto(

	idProduto INT(100) AUTO_INCREMENT,
	imagem VARCHAR(100),
	marca VARCHAR(10) NOT NULL,
	modelo VARCHAR(10) NOT NULL,
	preco DECIMAL(6,2),
	quantidade INT(100),
	
	PRIMARY KEY(idProduto)

	)engine = innoDB;



	create table compra(

	idCompra INT(100) AUTO_INCREMENT,	
	idProduto INT(100),
	idUsuario INT(100),
	preco DECIMAL(6,2),
	quantidade INT(100),

	PRIMARY KEY(idCompra),
	FOREIGN KEY(idProduto) REFERENCES produto(idProduto),
	FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario)

	)engine = innoDB;	


	create table cupom(

	codigo VARCHAR(100) NOT NULL,
	idUsuario INT(100),
	idCompra INT(100),
	nmCupom VARCHAR(100) NOT NULL,
	desconto INT(100) NOT NULL,
	status VARCHAR(10) NOT NULL,

	PRIMARY KEY(codigo),
	FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario),
	FOREIGN KEY(idCompra) REFERENCES compra(idCompra)

	)engine = innoDB;

CREATE TRIGGER MUDAR_ESTOQUE ON produto
FOR  INSERT/UPDATE/DELETE
AS




/*------Usuário administrador------*/

	INSERT into usuario(tipo,nome,sobrenome,email,sexo,numero,cpf,senha,data)
				values("admin","Raul","Rodrigues","raul.ifsp@gmail.com","Masculino",998167969,123,"123123123","2001-08-01");
	INSERT into usuario(tipo,nome,sobrenome,email,sexo,numero,cpf,senha,data)
				values("admin","Rafaela","Rodrigues","tororafaela6@gmail.com","Feminino",988320238,123,"123123123","2002-06-22");

/*---------------------------------*/

-- 1° no ato do cadastro do cliente, por meio de uma trigger, quando ele se cadastrar ira disparar uma trigger que ira cadastrar um novo cupom na tablea cupom
-- 2° criar aula de procedure que irá filtrar quem comprar acima de 50 reais

create or replace view sysescola.alunosDoGirafales as
select a.nmAluno, d.disciplina, t.siglaTurma, m.idMatricula FROM
tblaluno a INNER JOIN tblmatricula m ON (a.idAluno = m.idAluno)
INNER JOIN tblturma t ON t.idTurma = m.idTurma
INNER JOIN tblcurso c ON c.idCurso = t.idCurso
INNER JOIN tcurso_disciplina cd ON c.idCurso = cd.idCurso
INNER JOIN tbldisciplina d ON d.idDisciplina = cd.idDisciplina
INNER JOIN tblprofessor p ON p.idProfessor = d.idProfessor
WHERE p.nmProfessor = 'Girafales';

create or replace view sysescola.TurmaGirafales as
select count(t.idTurma) FROM tblturma t
INNER JOIN tblcurso c ON c.idCurso = t.idCurso
INNER JOIN tlbcurso_disciplina cd ON c.idCurso = cd.idCurso
INNER JOIN tbldisciplina d ON d.idDisciplina = cd.idDisciplina
INNER JOIN tblprofessor p ON p.idProfessor = d.idProfessor
WHERE p.nmProfessor = 'Girafales';

DELIMITER //
CREATE TRIGGER mudarTurma
AFTER UPDATE ON tblturma FOR EACH ROW
BEGIN
INSERT INTO tbl_log(tabela, usuario, dataHora, acao, dados)
VALUES("tblturma",current_user(),now(),"UPDATE",concat(
old.idTurma,'#',
old.siglaTurma,'#',
old.dtInicio,'#',

old.dtFim,'#',
old.DSemana,'#',
old.HInicio,'#',
old.HFim,'#',
old.Situacao,'#',
old.QAula,'#',
old.idCurso,'#'
));
END//

DELIMITER //
CREATE TRIGGER InsertProfessor
BEFORE INSERT ON tblprofessor FOR EACH ROW
BEGIN
INSERT INTO tbl_log(tabela, usuario, dataHora, acao, dados)
VALUES("tblprofessor",current_user(),now(),"INSERT",concat(

new.idProfessor,'#',
new.nmProfessor,'#',
new.telResidencial,'#',
new.nmProfessor,'#',
new.telResidencial,'#',
new.telCelular,'#',
new.Endereco,'#',
new.Cidade,'#',
new.Bairro,'#',
new.Uf,'#',
new.Cep,'#',
new.Email,'#'

));
END//

DELIMITER $$
CREATE PROCEDURE selectTurmasProfessor(in codProfessor INT, out Turmas INT)
BEGIN

select count(t.idTurma)
FROM tblaluno a INNER JOIN tblmatricula m ON a.idAluno = m.idAluno
INNER JOIN tblturma t ON t.idTurma = m.idTurma
INNER JOIN tblcurso cs ON cs.idCurso = t.idCurso
INNER JOIN tblcurso_disciplina cd
ON cs.idCurso = cd.idCurso INNER JOIN tbldisciplina d
ON d.idDisciplina = cd.idDisciplina INNER JOIN tblprofessor p
ON p.idProfessor = d.idProfessor
WHERE p.idProfessor = codProfessor;

END $$
DELIMITER ;

<h1>Compra Finalizada !!! <?php echo $_SESSION["auth"]["user"]["nome"];?>, obrigado pela Preferência ♥</h1>