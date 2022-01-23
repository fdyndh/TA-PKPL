<?php

namespace App\Controllers;

use App\Models\GaleriModel;


class Galeri extends BaseController
{

    private $galeriModel;

    function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }

    public function index()
    {
        $data = [
            'galeri' => $this->galeriModel->fetchData()->getResultObject()
        ];
        return view('/admin/galeri/galeri_view', $data);
    }

    public function viewGaleri()
    {
        $id_galeri = $this->request->getPost('id_galeri');
        $data = $this->galeriModel->find($id_galeri);
        return json_encode($data);
    }

    public function addGaleri()
    {
        //  Menangkap gambar yang diupload
        $gambar = $this->request->getFile('gambar');

        //  Membuat nama random pada gambar
        $namaGambar = $gambar->getRandomName();

        //  Memindahkan gambar yg diupload ke /assets/img/
        $gambar->move('./assets/img/', $namaGambar);

        //  Mengambilkan input keterangan gambar
        $data = [
            'gambar' => $namaGambar,
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $this->galeriModel->save($data);

        return redirect()->to('/galeri');
    }

    public function updateGaleri()
    {
        $id = $this->request->getPost('id');
        $gambarLama = $this->request->getPost('gambar-lama');

        //  Menangkap gambar yang diupload
        $gambarBaru = $this->request->getFile('gambar');

        //  Membuat nama random pada gambar
        $namaGambarBaru = $gambarBaru->getRandomName();

        $data = [
            'gambar' => $gambarLama,
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        //  Mengecek apakah user upload gambar atau tidak
        if ($gambarBaru->getError() == 4) {
            $this->galeriModel->update($id,  $data);
        } else {

            // //  Memindahkan gambar yg diupload ke /assets/img/
            $gambarBaru->move('./assets/img/', $namaGambarBaru);

            $data['gambar'] = $namaGambarBaru;

            $this->galeriModel->update($id,  $data);
        }

        return redirect()->to('/galeri');
    }


    public function deleteGaleri()
    {
        $id = $this->request->getPost('id_galeri');
        $gambar = $this->galeriModel->find($id);

        //  menghapus data galeri dalam database
        $this->galeriModel->deleteData($id);

        //  menghapus gambar
        unlink('./assets/img/' . $gambar['gambar']);
    }
}
