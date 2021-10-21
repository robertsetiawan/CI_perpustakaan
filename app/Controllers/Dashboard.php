<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\PeminjamanModel;
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

    public function addBorrowedBook(){
        $books = new BookModel();
        $data['availBooks'] = $books->where('stok_tersedia !=', 0)->findAll();
        return view('dashboard_addBorrowedBook.php', $data);
    }

    public function processBorrowedBook(){
        $books = $this->request->getPost('books');
        $member = new MemberModel();
        $transaksi = new TransaksiModel();

        $dataMember = $member->where('nim', $this->request->getVar('nim'))->first();
        if (empty($dataMember)){
            session()->setFlashdata('error', "NIM tidak tersedia");
            return redirect()->back()->withInput();
        }
        if (empty($books)){
            session()->setFlashdata('error', "Pilih buku yang dipinjam");
            return redirect()->back()->withInput();
        }
        if (count($books)>2){
            session()->setFlashdata('error', "Buku yang dipinjam maksimal 2 buku");
            return redirect()->back()->withInput();
        }
        if (!empty($this->request->getVar('nim')) and !empty($books) and count($books)<3){
            $transaksi->insertBorrowedBook((int)round(gettimeofday(true)), $this->request->getVar('nim'), session()->get('id'), $books);
        }
        return redirect()->to(base_url('dashboard/borrowed_book'));
    }
}
