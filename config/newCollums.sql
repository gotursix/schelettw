--rulati comanda asta ca sa adaugati coloana banned in db
ALTER TABLE `users` ADD `banned` BOOLEAN NOT NULL DEFAULT FALSE AFTER `acl`;

--and this one for the profile photo of the alter user
ALTER TABLE `users` ADD `photoId` INT NOT NULL DEFAULT '0' AFTER `banned`;

--and this for adding questions table
CREATE TABLE `questions` (
                             `id` int(100) NOT NULL,
                             `photo` varchar(100) NOT NULL,
                             `continent` varchar(100) NOT NULL,
                             `question` text NOT NULL,
                             `answer1` varchar(200) NOT NULL,
                             `answer2` varchar(200) NOT NULL,
                             `answer3` varchar(200) NOT NULL,
                             `answer4` varchar(200) NOT NULL,
                             `correct` int(100) NOT NULL,
                             `header` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `webdb`.`fruit` (  `id` INT NOT NULL AUTO_INCREMENT ,
                                `name` VARCHAR(100) NOT NULL ,
                                `description` TEXT NOT NULL ,
                                 PRIMARY KEY (`id`)
) ENGINE = InnoDB;