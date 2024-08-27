1. Criação da tabela de usuários

CREATE TABLE `school_project`.`users` (`userId` INT(11) NOT NULL AUTO_INCREMENT , PRIMARY KEY (`userId`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

------------------------------------------------------

2. Adição de campos de nome e nascimento na tabela USERS

ALTER TABLE `users` ADD `userName` VARCHAR(50) NOT NULL AFTER `userId`, ADD `userBirth` DATE NOT NULL AFTER `userName`, ADD `userCreatedAt` DATETIME NOT NULL AFTER `userBirth`, ADD `userCategory` ENUM('STUDENT','TEACHER') NOT NULL AFTER `userCreatedAt`, ADD `userEmail` VARCHAR(50) NOT NULL AFTER `userCategory`, ADD `userPass` VARCHAR(60) NOT NULL AFTER `userEmail`, ADD `userLogged` BOOLEAN NOT NULL AFTER `userPass`, ADD `userCpf` VARCHAR(11) NOT NULL AFTER `userLogged`;

------------------------------------------------------
