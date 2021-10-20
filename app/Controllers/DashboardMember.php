<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\MemberModel;

class DashboardMember extends BaseController
{
    public function index()
    {
        $session = session();
        $data['title'] = $session->get('username').'|Dashboard';
        $data['username'] = $session->get('username');
        $books = new BookModel();
        $data['books'] = $books->findAll();
        $member = new MemberModel;
        $data['peminjaman'] = $member->getDueBook($session->get('id'));
        
        return view('viewMembers/dashboard_member', $data);
    }

}
