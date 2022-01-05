<?php

namespace App\Controllers;

class Launch extends BaseController
{
    public function creation(){
        $db = db_connect();
        $c_a = false;
        $c_c = false;
        $c_p = false;
        $c_h = false;
        $c_e = false;
        if (!$db->tableExists('users')) {
            $db->query("
            CREATE TABLE IF NOT EXISTS `users` (
            `u_id` int unsigned auto_increment not null primary key ,
            `u_email` varchar(255) not null ,
            `u_mdp` varchar(255) NOT NULL,
            `u_pseudo` varchar(255) NOT NULL,
            `u_nom` varchar(255) NOT NULL,
            `u_prenom` varchar(255) NOT NULL,
            `u_admin` BOOLEAN NOT NULL DEFAULT 0
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
        }
        if (!$db->tableExists('advertise')) {
            $db->query("CREATE TABLE IF NOT EXISTS `advertise` (
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
");
            $c_a = true;
        }
        if (!$db->tableExists('chat')) {
            $db->query("CREATE TABLE IF NOT EXISTS `chat` (
    `c_ref_users` int unsigned not null,
    `c_ref_advertise` int unsigned not null,
    `c_date` date NOT NULL,
    `c_content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
");
            $c_c = true;
        }
        if (!$db->tableExists('pictures')) {
            $db->query("
CREATE TABLE IF NOT EXISTS `pictures` (
    `p_id` int unsigned auto_increment not null primary key,
    `p_ref_advertise` int unsigned not null ,
    `p_title` varchar(20) NOT NULL,
    `p_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
            ");
            $c_p = true;
        }
        if (!$db->tableExists('house')) {
            $db->query("
CREATE TABLE IF NOT EXISTS `house` (
    `h_type` varchar(2) NOT NULL primary key ,
    `h_ref_advertise` int unsigned not null,
    `h_descri` varchar(248) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
            $c_h = true;
        }
        if (!$db->tableExists('energy')) {
            $db->query("
CREATE TABLE IF NOT EXISTS `energy` (
    `e_id` int unsigned auto_increment not null primary key,
    `e_ref_advertise` int unsigned not null ,
    `e_descri` varchar(248) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
            $c_e = true;
        }
        if($c_a){
            $db->query("ALTER TABLE advertise
    ADD FOREIGN KEY fk_d_id_advertise (`d_ref_users`) REFERENCES users(`u_id`);");
        }
        if($c_c){
            $db->query("ALTER TABLE chat
    ADD FOREIGN KEY fk_c_id_users (`c_ref_users`) REFERENCES users(`u_id`),
    ADD FOREIGN KEY fk_c_id_advertise (`c_ref_advertise`) REFERENCES advertise(`d_id`);");
        }
        if($c_p){
            $db->query("ALTER TABLE pictures
    ADD FOREIGN KEY fk_p_id_advertise (`p_ref_advertise`) REFERENCES advertise(`d_id`);");
        }
        if($c_h){
            $db->query("
            
            ALTER TABLE house
    ADD  FOREIGN KEY fk_h_id_advertise (`h_ref_advertise`) REFERENCES advertise(`d_id`);");
        }
        if($c_e){
            $db->query("
            ALTER TABLE energy
    ADD FOREIGN KEY fk_e_id_advertise (`e_ref_advertise`) REFERENCES advertise(`d_id`);");
        }
        return redirect()->to(base_url()."/Home");
    }
}