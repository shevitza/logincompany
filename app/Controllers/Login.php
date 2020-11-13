<?php

namespace App\Controllers;

/**
 * Description of Login
 * Support all login action:
 * login ordinary user
 * login admin users to make changes in Control Panel
 * Login admin users to make changes in BI and DocFlow parts of application
 * if the user has role staff_admin he can change the roles and status of all another users
 * if the user has role bi_admin he can change roles of users for the BI  part of application
 * 
 * @author evgenia
 */
use App\Models\UserModel;
use App\Validation\UserRules;

class Login extends BaseController {

    public function bi() {
        $data['pageTitle'] = 'BI Login';

        if ($this->request->getMethod() == 'post') {
            //make validation

            $rules = [
                'username' => 'required|min_length[3]|max_length[45]',
                'password' => 'required|min_length[6]|max_length[255]|validateBI[username,password]',
            ];
            $errors = [
                'password' => [
                 'validateBI' => 'You ar not BI admin or the username or password are not correct. '
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                $model = new UserModel();
                $user = $model->where('username', $this->request->getVar('username'))
                        ->first();

                $department = department();
                if ($user['departmentID'] != null) {
                    $id = $user['departmentID'];
                    $user['departmenName'] = $department[$id];
                } else {
                    $user['departmenName'] = 'Not selected department yet.';
                }

                $this->setUserSessionBi($user);               

               return redirect()->to(base_url() . '/bi/index');
            }
        }

        $data['form_title'] = 'BI Cpanel';
        $data['form_action'] = '/login/bi';
        $data['form_color'] = '#D7F68D';
        echo view('login/includes/header', $data);
        echo view('login/login_form_view', $data);
        echo view('login/includes/footer');
    }


    function cpanel() {
        $data['pageTitle'] = 'Cpanel Admin Login';

        if ($this->request->getMethod() == 'post') {
            //make validation

            $rules = [
                'username' => 'required|min_length[3]|max_length[45]',
                'password' => 'required|min_length[6]|max_length[255]|validateAdmin[username,password]',
            ];
            $errors = [
                'password' => [
                    'validateAdmin' => 'You ar not admin or the username or password are not correct. '
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                $model = new UserModel();
                $user = $model->where('username', $this->request->getVar('username'))
                        ->first();

                $department = department();
                if ($user['departmentID'] != null) {
                    $id = $user['departmentID'];
                    $user['departmenName'] = $department[$id];
                } else {
                    $user['departmenName'] = 'Not selected department yet.';
                }

                $this->setUserSessionCpanel($user);

                return redirect()->to(base_url() . '/cpanel/showusers');
            }
        }

        $data['form_title'] = 'Login Cpanel';
        $data['form_action'] = '/login/cpanel';
        $data['form_color'] = '#F5FFC6';
        echo view('login/includes/header', $data);
        echo view('login/login_form_view', $data);
        echo view('login/includes/footer');
    }

    public function index() {
        $data['pageTitle'] = 'Index Login';
        echo view('login/includes/header', $data);
        echo view('login/login_index_view', $data);
        echo view('login/includes/footer');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url() . '/login/staff');
    }

    private function setUserSessionBi($user) {
        $data = [
            'userID' => $user['userID'],
            'username' => $user['username'],
            'fullname' => $user['fullname'],
            'email' => $user['email'],
            'role' => $user['bi'],
            'rolebi' => $user['bi'],
            'isLogedInBi' => true,
        ];
        session()->set($data);
        return true;
    }

    private function setUserSessionCpanel($user) {
        $data = [
            'userID' => $user['userID'],
            'username' => $user['username'],
            'fullname' => $user['fullname'],
            'email' => $user['email'],
            'departmentID' => $user['departmentID'],
            'departmenName' => $user['departmenName'],
            'role' => $user['staff'],
            'rolebi' => $user['bi'],
            'isLogedInCpanel' => true,
        ];
        session()->set($data);
        return true;
    }

    private function setUserSessionStaff($user) {
        $data = [
            'userID' => $user['userID'],
            'username' => $user['username'],
            'fullname' => $user['fullname'],
            'email' => $user['email'],
            'departmentID' => $user['departmentID'],
            'departmenName' => $user['departmenName'],
            'role' => $user['staff'],
            'bi' => $user['bi'],
            'isLogedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    public function staff() {
        $data = [];
        $data['pageTitle'] = 'Staff Login';


        if ($this->request->getMethod() == 'post') {
            //make validation

            $rules = [
                'username' => 'required|min_length[3]|max_length[45]',
                'password' => 'required|min_length[6]|max_length[255]|validateUser[username,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'The username or password are not correct'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                $model = new UserModel();
                $user = $model->where('username', $this->request->getVar('username'))
                        ->first();
                $department = department();
                if ($user['departmentID'] != null) {
                    $id = $user['departmentID'];
                    $user['departmenName'] = $department[$id];
                } else {
                    $user['departmenName'] = 'Not selected department yet.';
                }

                $this->setUserSessionStaff($user);
                return redirect()->to(base_url() . '/staff/profile');
            }
        }
        $data['form_title'] = 'Login Staff';
        $data['form_action'] = '/login/staff';
        $data['form_color'] = '#C9E4E7';
        echo view('login/includes/header', $data);
        echo view('login/login_form_view', $data);
        echo view('login/includes/footer');
        //TODO Add token for adding form
    }

}
