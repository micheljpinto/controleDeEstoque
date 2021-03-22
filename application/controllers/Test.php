<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_controller 
{

    public function index(){

        $userId= "1";
        echo $userId;

		$sql = "SELECT * FROM customers WHERE id = 1";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
            echo $row->rua;
            echo $row->nome;
        
        }

    }

}