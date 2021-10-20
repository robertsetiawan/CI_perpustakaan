<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Member extends BaseController
{
    protected $memberModel;

    public function __construct()
    {

        $this->memberModel = new MemberModel();
    }


    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('/viewMembers/login_member', $data);
    }

    public function login()
    {
        //validation

        $username_input = $this->request->getVar('username');
        $password_input = $this->request->getVar('password');
        $data = [
            'member' => $this->memberModel->where(['nama' => $username_input])->first()
        ];

        if (!empty($data['member'])) {
            $member = $data['member'];
            $password_user = $member['password'];

            if ($password_user == md5($password_input)) {
                $session_data = [
                    'username' => $member['nama'],
                    'id' => $member['nim'],
                    'is_logged_in' => true,
                    'is_admin' => false
                ];
                $session = session();
                $session -> set($session_data);
                //session()->set($session_data);
                return redirect()->to('/dashboard_member');
            } else {
                session()->setFlashdata('error_login', 'Username atau password tidak ditemukan');
                return redirect()->to('/member');
            }
        } else {
            session()->setFlashdata('error_login', 'Username atau password tidak ditemukan');
            return redirect()->to('/member');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function removeMember($nim){
        $this->memberModel->where('nim', $nim)->delete();
        return redirect()->to('/dashboard/list_member');
    }

}
