CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use `project`;

CREATE TABLE IF NOT EXISTS `users` (
    `u_id` int unsigned auto_increment not null primary key ,
    `u_email` varchar(255) not null ,
    `u_mdp` varchar(255) NOT NULL,
    `u_pseudo` varchar(255) NOT NULL,
    `u_nom` varchar(255) NOT NULL,
    `u_prenom` varchar(255) NOT NULL,
    `u_admin` BOOLEAN NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `advertise` (
    `d_id` int unsigned auto_increment primary key not null,
    `d_ref_users` int unsigned not null,
    `d_title` varchar(20) NOT NULL,
    `d_price_rent` int NOT NULL,
    `d_price_taxe` int NOT NULL,
    `d_type_heating` varchar(10) NOT NULL,
    `d_size` int NOT NULL,
    `d_description` varchar(248) NOT NULL,
    `d_adresse` varchar(100) NOT NULL,
    `d_city` varchar(30) NOT NULL,
    `d_CP` int unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `chat` (
    `c_ref_users` int unsigned not null,
    `c_ref_advertise` int unsigned not null,
    `c_date` date NOT NULL,
    `c_content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pictures` (
    `p_id` int unsigned auto_increment not null primary key,
    `p_ref_advertise` int unsigned not null ,
    `p_title` varchar(20) NOT NULL,
    `p_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `house` (
    `h_type` varchar(2) NOT NULL primary key ,
    `h_ref_advertise` int unsigned not null,
    `h_descri` varchar(248) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `energy` (
    `e_id` int unsigned auto_increment not null primary key,
    `e_ref_advertise` int unsigned not null ,
    `e_descri` varchar(248) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE house
    ADD  FOREIGN KEY fk_h_id_advertise (`h_ref_advertise`) REFERENCES advertise(`d_id`);

ALTER TABLE pictures
    ADD FOREIGN KEY fk_p_id_advertise (`p_ref_advertise`) REFERENCES advertise(`d_id`);

ALTER TABLE energy
    ADD FOREIGN KEY fk_e_id_advertise (`e_ref_advertise`) REFERENCES advertise(`d_id`);

ALTER TABLE advertise
    ADD FOREIGN KEY fk_d_id_advertise (`d_ref_users`) REFERENCES users(`u_id`);

ALTER TABLE chat
    ADD FOREIGN KEY fk_c_id_users (`c_ref_users`) REFERENCES users(`u_id`),
    ADD FOREIGN KEY fk_c_id_advertise (`c_ref_advertise`) REFERENCES advertise(`d_id`);

insert into `users`(`u_email`, `u_mdp`, `u_pseudo`, `u_nom`, `u_prenom`) values('email@gmail.com', 'aaaaa', 'pseudo', 'nom', 'prenom');
insert into `advertise`(`d_ref_users`, `d_title`, `d_price_rent`, `d_price_taxe`, `d_type_heating`, `d_size`, `d_description`, `d_adresse`, `d_city`, `d_CP`) values(1, 'Un titre 1', 100, 50, 'gaz', 30, 'Une très longue description de la maison', 'Ici', 'Paris', '75000');
insert into `advertise`(`d_ref_users`, `d_title`, `d_price_rent`, `d_price_taxe`, `d_type_heating`, `d_size`, `d_description`, `d_adresse`, `d_city`, `d_CP`) values(1, 'Un titre 2', 200, 150, 'élec', 32, 'Une très longue description de la maison', 'Là-bas', 'Nîmes', '30000');
insert into `advertise`(`d_ref_users`, `d_title`, `d_price_rent`, `d_price_taxe`, `d_type_heating`, `d_size`, `d_description`, `d_adresse`, `d_city`, `d_CP`) values(1, 'Un titre 3', 300, 250, 'charb', 34, 'Une très longue description de la maison', 'Très loin', 'Arles', '13000');
insert into `advertise`(`d_ref_users`, `d_title`, `d_price_rent`, `d_price_taxe`, `d_type_heating`, `d_size`, `d_description`, `d_adresse`, `d_city`, `d_CP`) values(1, 'Un titre 4', 400, 350, 'eau', 36, 'Une très longue description de la maison', 'Vraiment très très loin', 'Tokyo', '00000');
insert into `house`(`h_type`, `h_ref_advertise`, `h_descri`) values('T1', 1, 'petit');
insert into `house`(`h_type`, `h_ref_advertise`, `h_descri`) values('T2', 2, 'moyen');
insert into `house`(`h_type`, `h_ref_advertise`, `h_descri`) values('T3', 3, 'grand');
insert into `house`(`h_type`, `h_ref_advertise`, `h_descri`) values('T4', 4, 'moche');
insert into `energy`(`e_ref_advertise`, `e_descri`) values(1, 'zboubi');
insert into `energy`(`e_ref_advertise`, `e_descri`) values(2, 'zboubii');
insert into `energy`(`e_ref_advertise`, `e_descri`) values(3, 'zboubiii');
insert into `energy`(`e_ref_advertise`, `e_descri`) values(4, 'zboubiiii');