<?php

namespace App\Controllers;

use App\Models\PrestasiModel;

class Prestasi extends BaseController
{
    private $prestasiModel;

    function __construct()
    {
        $this->prestasiModel = new PrestasiModel();
    }

    public function index()
    {
        $data = [
            'prestasi' => $this->prestasiModel->fetchData()->getResultObject()
        ];
        return view('/admin/profil/prestasi/prestasi_view', $data);
    }

    public function viewPrestasi()
    {
        $id_prestasi = $this->request->getPost('id_prestasi');
        $data = $this->prestasiModel->find($id_prestasi);
        return json_encode($data);
    }

    public function addPrestasi()
    {
        //  Menangkap gambar yang diupload
        $gambar = $this->request->getFile('gambar');

        //  Membuat nama random pada gambar
        $namaGambar = $gambar->getRandomName();

        //  Memindahkan gambar yg diupload ke /assets/img/
        $gambar->move('./assets/img/', $namaGambar);

        $data = [
            'judul' => $this->request->getPost('judul'),
            'gambar' => $namaGambar,
            'keterangan' => $this->request->getPost('keterangan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal' => $this->request->getPost('tanggal')
        ];
        $this->prestasiModel->save($data);

        return redirect()->to('/prestasi');
    }

    public function updatePrestasi()
    {
        $id = $this->request->getPost('id');
        $gambarLama = $this->request->getPost('gambar-lama');

        //  Menangkap gambar yang diupload
        $gambarBaru = $this->request->getFile('gambar');

        //  Membuat nama random pada gambar
        $namaGambarBaru = $gambarBaru->getRandomName();

        $data = [
            'judul' => $this->request->getPost('judul'),
            'gambar' => $gambarLama,
            'keterangan' => $this->request->getPost('keterangan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal' => $this->request->getPost('tanggal')
        ];

        //  Mengecek apakah user upload gambar atau tidak
        if ($gambarBaru->getError() == 4) {
            $this->prestasiModel->update($id,  $data);
        } else {

            // //  Memindahkan gambar yg diupload ke /assets/img/
            $gambarBaru->move('./assets/img/', $namaGambarBaru);

            $data['gambar'] = $namaGambarBaru;

            $this->prestasiModel->update($id,  $data);
        }

        return redirect()->to('/prestasi');
    }

    public function deletePrestasi()
    {
        $id = $this->request->getPost('id_prestasi');
        $gambar = $this->prestasiModel->find($id);

        //  menghapus gambat
        unlink('./assets/img/' . $gambar['gambar']);

        //  menghapus data prestasi dalam database
        $this->prestasiModel->deleteData($id);
    }
}
