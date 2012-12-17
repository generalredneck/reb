CREATE TABLE user (
  user_id INT AUTO_INCREMENT NOT NULL, 
  username VARCHAR(255) DEFAULT NULL, 
  email VARCHAR(255) NOT NULL, 
  display_name VARCHAR(50) DEFAULT NULL, 
  password VARCHAR(128) NOT NULL, 
  UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), 
  UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), 
  PRIMARY KEY(user_id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

CREATE TABLE `rbac_permission` (
  `perm_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `perm_name` varchar(32) NULL,
  PRIMARY KEY (`perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `rbac_role` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_role_id` int(11) unsigned NOT NULL,
  `role_name` varchar(32) NULL,
  PRIMARY KEY (`role_id`),
  KEY `parent_role_id` (`parent_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `rbac_role`
  ADD CONSTRAINT `rbac_role_ibfk_1` FOREIGN KEY (`parent_role_id`) REFERENCES `rbac_role` (`role_id`);


CREATE TABLE `rbac_role_permission` (
  `role_id` int(11) unsigned NOT NULL,
  `perm_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`perm_id`),
  KEY `perm_id` (`perm_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `rbac_role_permission`
  ADD CONSTRAINT `rbac_role_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rbac_role` (`role_id`),
  ADD CONSTRAINT `rbac_role_permission_ibfk_2` FOREIGN KEY (`perm_id`) REFERENCES `rbac_permission` (`perm_id`);

INSERT INTO rbac_role (role_name) VALUES ('admin');
INSERT INTO rbac_role (role_name) VALUES ('member');
INSERT INTO rbac_role (role_name) VALUES ('guest');

