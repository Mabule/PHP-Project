<?php

namespace App\Models;

use CodeIgniter\Model;

class M_personnal_change extends Model
{
    public function load_data($id) : array{
        $db = db_connect();
        $builder = $db->table('users');
        $builder->where('u_id', $id);
        $query = $builder->get();
        $var = [
            "nom" => $query->getResultArray()[0]['u_nom'],
            "prenom" => $query->getResultArray()[0]['u_prenom'],
            "mdp" => $query->getResultArray()[0]['u_mdp'],
            "email" => $query->getResultArray()[0]['u_email'],
            "login" => $query->getResultArray()[0]['u_pseudo']
        ];
        return $var;
    }
}