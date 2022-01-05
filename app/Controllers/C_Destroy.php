<?php

namespace App\Controllers;

class C_Destroy extends BaseController
{
    public function index()
    {
        $this->start();
        if(isset($_SESSION["id"])){
            //Connection to the database
            $db = db_connect();



            //Delete all the advertise the person maybe share
            $builder = $db->table('advertise');
            $builder->where('d_ref_users', $_SESSION["id"]);
            $query = $builder->get();
            if(count($query->getResultArray()) >= 1) {
                foreach($query->getResultArray() as $a){
                    $id = $a["d_id"];

                    //Delete all chat the person maybe had
                    $builder = $db->table('chat');
                    $builder->where('c_ref_users', $_SESSION["id"]);
                    $builder->where('c_ref_advertise', $id);
                    $query = $builder->get();
                    if(count($query->getResultArray()) >= 1) {
                        $builder->delete(['c_ref_users' => $_SESSION["id"], 'c_ref_advertise' => $id]);
                    }

                    //Delete all the pictures linked to the advertise
                    $builder = $db->table('pictures');
                    $builder->where('p_ref_advertise', $id);
                    $query = $builder->get();
                    if(count($query->getResultArray()) >= 1) {
                        $builder->delete(['p_ref_advertise' => $id]);
                    }

                    //Delete all chat the person maybe had
                    $builder = $db->table('house');
                    $builder->where('h_ref_advertise', $id);
                    $query = $builder->get();
                    if(count($query->getResultArray()) >= 1) {
                        $builder->delete(['h_ref_advertise' => $id]);
                    }

                    //Delete all chat the person maybe had
                    $builder = $db->table('energy');
                    $builder->where('e_ref_advertise', $id);
                    $query = $builder->get();
                    if(count($query->getResultArray()) >= 1) {
                        $builder->delete(['e_ref_advertise' => $id]);
                    }
                }
                $builder = $db->table('advertise');
                $builder->delete(['d_ref_users' => $_SESSION["id"]]);
            }

            //Find then delete the account with the given id
            $builder = $db->table('users');
            $builder->delete(['u_id' => $_SESSION["id"]]);
            unset($_SESSION["id"]);
        }
        return redirect()->to(base_url()."/Home");
    }
}