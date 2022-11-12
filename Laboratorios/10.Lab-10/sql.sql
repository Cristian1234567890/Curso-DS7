create table votos (id tinyint(3) unsigned not null auto_increment,
votos1 int(10) unsigned not null default '0',
votos2 int(10) unsigned not null default '0',
primary key(id)
)

insert into votos values (1,49,12);


CREATE DEFINER = `root`@`localhost` procedure `sp_listar_votos`()
BEGIN
	SELECT votos1, votos2 from votos;
END


CREATE DEFINER = `root`@`localhost` procedure `sp_actualizar_votos`(
	in param_votos1 varchar(255),
	in param_votos2 varchar(255)
)
BEGIN
	set @s = concat("update votos set votos1=", param_votos1,", votos2=", param_votos2);
	prepare stmt from @s;
	execute stmt;
	deallocate prepare stmt;
END