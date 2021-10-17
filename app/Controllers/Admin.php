<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->admin = new AdminModel();
    }

    private function generateErrorToView($validation)
    {
        if ($validation->hasError('nama')) {
            session()->setFlashdata('error_nama', $validation->getError('nama'));
        }
        if ($validation->hasError('password')) {
            session()->setFlashdata('error_password', $validation->getError('password'));
        }
    }

    public function index()
    {
        return view('login_admin', ['title' => 'PERPUS|Login Admin']);
    }

    public function register()
    {
    }

    public function login()
    {

        $name = $this->request->getPost('nama');
        $password = $this->request->getPost('password');

        $userid = $this->admin->getUserIdFromDatabase($name, $password);

        if (empty($userid)) {
            session()->setFlashdata('error_login', 'username dan password tidak ditemukan');

            return redirect()->back()->withInput();
        } else {
            $session = session();

            $login_data = [
                'id' => $userid,
                'username' => $name,
                'is_logged_in' => true
            ];

            $session->set($login_data);

            return redirect()->to('/dashboard');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/admin');
    }
}
