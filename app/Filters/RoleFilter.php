<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Lakukan pengecekan sebelum request, jika diperlukan
        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Dapatkan data pengguna dari session atau autentikasi
        $session = session();
        $username = $session->get('username'); // Misalnya, jika Anda menyimpan username dalam session

        // Cek jika username adalah 'admin' atau email adalah 'admin@gmail.com'
        if ($username === 'admin' || $username === 'admin@gmail.com') {
            // Redirect ke AdminController::index
            return redirect()->to('/admin');
        }

        // Jika bukan admin, tidak perlu melakukan apa pun
        return $response;
    }
}
