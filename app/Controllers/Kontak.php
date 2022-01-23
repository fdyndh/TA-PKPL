<?php

namespace App\Controllers;

use App\Models\KontakModel;

class Kontak extends BaseController
{

    private $kontakModel;

    public function __construct()
    {
        $this->kontakModel = new KontakModel();
    }

    public function index()
    {
        $data = [
            'kontak' => $this->kontakModel->findAll()
        ];

        return view('/admin/kontak/kontak_view', $data);
    }

    public function updateData()
    {
        $alamat = $this->request->getPost('alamat');
        $jam_open = $this->request->getPost('jam_open');
        $mail = $this->request->getPost('mail');
        $telepon = $this->request->getPost('telepon');
        $this->kontakModel->query("UPDATE kontak SET alamat = '" . $alamat . "', jam_open = '" . $jam_open . "', mail = '" . $mail . "', telepon = '" . $telepon . "' WHERE id_kontak = '1'");
    }
}
