<?php

namespace App\Validation;

/**
 * Description of UserRules
 *
 * @author evgenia
 */
use App\Models\UserModel;

class UserRules {

    public function validateUser(string $str, string $fields, array $data) {
        $model = new UserModel();
        $user = $model->where('username', $data['username'])
                ->where('staff<>', 'staff_notactive')
                ->first();

        if (!$user) {
            return false;
        }

        return password_verify($data['password'], $user['password']);
    }

    public function validateBI(string $str, string $fields, array $data) {
        $model = new UserModel();

        $where = "(bi='bi_admin' OR bi='bi_active')";
        $user = $model->where('username', $data['username'])
                ->where($where)
                ->first();

        if (!$user) {
            return false;
        }
        return password_verify($data['password'], $user['password']);
    }

    public function validateAdmin(string $str, string $fields, array $data) {
        $model = new UserModel();

        $where = "(staff='staff_admin' OR bi='bi_admin' )";
        $user = $model->where('username', $data['username'])
                ->where($where)
                ->first();

        if (!$user) {
            return false;
        }
        return password_verify($data['password'], $user['password']);
    }

}
