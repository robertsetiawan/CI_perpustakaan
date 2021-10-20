<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthMember implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('is_logged_in') || session()->get('is_admin'))
        { 
            return redirect()->to('/member');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}
?>