<?php

namespace App\Controllers;

use App\Models\SambutanModel;

class Dashboard extends BaseController
{

    private $sambutanModel;

    public function __construct()
    {
        $this->sambutanModel = new SambutanModel();
    }

    public function index()
    {
        if (session("login") == "true") {
            $data = [
                'sambutan' => $this->sambutanModel->findAll()
            ];

            return view('/admin/dashboard_view', $data);
        } else {
            return redirect()->to("/login");
        }
    }

    public function updateData()
    {
        $gambarLama = $this->request->getPost('gambar-lama');

        //  Menangkap gambar yang diupload
        $gambarBaru = $this->request->getFile('gambar');

        //  Membuat nama random pada gambar
        $namaGambarBaru = $gambarBaru->getRandomName();

        $data = [
            'gambar' => $gambarLama,
            'kata_sambutan' => $this->request->getPost('kata'),
            'lokasi' => $this->request->getPost('lokasi'),
            'nama_kepsek' => $this->request->getPost('nama')
        ];

        //  Mengecek apakah user upload gambar atau tidak
        if ($gambarBaru->getError() == 4) {
            $this->sambutanModel->update("1",  $data);
        } else {

            // //  Memindahkan gambar yg diupload ke /assets/img/
            $gambarBaru->move('./assets/img/', $namaGambarBaru);

            $data['gambar'] = $namaGambarBaru;

            $this->sambutanModel->update("1",  $data);
        }
        return redirect()->to("/dashboard");
    }
}
