CREATE TABLE usuarios (
id smallint(5) unsigned NOT NULL auto_increment, 
usuario varchar(20) NOT NULL default '', 
clave varchar(20) NOT NULL default '',
PRIMARY KEY (id)
) 



insert into usuarios value (1, 'testuser', 'teXB5Lk3JWG6g')



create definer = `root`@`localhost` procedure `sp_validar_usuario`(
in param_user varchar(255),
in param_pass varchar(255)

)

begin

	set @s = concat("select count(*) from usuarios where usuario = '", param_user, "' and clave = '" , param_pass, "'");
	prepare stmt from @s;
	execute stmt;
	deallocate prepare stmt;

end;