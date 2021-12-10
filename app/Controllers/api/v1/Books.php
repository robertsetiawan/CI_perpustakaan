<?php

namespace App\Controllers\api\v1;

use App\Models\BookModel;
use App\Models\MemberModel;
use CodeIgniter\RESTful\ResourceController;

class Books extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        $output['status'] = true;

        $output['message'] = '';

        $output['data'] = $this->bookModel->getAvailableBookAndCategory();

        return $this->respond($output, 200);
    }

    public function getBorrowedBook()
    {
        $nim = $this->request->getPost('nim');

        if ($nim === null) {
            $output['status'] = false;

            $output['message'] = 'please provide nim!';

            $output['data'] = [];

            return $this->respond($output, 400);
        } else {

            $output['status'] = true;

            $output['message'] = '';

            $output['data'] = $this->memberModel->getDueBook($nim);

            return $this->respond($output, 200);
        }
    }
}
