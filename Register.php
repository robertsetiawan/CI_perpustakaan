<?php 
namespace App\Controllers;

use App\Models\UsersModel;

class Register extends BaseController
{
    public function index()
    {
        return view('vw_register');
    }

    public function process()
    {
        if (!$this->validate([
            'nim' => [
                'rules' => 'required|min_length[14]|max_length[14]|is_unique[anggota.nim]',
                'errors' => [
                    'required' => 'Nim Harus Diisi !',
                    'min_length' => 'Nim Minimal 14 Karakter !',
                    'max_length' => 'Nim Maksimal 14 Karakter !',
                    'is_unique' => 'NIM sudah digunakan sebelumnya !'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama Harus diisi !',
                    'max_length' => 'Nama Maksimal 100 Karakter !',
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Alamat Harus diisi !',
                    'max_length' => 'Alamat Maksimal 100 Karakter !',
                ]
            ],
            'kota' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Kota Harus diisi !',
                    'max_length' => 'Kota Maksimal 20 Karakter !',
                ]
            ],
            'email' => [
                'rules' => 'required|max_length[50]|is_unique[anggota.email]',
                'errors' => [
                    'required' => 'Email Harus diisi !',
                    'max_length' => 'Email Maksimal 50 Karakter !',
                    'is_unique' => 'Email sudah terdaftar !',
                ]
            ],
            'no_telp' => [
                'rules' => 'required|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => 'Nomor Telepon Harus diisi !',
                    'min_length' => 'Nomor Telepon Minimal 11 Karakter !',
                    'max_length' => 'Nomor Telepon Maksimal 13 Karakter !',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[10]|max_length[50]',
                'errors' => [
                    'required' => 'Password Harus diisi !',
                    'min_length' => 'Password Minimal 10 Karakter !',
                    'max_length' => 'Password Maksimal 50 Karakter !',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password !',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new UsersModel();
        $users->insert([
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'kota' => $this->request->getVar('kota'),
            'no_telp' => $this->request->getVar('no_telp'),
            'password' => md5($this->request->getVar('password')),
        ]);
        return redirect()->to('/login');
    }
}
