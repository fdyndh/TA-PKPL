<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Session\Session;

class Login extends BaseController
{
    private $adminModel;
    private $session;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->session = session();
    }

    public function index()
    {
        return view('/login_view');
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $this->adminModel->findAll();
        if ($data[0]['username'] == $username && $data[0]['password'] == $password) {
            $this->session->set("login", "true");
            return redirect()->to('/dashboard');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to("/login");
    }
}
