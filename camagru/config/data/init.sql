CREATE DATABASE IF NOT EXISTS camagru;

  use camagru;

  CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password MEDIUMTEXT NOT NULL,
    private_question VARCHAR(110),
    private_answer VARCHAR(110),
    notif TINYINT(1),
    `key` VARCHAR(32) NULL,
    active TINYINT(1) DEFAULT '0',
    date TIMESTAMP
  );

  CREATE TABLE gallery (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED,
    pic_link MEDIUMTEXT NOT NULL,
    nb_like iNT(11) DEFAULT '0',
    date TIMESTAMP 
  );

  CREATE TABLE comments (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(11) NOT NULL,
  username VARCHAR(255),
  picture_id INT(11),
  comment VARCHAR(120),
  date TIMESTAMP
);

CREATE TABLE likes (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED,
    picture_id INT(11)
  );
