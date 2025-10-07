<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    // Login Page
    public function index()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[6]',
                'password' => 'required|min_length[8]|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Username or Password do not match.'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $user = $model->where('username', $this->request->getVar('username'))
                              ->first();

                $this->setUserSession($user);
                return redirect()->to('profile');
            }
        }

        return view('login', $data);
    }

    private function setUserSession($user) {
        $data = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'middle_name' => $user['middle_name'],
            'last_name' => $user['last_name'],
            'username' => $user['username'],
            'password' => $user['password'],
            'email' => $user['email'],
            'contact_number' => $user['contact_number'],
            'birthday' => $user['birthday'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'first_name' => 'required|alpha',
                'middle_name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'username' => 'required|alpha_numeric|min_length[6]|is_unique[users.username]',
                'password' => 'required|min_length[8]',
                'confirm_password' => 'required|min_length[8]|matches[password]',
                'email' => 'required|valid_email',
                'contact_number' => 'required|numeric',
                'birthday' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $newData = [
                    'first_name' => $this->request->getVar('first_name'),
                    'middle_name' => $this->request->getVar('middle_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'username' => $this->request->getVar('username'),
                    'password' => $this->request->getVar('password'),
                    'email' => $this->request->getVar('email'),
                    'contact_number' => $this->request->getVar('contact_number'),
                    'birthday' => $this->request->getVar('birthday'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Registration Successful!');
                return redirect()->to('/');
            }
        }

        return view('register', $data);
    }

    public function profile()
    {
        $data = [];
        helper(['form']);

        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'current_password' => 'required|checkCurrentPassword[current_password]',
                'new_password' => 'required|min_length[8]',
                'confirm_new_password' => 'required|matches[new_password]',
            ];

            $errors = [
                'current_password' => [
                    'checkCurrentPassword' => 'Current password is not the same with the old password.'
                ],
                'confirm_new_password' => [
                    'matches' => 'New password and Re-Enter new password should be the same.'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $updateData = [
                    'password' => $this->request->getVar('new_password'),
                ];
                $model->update(session()->get('id'), $updateData);
                
                $session = session();
                $session->setFlashdata('success', 'Password updated successfully!');
                return redirect()->to('profile');
            }
        }

        return view('profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}