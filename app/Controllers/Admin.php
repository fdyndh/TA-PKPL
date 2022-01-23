<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{

    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'admin' => $this->adminModel->findAll()
        ];

        return view('/admin/admin_view', $data);
    }

    public function updateData()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $this->adminModel->query("UPDATE admin SET username = '" . $username . "', password = '" . $password . "' WHERE id_admin = '1'");
    }
}
