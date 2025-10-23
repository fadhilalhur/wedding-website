<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Services;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $uri = service('uri');
        $currentPath = $uri->getPath();
        // Lewati filter jika mengakses halaman login
        if ($currentPath === 'login') {
            return;
        }
        // Cek apakah user sudah login
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Jika ada parameter group, misal ['admin']
        if ($arguments && in_array('admin', $arguments)) {
            // Cek role pada session
            if ($session->get('role') !== 'admin') {
                // Redirect jika bukan admin
                return redirect()->to(base_url('login'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu aksi setelah
    }
}
