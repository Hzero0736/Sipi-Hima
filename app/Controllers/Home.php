<?php

namespace App\Controllers;

use App\Models\Barang_m;
use App\Models\Pengguna_m;
use App\Models\Peminjaman_m;
use App\Models\Penitipan_m;
use App\Models\Pelanggan_m;

class Home extends BaseController
{
    protected $barangModel;
    protected $penggunaModel;
    protected $peminjamanModel;
    protected $penitipanModel;
    protected $pelangganModel;

    public function __construct()
    {
        $this->barangModel = new Barang_m();
        $this->penggunaModel = new Pengguna_m();
        $this->peminjamanModel = new Peminjaman_m();
        $this->penitipanModel = new Penitipan_m();
        $this->pelangganModel = new Pelanggan_m();
    }

    public function index()
    {
        $iduser = session()->get('iduser');
        $user = $this->penggunaModel->find($iduser);
        $level_user = $user['level'];
        $nama_user = $user['nama'];
        $databarang = $this->barangModel->getBarang();
        $jumlahbarang = $this->barangModel->countAll();
        $jumlahpengguna = $this->penggunaModel->countAll();
        $jumlahpelanggan = $this->pelangganModel->countAll();
        $jumlahpeminjaman = $this->peminjamanModel->getJumlahPeminjaman();
        $jumlahpenitipan = $this->penitipanModel->getJumlahPenitipan();
        $data = [
            'title' => 'Dashboard | Inventaris HIMA-TI',
            'barang' => $databarang,
            'jumlahbarang' => $jumlahbarang,
            'jumlahpengguna' => $jumlahpengguna,
            'jumlahpeminjaman' => $jumlahpeminjaman,
            'jumlahpenitipan' => $jumlahpenitipan,
            'jumlahpelanggan' => $jumlahpelanggan,
            'level_user' => $level_user,
            'nama_user' => $nama_user
        ];
        echo view('layout/header', $data);
        echo view('layout/topbar', $data);
        echo view('layout/sidebar_admin', $data);
        echo view('admin/dashboard', $data);
        echo view('layout/footer');
    }
}
