<?php namespace App\Controllers;

class Dashboard extends BaseController {
    public function index()
    {
        $session = session();
        $data['title'] = 'PERPUS|Dashboard';
        $data['username'] = $session->get('username');

        return view('dashboard_admin', $data);
    }
}
