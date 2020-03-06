CREATE DATABASE todoapp;

use todoapp;

CREATE TABLE IF NOT EXISTS `users` (
  `id`  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `tasks` (
  `id`  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT NULL
);

/*
Incase user or task is deleted
*/

CREATE TABLE IF NOT EXISTS `users_tasks` (
   `user_id` INT,
   `task_id` INT,
   PRIMARY KEY(`user_id`,`task_id`),
   FOREIGN KEY(`user_id`) 
       REFERENCES `users`(`id`),
   FOREIGN KEY(`task_id`) 
       REFERENCES `tasks`(`id`)
);

SELECT * FROM tasks;
SELECT * FROM users;

INSERT INTO  `users_tasks` 
VALUES (1,1);

INSERT INTO  `users` 
VALUES(1,"Gunnar Helgason", "GH", "Password1234",CURRENT_TIMESTAMP);

INSERT INTO  `tasks` 
VALUES(1,"Clean Table", "Clean the kitchen table", CURRENT_TIMESTAMP, 1);

SELECT u1.name as user_name,  t.id, t.title, t.description, t.datetime, t.active FROM tasks as t 
LEFT JOIN users_tasks as u ON t.id = u.task_id
LEFT JOIN users as u1 ON u.user_id = u1.id;

    