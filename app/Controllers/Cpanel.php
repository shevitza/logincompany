<?php

/*
 * 
 * Make CRUD for user data.
 * Only admin has right to change user data - email, full name, depsrtment
 * The defalut password when admin create user is 111111. The admin cannot change users password.
 * Only the user can change his (her) password.
 * Admin cannot delete the user data if the user is changed his (her) password.
 * User can change his (her) password.
 */

namespace App\Controllers;

/**
 * Description of Cpanel
 *
 * @author evgenia
 */
use App\Models\UserModel;

class Cpanel extends BaseController {

    public function adduser() {

        if (session('role') !== 'staff_admin'):
            return redirect()->to('showusers');

        endif;

        $data['pageTitle'] = 'Control Panel - New User';
        if ($this->request->getMethod() == 'post') {
            //make validation

            $rules = [
                'username' => 'required|min_length[3]|max_length[45]|is_unique[user.username]',
                'fullname' => 'required|min_length[5]|max_length[255]',
                'email' => 'required|min_length[6]|max_length[255]|valid_email',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'The email or password are not correct'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                $newData = [
                    'username' => $this->request->getVar('username'),
                    'fullname' => $this->request->getVar('fullname'),
                    'email' => $this->request->getVar('email'),
                    'password' => '111111',
                    'staff' => 'register_only'
                ];

                $model = new UserModel();

                if ($model->save($newData) === false) {
                    print_r($model->errors());
                    die();
                }

                $session = session();
                $session->setFlashdata('success', 'Succsessfull new user data added!');
                return redirect()->to(base_url() . '/cpanel/adduser');
            }
        }
        echo view('cpanel/includes/header', $data);
        echo view('cpanel/cpanel_adduser_view', $data);
        echo view('cpanel/includes/footer');
        //   TODO Add token for adding form
    }

    public function showusers() {
        $data = array();
        $data['pageTitle'] = "Control Panel - Show Users";
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['department'] = department();
        echo view('cpanel/includes/header', $data);
        echo view('cpanel/cpanel_showusers_view', $data);
        echo view('cpanel/includes/footer');
        //TODO add token for deleting
    }

    public function delete($userID) {
        $model = new UserModel();
        $model->where('staff', 'register_only')->delete($userID);
        $session = session();
        $session->setFlashdata('success', 'Succsessfully deleted user!');
        return redirect()->to(base_url() . '/cpanel/showusers');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url() . '/login/index');
    }

    public function update($userID) {
        $data['pageTitle'] = 'Control Panel - Update User';

        $data['department'] = department();

        $model = new UserModel();
        $user = $model->find($userID);
        $data['user'] = $user;

        if ($this->request->getMethod() == 'post') {
            //make validation

            $rules = [
                'fullname' => 'required|min_length[5]|max_length[255]',
                'email' => 'required|min_length[6]|max_length[255]|valid_email',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'The email or password are not correct'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                $newData = [
                    'fullname' => $this->request->getVar('fullname'),
                    'email' => $this->request->getVar('email'),
                    'departmentID' => $this->request->getVar('departmentID'),
                    'staff' => $this->request->getVar('staff'),
                    'bi' => $this->request->getVar('bi')
                ];



                if ($model->update($userID, $newData) === false) {
                    print_r($model->errors());
                    die();
                }

                $session = session();
                $session->setFlashdata('success', 'User <b>' . $user['username'] . '</b> was updated.');

                return redirect()->to(base_url() . '/cpanel/showusers');
            }
        }
        echo view('cpanel/includes/header', $data);
        echo view('cpanel/cpanel_updateuser_view', $data);
        echo view('cpanel/includes/footer');
    }

    public function updatebionly($userID) {
        $data['pageTitle'] = 'Control Panel - Update BI only for the user';

        $data['department'] = department();
        $model = new UserModel();
        $user = $model->find($userID);
        $data['user'] = $user;
        $rules = ['bi' => 'required'];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {

            $newData = [
                'bi' => $this->request->getVar('bi')
            ];
            if ($model->update($userID, $newData) === false) {
                print_r($model->errors());
                die();
            }

            $session = session();
            $session->setFlashdata('success', 'User <b>' . $user['username'] . '</b> was updated.');

            return redirect()->to(base_url() . '/cpanel/showusers');
        }
        echo view('cpanel/includes/header', $data);
        echo view('cpanel/cpanel_updatebionly_view', $data);
        echo view('cpanel/includes/footer');
    }

}
