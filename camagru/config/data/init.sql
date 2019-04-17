CREATE DATABASE IF NOT EXISTS camagru;

  use camagru;

  CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password MEDIUMTEXT NOT NULL,
    age INT(3),
    private_question VARCHAR(110),
    private_answer VARCHAR(110),
    date TIMESTAMP
  );

  CREATE TABLE gallery (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    pic_link MEDIUMTEXT NOT NULL,
    nb_like iNT(11),
    date TIMESTAMP
  );

  CREATE TABLE comments (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(11) NOT NULL,
  pic_link MEDIUMTEXT NOT NULL,
  nb_like INT(11),
  comment VARCHAR(120),
  date TIMESTAMP
);
