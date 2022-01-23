<?php

namespace App\Controllers;

//MODELS
use App\Models\SejarahModel;
use App\Models\PostModel;
use App\Models\SambutanModel;
use App\Models\PrestasiModel;
use App\Models\KontakModel;
use App\Models\GaleriModel;
use App\Models\GuruModel;



class Home extends BaseController
{
    private $data;

    protected $sejarahModel, $postModel, $sambutanModel, $prestasiModel, $kontakModel, $galeriModel, $guruModel;

    public function __construct()
    {
        $this->sejarahModel = new SejarahModel();
        $this->postModel = new postModel();
        $this->sambutanModel = new sambutanModel();
        $this->prestasiModel = new prestasiModel();
        $this->kontakModel = new kontakModel();
        $this->galeriModel = new galeriModel();
        $this->guruModel = new guruModel();
    }

    public function beranda()
    {
        $this->data = [
            'title' => "Beranda",
            'post' => $this->postModel->findAll(),
            'sambutan' => $this->sambutanModel->findAll(),
            'prestasi' => $this->prestasiModel->findAll(2),
            'kontak' => $this->kontakModel->findAll(),
            'guru' => $this->guruModel->findAll(5)
        ];

        return view('beranda_view', $this->data);
    }

    public function profil($segment)
    {
        $this->data = [
            'title' => "Profil",
            'keterangan' => $this->sejarahModel->findColumn('keterangan'),
            'visi' => $this->sejarahModel->findColumn('visi'),
            'misi' => $this->sejarahModel->findColumn('misi')
        ];

        $guru = [
            'title' => "Tenaga Pendidikan",
            'guru' => $this->guruModel->findAll()
        ];

        $prestasi = [
            'title' => "Prestasi",
            'prestasi' => $this->prestasiModel->findAll()
        ];

        if ($segment == "s") return view('profil_view', $this->data);
        elseif ($segment == "prestasi") return view('prestasi_view', $prestasi);
        elseif ($segment == "guru") return view('guru_view', $guru);
    }

    public function berita()
    {
        $this->data = [
            'title' => "Berita",
            'post' => $this->postModel->findAll(),
            'pengumuman' => $this->postModel->whereData('pengumuman')->getResultArray(),
            'galeri' => $this->galeriModel->findAll(6)
        ];

        return view('berita_view', $this->data);
    }

    public function detailBerita($id_post)
    {
        $this->data = [
            'title' => "Detail Berita",
            'post' => $this->postModel->find($id_post),
            'otherPost' => $this->postModel->otherPost($id_post)->getResultArray()
        ];

        return view('detail_berita', $this->data);
    }

    public function galeri()
    {
        $this->data = [
            'title' => "Galeri",
            'galeri' => $this->galeriModel->findAll()
        ];
        return view('galeri_view', $this->data);
    }

    public function kontak()
    {
        return view('kontak_view');
    }
}
