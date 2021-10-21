<?php

namespace App\Controllers;


use App\Models\PeminjamanModel;
use App\Models\MemberModel;
use App\Models\BookModel;

class Peminjaman extends BaseController
{

    public function addBorrowedBook(){
        $books = new BookModel();
        $data['availBooks'] = $books->where('stok_tersedia !=', 0)->findAll();
        return view('viewAdmin/dashboard_addBorrowedBook.php', $data);
    }

    public function getBorrowedBook()
    {
        $peminjaman = new PeminjamanModel();

        $data['peminjaman'] = $peminjaman->getAllTransaction();
        return view('viewAdmin/dashboard_borrowed_book', $data);
    }

    public function processBorrowedBook()
    {
        $books = $this->request->getPost('books');
        $member = new MemberModel();
        $peminjaman = new PeminjamanModel();

        $dataMember = $member->where('nim', $this->request->getVar('nim'))->first();
        if (empty($dataMember)) {
            session()->setFlashdata('error', "NIM tidak tersedia");
            return redirect()->back()->withInput();
        }
        if (empty($books)) {
            session()->setFlashdata('error', "Pilih buku yang dipinjam");
            return redirect()->back()->withInput();
        }
        if (count($books) > 2) {
            session()->setFlashdata('error', "Buku yang dipinjam maksimal 2 buku");
            return redirect()->back()->withInput();
        }
        if (!empty($this->request->getVar('nim')) and !empty($books) and count($books) < 3) {
            $peminjaman->insertBorrowedBook((int)round(gettimeofday(true)), $this->request->getVar('nim'), session()->get('id'), $books);
        }
        return redirect()->to(base_url('dashboard/borrowed_book'));
    }
}
