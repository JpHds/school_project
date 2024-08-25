1. Criação da tabela de usuários

CREATE TABLE `school_project`.`users` (`userId` INT(11) NOT NULL AUTO_INCREMENT , PRIMARY KEY (`userId`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

------------------------------------------------------

2. Adição de campos de nome e nascimento na tabela USERS

ALTER TABLE `users` ADD `userName` VARCHAR(50) NOT NULL AFTER `userId`, ADD `userBirth` DATE NOT NULL AFTER `userName`, ADD `createdAt` DATETIME NOT NULL AFTER `userBirth`, ADD `category` ENUM('student','teacher') NOT NULL AFTER `createdAt` ADD `userEmail` VARCHAR(50) NOT NULL AFTER `category`;

------------------------------------------------------
