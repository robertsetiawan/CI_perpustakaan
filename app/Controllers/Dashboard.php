<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\PeminjamanModel;
use App\Models\CategoryModel;
use App\Models\MemberModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $data['title'] = 'PERPUS | Dashboard';
        $data['username'] = $session->get('username');

        return view('dashboard_admin', $data);
    }

    public function getAllBookFromDatabase()
    {
        $books = new BookModel();
        $data['books'] = $books->findAll();
        return view('dashboard_list_book', $data);
    }

    public function getAvailBook()
    {
        $books = new BookModel();
        // $query = $books->query('SELECT * FROM buku WHERE stok_tersedia = 0');
        $data['books'] = $books->where('stok_tersedia !=', 0)->findAll();
        return view('dashboard_avail_book', $data);
        // $data['books'] = $books;
    }

    public function getBorrowedBook()
    {
        $peminjaman = new PeminjamanModel();

        $data['peminjaman'] = $peminjaman->getAllTransaction();
        return view('dashboard_borrowed_book', $data);
    }

    public function getReturnedBook()
    {
        $pengembalian = new TransaksiModel();

        $data['pengembalian'] = $pengembalian->getAllTransaction();
        return view('dashboard_returned_book', $data);
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

    public function getAllMembersFromDatabase()
    {
        $members = new MemberModel();
        $data['members'] = $members->findAll();
        return view('dashboard_db-list_anggota', $data);
    }

    public function updatePengembalian($idtransaksi, $idbuku, $tgl_pinjam)
    {
        $trans = new TransaksiModel();
        
        // echo (strtotime(date('Y-m-d'))-strtotime($tgl_pinjam))/86400;

        // $date = date('Y-m-d', strtotime($tgl_pinjam));
        if((strtotime(date('Y-m-d'))-strtotime($tgl_pinjam))/86400 < 14){
            $trans->updateTransaction($idtransaksi, $idbuku);
        } else{
            $trans->updateTransactionFine($idtransaksi, $idbuku);
        }

        session()->setFlashdata('pesan', 'idbuku: ' .$idbuku);

        return redirect()->to(base_url('dashboard/borrowed_book'));
    }
}
