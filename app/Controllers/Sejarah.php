<?php

namespace App\Controllers;

use App\Models\SejarahModel;

class Sejarah extends BaseController
{
    private $sejarahModel;

    function __construct()
    {
        $this->sejarahModel = new SejarahModel();
    }

    public function index()
    {
        $data = [
            'sejarah' => $this->sejarahModel->findAll()
        ];
        return view('/admin/profil/sejarah/sejarah_view', $data);
    }

    public function updateSejarah()
    {
        $data = [
            'keterangan' => $this->request->getPost('keterangan'),
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
        ];

        $this->sejarahModel->update('1', $data);
    }
}
