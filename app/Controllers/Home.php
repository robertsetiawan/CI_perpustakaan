<?php

namespace App\Controllers;

use App\Models\BookModel;

class Home extends BaseController
{
    public function index()
    {
        $books = new BookModel();
        $data['books'] = $books->findAll();
        $data['count'] = 4;
        return view('home_page', $data);
    }

    public function databaseBuku()
    {
        $books = new BookModel();
        $data['books'] = $books->findAll();
        return view('home_db-buku', $data);
    }
}
