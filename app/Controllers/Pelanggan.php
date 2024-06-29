<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Pelanggan_m;
use App\Models\Pengguna_m;

class Pelanggan extends BaseController
{

    protected $pelangganModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->pelangganModel = new Pelanggan_m();
        $this->penggunaModel = new Pengguna_m();
    }

    public function index()
    {
        $iduser = session()->get('iduser');
        $user = $this->penggunaModel->find($iduser);
        $level_user = $user['level'];
        $nama_user = $user['nama'];
        $data = [
            'title' => 'Pelanggan | Inventaris HIMA-TI',
            'pelanggan' => $this->pelangganModel->getPelanggan(),
            'level_user' => $level_user,
            'nama_user' => $nama_user
        ];

        echo view('layout/header', $data);
        echo view('layout/topbar', $data);
        echo view('layout/sidebar_admin', $data);
        echo view('admin/kelolapelanggan', $data);
        echo view('layout/footer');
    }

    public function tambah()
    {
        $data = $this->request->getPost();
        $validation = \Config\Services::validation();

        $rules = [
            'idpelanggan' => [
                'rules' => 'required|is_unique[pelanggan.idpelanggan]|max_length[20]', // Tambahkan aturan max_length sesuai dengan panjang maksimum idpelanggan
                'errors' => [
                    'required' => 'ID pelanggan tidak boleh kosong',
                    'is_unique' => 'ID pelanggan sudah terdaftar',
                    'max_length' => 'ID pelanggan tidak boleh lebih dari 20 karakter', // Tambahkan pesan error untuk max_length
                ]
            ],
            'nama_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pelanggan tidak boleh kosong'
                ]
            ],
            'no_kontak' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor kontak tidak boleh kosong',
                    'numeric' => 'Nomor kontak harus berupa angka'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = $validation->getErrors();
            session()->setFlashdata('error', $errors);
            return redirect()->to('/pelanggan');
        }

        $tambah = $this->pelangganModel->insert([
            'idpelanggan' => $data['idpelanggan'],
            'nama_pelanggan' => $data['nama_pelanggan'],
            'no_kontak' => $data['no_kontak'],
            'delegasi' => $data['delegasi'],
        ]);

        if ($tambah) {
            session()->setFlashdata('success', 'Pelanggan berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Pelanggan gagal ditambahkan');
        }

        return redirect()->to('/pelanggan');
    }


    public function edit($idpelanggan)
    {
        $data = $this->request->getPost();
        $validation = \Config\Services::validation();
        $pelangganlama = $this->pelangganModel->find($idpelanggan);

        $rules = [
            'idpelanggan' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'ID pelanggan tidak boleh kosong',
                    'max_length' => 'ID pelanggan tidak boleh lebih dari 20 karakter',
                ],
            ],
            'nama_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pelanggan tidak boleh kosong',
                ],
            ],
            'no_kontak' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor kontak tidak boleh kosong',
                    'numeric' => 'Nomor kontak harus berupa angka',
                ],
            ],
        ];


        if (!$this->validate($rules)) {
            $errors = $validation->getErrors();
            $error = implode('<br>', array_map(function ($error) {
                return '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }, $errors));

            return redirect()->to('/pelanggan' . $idpelanggan)->withInput()->with('error', $error);
        }

        $updatedData = [
            'idpelanggan' => $data['idpelanggan'] ?? $pelangganlama['idpelanggan'],
            'nama_pelanggan' => $data['nama_pelanggan'] ?? $pelangganlama['nama_pelanggan'],
            'no_kontak' => $data['no_kontak'] ?? $pelangganlama['no_kontak'],
            'delegasi' => $data['delegasi'] ?? $pelangganlama['delegasi'],
        ];

        $request = $this->pelangganModel->updatePelanggan($idpelanggan, $updatedData);

        if ($request) {
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/pelanggan');
        } else {
            return redirect()->to('/pelanggan');
        }
    }



    public function hapus($idpelanggan)
    {
        $hapus = $this->pelangganModel->delete($idpelanggan);

        if ($hapus) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/pelanggan');
        } else {
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->to('/pelanggan');
        }
    }
}
