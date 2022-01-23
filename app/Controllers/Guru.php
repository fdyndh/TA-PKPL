<?php

namespace App\Controllers;

use App\Models\GuruModel;

class Guru extends BaseController
{

    private $guruModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }

    public function index()
    {
        $data = [
            'guru' => $this->guruModel->fetchData()->getResultObject()
        ];

        return view('/admin/guru/guru_view', $data);
    }

    public function viewGuru()
    {
        $id_guru = $this->request->getPost('id_guru');
        $data = $this->guruModel->find($id_guru);
        return json_encode($data);
    }

    public function addGuru()
    {
        //  Menangkap gambar yang diupload
        $gambar = $this->request->getFile('gambar');

        if ($gambar->getError() == 4) {
            $data = [
                'gambar' => "profil-default.png",
                'nama' => $this->request->getPost('nama'),
                'jabatan' => $this->request->getPost('jabatan')
            ];
        } else {

            //  Membuat nama random pada gambar
            $namaGambar = $gambar->getRandomName();

            //  Memindahkan gambar yg diupload ke /assets/img/
            $gambar->move('./assets/img/', $namaGambar);

            $data = [
                'gambar' => $namaGambar,
                'nama' => $this->request->getPost('nama'),
                'jabatan' => $this->request->getPost('jabatan')
            ];
        }

        $this->guruModel->save($data);

        return redirect()->to('/guru');
    }

    public function updateGuru()
    {
        $id = $this->request->getPost('id');
        $gambarLama = $this->request->getPost('gambar-lama');

        //  Menangkap gambar yang diupload
        $gambarBaru = $this->request->getFile('gambar');

        //  Membuat nama random pada gambar
        $namaGambarBaru = $gambarBaru->getRandomName();

        $data = [
            'gambar' => $gambarLama,
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan')
        ];

        //  Mengecek apakah user upload gambar atau tidak
        if ($gambarBaru->getError() == 4) {
            $this->guruModel->update($id,  $data);
        } else {

            // //  Memindahkan gambar yg diupload ke /assets/img/
            $gambarBaru->move('./assets/img/', $namaGambarBaru);

            $data['gambar'] = $namaGambarBaru;

            $this->guruModel->update($id,  $data);
        }

        return redirect()->to('/guru');
    }

    public function deleteGuru()
    {
        $id = $this->request->getPost('id_guru');
        $gambar = $this->guruModel->find($id);

        //  menghapus data prestasi dalam database
        $this->guruModel->deleteData($id);

        //  menghapus gambar
        if ($gambar['gambar'] != "profil-default.png") {
            unlink('./assets/img/' . $gambar['gambar']);
        }
    }
}
