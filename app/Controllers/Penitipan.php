<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Pdfgenerator;
use App\Models\penitipan_m;
use App\Models\pelanggan_m;
use App\Models\Pengguna_m;

class Penitipan extends BaseController
{
    // protected $kategoriModel;
    protected $penitipanModel;
    protected $pelangganModel;
    protected $penggunaModel;
    protected $validation;

    public function __construct()
    {
        // $this->kategoriModel = new Kategori_m();
        $this->penitipanModel = new penitipan_m();
        $this->penggunaModel = new Pengguna_m();
        $this->pelangganModel = new Pelanggan_m();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $iduser = session()->get('iduser');
        $user = $this->penggunaModel->find($iduser);
        $level_user = $user['level'];
        $nama_user = $user['nama'];
        $data = [
            'title' => 'Penitipan | Inventaris HIMA-TI',
            'titipbarang' => $this->penitipanModel->getTitipbarangadmin(),
            'pelanggan' => $this->pelangganModel->getPelanggan(),
            'level_user' => $level_user,
            'nama_user' => $nama_user,
            'status' => [
                'selesai',
                'belum selesai',
                'proses'
            ]
        ];
        echo view('layout/header', $data);
        echo view('layout/topbar', $data);
        echo view('layout/sidebar_admin', $data);
        echo view('admin/kelolapenitipan', $data);
        echo view('layout/footer');
    }

    public function tambah()
    {
        $data = $this->request->getPost();

        $validation = \Config\Services::validation();

        $rules = [
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang tidak boleh kosong'
                ]
            ],
            'foto_titip' => [
                'rules' => 'max_size[foto_titip,1024]|is_image[foto_titip]|mime_in[foto_titip,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto',
                    'uploaded' => 'Yang anda pilih bukan foto',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validation->getErrors();
            $error = implode('<br>', array_map(function ($error) {
                return '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }, $errors));

            session()->setFlashdata('errors', $error);
            return redirect()->to('/penitipan')->withInput();
        }

        $filegambar = $this->request->getFile('foto_titip');

        if ($filegambar->getError() == 4) {
            $namafoto = 'default.jpg';
        } else {
            $namafoto = $filegambar->getRandomName();
            $filegambar->move('img', $namafoto);
        }

        $request = $this->penitipanModel->insert([
            'idpelanggan' => $data['idpelanggan'],
            'nama_barang' => $data['nama_barang'],
            'jumlah_barang' => $data['jumlah_barang'],
            'deskripsi' => $data['deskripsi_titip'],
            'tgl_titip' => $data['tgl_titip'],
            'tgl_kembali' => $data['tgl_kembali'],
            'foto_titip' => $namafoto,
            'status' => $data['status'],
        ]);

        if (!$request) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->to('/penitipan');
        } else {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/penitipan');
        }
    }

    public function edit($id_penitipan)
    {
        $data = $this->request->getPost();
        $penitipanModel = new penitipan_m();
        $pelangganModel = new Pelanggan_m();
        $validation = \Config\Services::validation();
        $penitipanLama = $penitipanModel->find($id_penitipan);

        $rules = [
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang tidak boleh kosong'
                ]
            ],
            'foto_titip' => $this->request->getFile('foto_titip') ? [
                'rules' => 'max_size[foto_titip,1024]|is_image[foto_titip]|mime_in[foto_titip,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto',
                    'uploaded' => 'Yang anda pilih bukan foto',
                ]
            ] : [],
        ];

        if (!$this->validate($rules)) {
            $errors = $validation->getErrors();
            $error = implode('<br>', array_map(function ($error) {
                return '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }, $errors));
            session()->setFlashdata('error', $error);
            return redirect()->to('/penitipan');
        } else {
            $fileGambar = $this->request->getFile('foto_titip');
            $namaFoto = null;

            if ($fileGambar && $fileGambar->isValid()) {
                $namaFoto = $fileGambar->getRandomName();
            }

            if ($namaFoto) {
                if ($penitipanLama['foto_titip'] != 'default.jpg') {
                    unlink('img/' . $penitipanLama['foto_titip']);
                }

                if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                    $fileGambar->move('img', $namaFoto);
                }

                $data['foto_titip'] = $namaFoto;
            } else {
                $data['foto_titip'] = $penitipanLama['foto_titip'];
            }

            $data = array_merge($penitipanLama, $data);
            $data['nama_barang'] = $this->request->getPost('nama_barang');
            // ... data lainnya

            $ubah = $penitipanModel->update($id_penitipan, $data);
            if ($ubah === false) {
                session()->setFlashdata('error', 'Data gagal diubah');
                return redirect()->to('/penitipan');
            } else {
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect()->to('/penitipan');
            }
        }
    }


    public function hapus($id_penitipan)
    {
        $penitipan = $this->penitipanModel->find($id_penitipan);

        if ($penitipan['foto_titip'] != 'default.jpg') {
            unlink('img/' . $penitipan['foto_titip']);
        }
        $hapus = $this->penitipanModel->delete($id_penitipan);
        if (!$hapus) {
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->to('/penitipan');
        } else {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/penitipan');
        }
    }

    public function generatepdf()
    {
        $pelanggan = $this->request->getGet('pelanggan');
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');
        $cetak_semua = $this->request->getGet('cetak_semua');

        $logo_path = FCPATH . '/assets/img/hmti.png';
        $logo_base64 = $this->encodeImageToBase64($logo_path);

        $Pdfgenerator = new Pdfgenerator();
        $data = [
            'title' => 'Laporan Penitipan',
            'titipbarang' => $this->penitipanModel->getPenitipanByFilter($pelanggan, $start_date, $end_date, $cetak_semua),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'logo_base64' => $logo_base64,

        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_Penitipan_HIMA';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = view('admin/laporanpenitipan', $data);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
    private function encodeImageToBase64($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    public function cetaknota($id_penitipan)
    {
        $Pdfgenerator = new Pdfgenerator();
        $penitipan = $this->penitipanModel->find($id_penitipan);
        $data = [
            'title' => 'Nota Penitipan',
            'pelanggan' => $this->pelangganModel->find($penitipan['idpelanggan']),
            'penitipan' => $penitipan,
        ];

        $file_pdf = 'nota_penitipan_' . $penitipan['tgl_titip'];
        $paper = 'A6';
        $orientation = "portrait";
        $html = view('admin/notapenitipan', $data);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
