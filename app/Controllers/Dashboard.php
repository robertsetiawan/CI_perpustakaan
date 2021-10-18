<?php namespace App\Controllers;

use App\Models\BookModel;

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
}
