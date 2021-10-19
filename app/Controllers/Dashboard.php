<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;
use App\Models\MemberModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $data['title'] = 'PERPUS|Dashboard';
        $data['username'] = $session->get('username');

        return view('dashboard_admin', $data);
    }

    public function getAllMembersFromDatabase()
    {
        $members = new MemberModel();
        $data['members'] = $members->findAll();
        return view('dashboard_db-list_anggota', $data);
    }
}
