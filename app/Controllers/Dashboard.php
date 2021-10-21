<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $data['title'] = 'PERPUS | Dashboard';
        $data['username'] = $session->get('username');

        return view('viewAdmin/dashboard_admin', $data);
    }
}
