<?php

namespace App\Controllers;

use App\Models\Barang_m;

class Home extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new Barang_m();
    }

    public function index()
    {
        $databarang = $this->barangModel->getBarang();
        $jumlahbarang = $this->barangModel->countAll();
        $data = [
            'title' => 'Dashboard | Inventaris HIMA-TI',
            'barang' => $databarang,
            'jumlahbarang' => $jumlahbarang
        ];
        echo view('layout/header', $data);
        echo view('layout/topbar');
        echo view('layout/sidebar_admin');
        echo view('admin/dashboard', $data);
        echo view('layout/footer');
    }

    public function login()
    {
        $data = [
            'title' => 'Login | Inventaris HIMA-TI'
        ];
        echo view('layout/header', $data);
        echo view('admin/login');
    }

    public function pelanggan()
    {
        $data = [
            'title' => 'Pelanggan | Inventaris HIMA-TI'
        ];
        echo view('layout/header', $data);
        echo view('layout/topbar');
        echo view('layout/sidebar_admin');
        echo view('admin/pelanggan');
        echo view('layout/footer');
    }

    public function pinjambarang()
    {
        $data = [
            'title' => 'Pinjam Barang | Inventaris HIMA-TI'
        ];
        echo view('layout/header', $data);
        echo view('layout/topbar');
        echo view('layout/sidebar_admin');
        echo view('admin/pinjambarang');
        echo view('layout/footer');
    }

    public function titipbarang()
    {
        $data = [
            'title' => 'Titip Barang | Inventaris HIMA-TI'
        ];
        echo view('layout/header', $data);
        echo view('layout/topbar');
        echo view('layout/sidebar_admin');
        echo view('admin/titipbarang');
        echo view('layout/footer');
    }

    public function user()
    {
        $data = [
            'title' => 'User | Inventaris HIMA-TI'
        ];
        echo view('layout/header', $data);
        echo view('layout/topbar');
        echo view('layout/sidebar_admin');
        echo view('admin/user');
        echo view('layout/footer');
    }
}
