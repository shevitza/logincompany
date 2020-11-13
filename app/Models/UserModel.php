<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends \CodeIgniter\Model {

    protected $table = 'user';
    protected $primaryKey = 'userID';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['username', 'fullname', 'email', 'password', 'departmentID', 'staff','bi'];
    //      protected $allowedFields = ['username', 'lastname', 'email', 'password'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
//    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[45]',
        'fullname' => 'required|min_length[5]|max_length[255]',
        'email' => 'required|min_length[6]|max_length[255]|valid_email',
        'password' => 'required|min_length[6]|max_length[255]',
//        'staff'=>'min_length[6]|max_length[255]',
//        'bi'=>'min_length[6]|max_length[255]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $beforeInsert = ['passwordHash'];
    protected $beforeUpdate = ['passwordHash'];

    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate($data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash($data) {
        if (isset($data['data']['password'])) {

            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

}
