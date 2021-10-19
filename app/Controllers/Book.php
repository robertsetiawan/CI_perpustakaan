<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class Book extends BaseController
{
    public function __construct()
    {
        $this->books = new BookModel();
        $this->categories = new CategoryModel();
    }
    private function generateErrorToView($validation)
    {
        if ($validation->hasError('isbn')) {
            session()->setFlashdata('error_isbn', $validation->getError('isbn'));
        }
        if ($validation->hasError('judul')) {
            session()->setFlashdata('error_judul', $validation->getError('judul'));
        }
        if ($validation->hasError('pengarang')) {
            session()->setFlashdata('error_pengarang', $validation->getError('pengarang'));
        }
        if ($validation->hasError('penerbit')) {
            session()->setFlashdata('error_penerbit', $validation->getError('penerbit'));
        }
        if ($validation->hasError('kota_terbit')) {
            session()->setFlashdata('error_kota_terbit', $validation->getError('kota_terbit'));
        }
        if ($validation->hasError('editor')) {
            session()->setFlashdata('error_editor', $validation->getError('editor'));
        }
        if ($validation->hasError('stok')) {
            session()->setFlashdata('error_stok', $validation->getError('stok'));
        }
    }

    public function getAllBookFromDatabase()
    {

        $data['books'] = $this->books->findAll();
        $data['categories'] = $this->categories->findAll();
        return view('dashboard_list_book', $data);
    }

    public function addBook()
    {

        $data['categories'] = $this->categories->findAll();
        return view('dashboard_add_book', $data);
    }

    public function newBook()
    {
        $validation = \Config\Services::validation();

        $validation->setRules($this->books->validationRules, $this->books->errorMessage);

        $isValid = $validation->withRequest($this->request)->run(); //validasi semua input kecuali gambar dan id kategori

        if ($this->request->getPost('idkategori') == 'lainnya' && empty($this->request->getPost('input-kategori'))) //validasi id kategori
        {
            session()->setFlashdata('error_idkategori', 'Jika memilih "lainnya" maka kategori harus ditentukan');

            $isValid = false;
        }

        if (!$this->validate([ //validasi type dan ukuran gambar
            'gambarbuku' => [
                'rules' => 'uploaded[gambarbuku]|mime_in[gambarbuku,image/jpg,image/jpeg,image/png]|max_size[gambarbuku,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'Format File Harus Berupa jpg,jpeg,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error_image_1', $this->validator->getError('gambarbuku'));

            $isValid = false;
        }


        if ($this->request->getFile('gambarbuku') == null || !$this->request->getFile('gambarbuku')->isValid())  //validasi gambar null atau error karena upload
        {
            session()->setFlashdata('error_image_2', 'terjadi kesalahan upload gambar');

            $isValid = false;
        }

        if ($isValid) {
            $file = $this->request->getFile('gambarbuku');

            $fileName = $file->getRandomName();

            $file->move(ROOTPATH . 'public/uploads/', $fileName);
            if ($this->request->getPost('idkategori') == 'lainnya' && !empty($this->request->getPost('input-kategori'))) {
                $idkategori = $this->categories->insert(['nama' => $this->request->getPost('input-kategori')], true);
                $data = [
                    'isbn' => $this->request->getPost('isbn'),
                    'judul' => $this->request->getPost('judul'),
                    'idkategori' => $idkategori,
                    'pengarang' => $this->request->getPost('pengarang'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'kota_terbit' => $this->request->getPost('kota_terbit'),
                    'editor' => $this->request->getPost('editor'),
                    'file_gambar' => $fileName,
                    'tgl_insert' => date("Y-m-d"),
                    'tgl_update' => date("Y-m-d"),
                    'stok' => $this->request->getPost('stok'),
                    'stok_tersedia' => $this->request->getPost('stok'),
                ];
                $this->books->insert($data);
            } else {
                $data = [
                    'isbn' => $this->request->getPost('isbn'),
                    'judul' => $this->request->getPost('judul'),
                    'idkategori' => $this->request->getPost('idkategori'),
                    'pengarang' => $this->request->getPost('pengarang'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'kota_terbit' => $this->request->getPost('kota_terbit'),
                    'editor' => $this->request->getPost('editor'),
                    'file_gambar' => $fileName,
                    'tgl_insert' => date("Y-m-d"),
                    'tgl_update' => date("Y-m-d"),
                    'stok' => $this->request->getPost('stok'),
                    'stok_tersedia' => $this->request->getPost('stok'),
                ];
                $this->books->insert($data);
            }
            return redirect()->to('/dashboard/list_book');
        } else {

            $this->generateErrorToView($validation);

            return redirect()->back()->withInput();
        }
    }

    public function addNewCategory()
    {
        if (!empty($this->request->getPost('kategori'))) {
            $this->categories->insert(['nama' => $this->request->getPost('kategori')]);
            return redirect()->to('/dashboard/list_book');
        } else {
            return redirect()->back();
        }
    }
}
