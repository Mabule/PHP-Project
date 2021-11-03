CREATE DATABASE IF NOT EXISTS `projet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use `projet`;

CREATE TABLE IF NOT EXISTS `users` (
    UTI_NP varchar(255) NOT NULL,
    UTI_MAIL varchar(255) NOT NULL,
    UTI_TEL varchar(20) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `advertise` (
    d_id PRIMARY KEY SERIAL NOT NULL,
    d_title varchar(20) NOT NULL,
    d_price_rent int NOT NULL,
    d_price_taxe int NOT NULL,
    d_type_heating varchar(10) NOT NULL,
    d_size int NOT NULL,
    d_description varchar(248) NOT NULL,
    d_adresse varchar(100) NOT NULL,
    d_city varchar(30) NOT NULL,
    d_CP decimale(5,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `chat` (
    c_date date NOT NULL,
    c_content varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pictures` (
    p_id PRIMARY KEY SERIAL NOT NULL,
    p_title varchar(20) NOT NULL,
    p_name varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `house` (
    h_type varchar(2) NOT NULL,
    h_descri varchar(248) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `energy` (
    e_id PRIMARY KEY SERIAL NOT NULL,
    e_descri varchar(248) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO house (h_type, h_descri) VALUES ("T6","caca")