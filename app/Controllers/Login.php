<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Pengguna_m;

class Login extends BaseController
{
    protected $penggunaModel;

    public function __construct()
    {
        $this->penggunaModel = new Pengguna_m();
    }

    public function index()
    {
        $data = [
            'title' => 'Login | Inventaris HIMA-TI',
            'pengguna' => $this->penggunaModel->getPengguna()
        ];
        echo view('layout/header', $data);
        echo view('admin/login', $data);
        echo view('layout/footer');
    }

    public function login()
    {
        $validation = \Config\Services::validation();

        $validation = \Config\Services::validation();

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ]
        ];

        $validation->setRules($rules);

        if (!$this->validate($rules)) {
            $errors = $validation->getErrors();
            session()->setFlashdata('gagal', $errors);
            return redirect()->to('/')->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $penggunaModel = new Pengguna_m();
        $pengguna = $penggunaModel->where('username', $username)->first();

        // Periksa apakah pengguna ditemukan dan cocok dengan password yang diberikan
        if ($pengguna && $password == $pengguna['password']) {
            $dataUser = $pengguna; // Mengembalikan data pengguna jika login berhasil
        } else {
            session()->setFlashdata('gagal', 'Username atau password salah');
            return redirect()->back()->withInput();
        }

        // Periksa apakah login berhasil
        if ($dataUser != null) {
            // Login berhasil
            session()->set('iduser', $pengguna['iduser']);
            session()->set('level', $pengguna['level']);
            session()->set('status_login', true);
            session()->set('username', $pengguna['username']);
            session()->set('password', $pengguna['password']);
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('gagal', 'Username atau password salah');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Anda berhasil logout');
    }
}
