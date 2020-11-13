<?php

/*
 * The user can see his profile and change the password
 */

namespace App\Controllers;

/**
 * Description of Staff
 * Staff controller is used for viewing of users roles
 * and for change the password too.
 * The page can be accessed only of authorized users.
 * @author evgenia
 */
use App\Models\UserModel;

class Staff extends BaseController {



    public function changepassword() {
        $data = [];
        $data['pageTitle'] = 'Change Password';
        $userID = session()->get('userID');
        $role = session()->get('role');
        if ($this->request->getMethod() == 'post') :



            $rules = ['password' => 'required|min_length[6]|max_length[255]',
                'password_confirm' => 'matches[password]'];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $newData = [
                    'password' => $this->request->getVar('password'),
                ];
                if ($role == 'register_only') {
                    $newData['staff'] = 'staff_active';
                }


                if ($model->update($userID, $newData) === false) {
                    print_r($model->errors());
                    die();
                }
                $session = session();
                $session->setFlashdata('success', 'Your password was updated.');

                return redirect()->to(base_url() . '/staff/profile');
            }

        endif;
        echo view('staff/includes/header', $data);
        echo view('staff/staff_changepassword_view', $data);
        echo view('staff/includes/footer');
    }

    public function profile() {

        $data = [];
        $data['pageTitle'] = 'Staff Profile';
        $model = new UserModel();
        session()->get('username');
        echo view('staff/includes/header', $data);
        echo view('staff/staff_profile_view', $data);
        echo view('staff/includes/footer');
    }

}
