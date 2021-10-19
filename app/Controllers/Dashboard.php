<?php namespace App\Controllers;

use App\Models\BookModel;
use App\Models\PeminjamanModel;

class Dashboard extends BaseController {
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

    public function getAvailBook(){
        $books = new BookModel();
        // $query = $books->query('SELECT * FROM buku WHERE stok_tersedia = 0');
        $data['books'] = $books->where('stok_tersedia !=', 0)->findAll();
        return view('dashboard_avail_book', $data);
        // $data['books'] = $books;
    }

    public function getBorrowedBook(){
        $peminjaman = new PeminjamanModel();

        $data['peminjaman'] = $peminjaman->getAllTransaction();
        return view('dashboard_borrowed_book', $data);
    }
}
