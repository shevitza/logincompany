<?php

namespace App\Models;

/**
 * Description of CustomModel
 *
 * @author evgenia
 */
use CodeIgniter\Database\ConnectionInterface;

class CustomModel {
protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }
    
    function department(){
       return $this->db->table('department')->get()->getResult();
    }

}
