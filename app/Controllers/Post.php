<?php

namespace App\Controllers;

use App\Models\PostModel;

class Post extends BaseController
{

    private $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $data = [
            'posts' => $this->postModel->fetchData()->getResultObject()
        ];

        return view('/admin/post/post_view', $data);
    }

    public function viewPost()
    {
        $id_post = $this->request->getPost('id_post');
        $data = $this->postModel->find($id_post);
        return json_encode($data);
    }

    public function addPost()
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
            'isi' => $this->request->getPost('isi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'kategori' => $this->request->getPost('kategori')
        ];
        $this->postModel->save($data);

        return redirect()->to('/post');
    }

    public function updatePost()
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
            'isi' => $this->request->getPost('isi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'kategori' => $this->request->getPost('kategori'),
        ];

        //  Mengecek apakah user upload gambar atau tidak
        if ($gambarBaru->getError() == 4) {
            $this->postModel->update($id,  $data);
        } else {

            // //  Memindahkan gambar yg diupload ke /assets/img/
            $gambarBaru->move('./assets/img/', $namaGambarBaru);

            $data['gambar'] = $namaGambarBaru;

            $this->postModel->update($id,  $data);
        }

        return redirect()->to('/post');
    }

    public function deletePost()
    {
        $id = $this->request->getPost('id_post');
        $gambar = $this->postModel->find($id);

        //  menghapus data prestasi dalam database
        $this->postModel->deleteData($id);

        //  menghapus gambat
        unlink('./assets/img/' . $gambar['gambar']);
    }
}
