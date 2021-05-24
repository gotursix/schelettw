--rulati comanda asta ca sa adaugati coloana banned in db
ALTER TABLE `users` ADD `banned` BOOLEAN NOT NULL DEFAULT FALSE AFTER `acl`;

--and this one for the profile photo of the alter user
ALTER TABLE `users` ADD `photoId` INT NOT NULL DEFAULT '0' AFTER `banned`;