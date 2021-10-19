<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $data['title'] = 'PERPUS|Dashboard';
        $data['username'] = $session->get('username');

        return view('dashboard_admin', $data);
    }

    public function getAllBookFromDatabase()
    {
        $books = new BookModel();
        $data['books'] = $books->findAll();
        return view('dashboard_list_book', $data);
    }

    public function addBook()
    {
        $categories = new CategoryModel();
        $data['categories'] = $categories->findAll();
        return view('dashboard_add_book', $data);
    }

    public function newBook()
    {
        if (!$this->validate([
            'gambarbuku' => [
                'rules' => 'uploaded[gambarbuku]|mime_in[gambarbuku,image/jpg,image/jpeg,image/png]|max_size[gambarbuku,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'Format File Harus Berupa jpg,jpeg,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error_image', $this->validator->getError('gambarbuku'));

            return redirect()->back()->withInput();
        } else {
            $file = $this->request->getFile('gambarbuku');
            if (!$file == null && $file->isValid()) {
                $path = $this->request->getFile('gambarbuku')->store();
                echo $path;
            }
        }
    }
}
