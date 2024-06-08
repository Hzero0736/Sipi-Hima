<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Barang_m;
use App\Models\Kategori_m;
use CodeIgniter\Validation\ValidationInterface;
use Fpdf\Fpdf;

class Barang extends BaseController
{
    protected $kategoriModel;
    protected $barangModel;
    protected $validation;

    public function __construct()
    {
        $this->kategoriModel = new Kategori_m();
        $this->barangModel = new Barang_m();
        $this->validation = \Config\Services::validation();
    }


    public function generatePdf()
    {
        // Buat instance FPDF
        $pdf = new Fpdf();


        // Tambah halaman
        $pdf->AddPage();

        // Atur margin
        $pdf->SetMargins(10, 10, 10);

        // Atur font untuk kop surat
        $pdf->SetFont('Arial', 'B', 14);

        // Tambah logo (pastikan Anda memiliki file logo di direktori public)
        // Sesuaikan path dan ukuran logo
        $pdf->Image(base_url('hmti.png'), 10, 10, 30);

        // Nama perusahaan
        $pdf->Cell(40); // Menambahkan jarak ke kanan
        $pdf->Cell(0, 10, 'Nama Perusahaan', 0, 1, 'C');

        // Alamat perusahaan
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40); // Menambahkan jarak ke kanan
        $pdf->Cell(0, 10, 'Alamat Perusahaan, Kota, Provinsi, Kode Pos', 0, 1, 'C');

        // Informasi kontak
        $pdf->Cell(40); // Menambahkan jarak ke kanan
        $pdf->Cell(0, 10, 'Telepon: (021) 12345678 | Email: info@perusahaan.com', 0, 1, 'C');

        // Garis pembatas
        $pdf->Line(10, 40, 200, 40);
        $pdf->Ln(20); // Tambah jarak setelah kop surat

        // Tambahkan isi laporan atau tabel di sini
        // Misalnya, tambahkan judul laporan
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Laporan Barang', 0, 1, 'C');
        $pdf->Ln(10);

        // Tabel header
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 10, 'No', 1);
        $pdf->Cell(50, 10, 'Nama Barang', 1);
        $pdf->Cell(30, 10, 'Jumlah', 1);
        $pdf->Cell(30, 10, 'Harga', 1);
        $pdf->Cell(30, 10, 'Subtotal', 1);
        $pdf->Ln();

        // Tabel isi (contoh data, bisa diganti dengan data dari database)
        $pdf->SetFont('Arial', '', 10);
        // $barang = [
        //     ['nama' => 'Barang 1', 'jumlah' => 10, 'harga' => 10000],
        //     ['nama' => 'Barang 2', 'jumlah' => 5, 'harga' => 20000],
        // ];
        // $no = 1;
        // foreach ($barang as $item) {
        //     $subtotal = $item['jumlah'] * $item['harga'];
        //     $pdf->Cell(10, 10, $no++, 1);
        //     $pdf->Cell(50, 10, $item['nama'], 1);
        //     $pdf->Cell(30, 10, $item['jumlah'], 1);
        //     $pdf->Cell(30, 10, number_format($item['harga']), 1);
        //     $pdf->Cell(30, 10, number_format($subtotal), 1);
        //     $pdf->Ln();
        // }

        // Output PDF
        $pdf->Output('D', 'laporan_barang.pdf');
    }
    // public function generatePdf()
    // {
    //     $pdf = new Fpdf();
    //     // Tambah halaman
    //     $pdf->AddPage();

    //     // Atur margin
    //     $pdf->SetMargins(10, 10, 10);

    //     // Atur font untuk kop surat
    //     $pdf->SetFont('Arial', 'B', 14);

    //     // Tambah logo (pastikan Anda memiliki file logo di direktori public)
    //     // $pdf->Image(base_url('assets/img/hmti.png'), 10, 10, 30); // Sesuaikan path dan ukuran logo

    //     // Nama perusahaan
    //     $pdf->Cell(40);
    //     $pdf->Cell(0, 10, 'Nama Perusahaan', 0, 1, 'C');

    //     // Alamat perusahaan
    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->Cell(40);
    //     $pdf->Cell(0, 10, 'Alamat Perusahaan, Kota, Provinsi, Kode Pos', 0, 1, 'C');

    //     // Informasi kontak
    //     $pdf->Cell(40);
    //     $pdf->Cell(0, 10, 'Telepon: (021) 12345678 | Email: info@perusahaan.com', 0, 1, 'C');

    //     // Garis pembatas
    //     $pdf->Line(10, 40, 200, 40);
    //     $pdf->Ln(20); // Tambah jarak setelah kop surat

    //     $pdf->Output('D', 'laporan_barang.pdf');
    // }

    public function index()
    {
        $data = [
            'title' => 'Barang | Inventaris HIMA-TI',
            'barang' => $this->barangModel->getBarang(),
            'kategori' => $this->kategoriModel->getKategori(),
            'kondisi_barang' => [
                'Baik',
                'Rusak Ringan',
                'Rusak Berat'
            ]
        ];
        echo view('layout/header', $data);
        echo view('layout/topbar');
        echo view('layout/sidebar_admin');
        echo view('admin/kelolabarang');
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
            'foto_barang' => [
                'rules' => 'max_size[foto_barang,1024]|is_image[foto_barang]|mime_in[foto_barang,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto',
                    'uploaded' => 'Yang anda pilih bukan foto',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $validation->getErrors();
            $error = implode('<br>', array_map(function ($error) {
                return '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }, $errors));

            session()->setFlashdata('errors', $error);
            return redirect()->to('/barang')->withInput();
        }

        $namaBarang = $data['nama_barang'];
        $kategori = $this->kategoriModel->find($data['idkategori']);
        $singkatanKategori = strtoupper(substr($kategori['nama_kategori'], 0, 2));

        $words = explode(' ', $namaBarang);
        $singkatanBarang = '';
        foreach ($words as $word) {
            $singkatanBarang .= strtoupper(substr($word, 0, 3));
        }

        $tglMasuk = str_replace('-', '', $data['tgl_masuk']);

        $kdbarang = $singkatanKategori . '_' . $singkatanBarang . '_' . $tglMasuk;

        // Periksa keunikan kode barang
        if (!$this->barangModel->isKodeBarangUnique($kdbarang)) {
            session()->setFlashdata('error', 'Kode barang sudah ada, silakan coba lagi.');
            return redirect()->to('/barang');
        }

        $filegambar = $this->request->getFile('foto_barang');

        if ($filegambar->getError() == 4) {
            $namafoto = 'default.jpg';
        } else {
            $namafoto = $filegambar->getRandomName();
            $filegambar->move('img', $namafoto);
        }

        $request = $this->barangModel->insert([
            'kdbarang' => $kdbarang,
            'nama_barang' => $data['nama_barang'],
            'tgl_masuk' => $data['tgl_masuk'],
            'idkategori' => $data['idkategori'],
            'kondisi_barang' => $data['kondisi_barang'],
            'foto_barang' => $namafoto,
        ]);

        if ($request) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->to('/barang');
        } else {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/barang');
        }
    }


    public function edit($kdbarang)
    {
        $data = $this->request->getPost();
        $barangModel = new Barang_m();
        $validation = \Config\Services::validation();
        $barangLama = $barangModel->find($kdbarang);

        $rules = [
            'kdbarang' => [
                'rules' => $data['kdbarang'] != $barangLama['kdbarang'] ? 'required|is_unique[barang.kdbarang,kdbarang,' . $kdbarang . ']' : 'required',
                'errors' => [
                    'required' => 'Kode barang tidak boleh kosong',
                    'is_unique' => 'Kode barang sudah ada, silakan coba lagi'
                ],
            ],
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang tidak boleh kosong'
                ]
            ],
            'foto_barang' => $this->request->getFile('foto_barang') ? [
                'rules' => 'max_size[foto_barang,1024]|is_image[foto_barang]|mime_in[foto_barang,image/jpg,image/jpeg,image/png]',
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
            return redirect()->to('/barang');
        } else {
            $barangLama = $barangModel->find($kdbarang);

            $fileGambar = $this->request->getFile('foto_barang');
            $namaFoto = null;

            if ($fileGambar && $fileGambar->isValid()) {
                $namaFoto = $fileGambar->getRandomName();
            }

            if ($namaFoto) {
                if ($barangLama['foto_barang'] != 'default.jpg') {
                    unlink('img/' . $barangLama['foto_barang']);
                }

                if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                    $fileGambar->move('img', $namaFoto);
                }

                $data['foto_barang'] = $namaFoto;
            } else {
                $data['foto_barang'] = $barangLama['foto_barang'];
            }

            $ubah = $barangModel->editBarang($kdbarang, $data);
            if (!$ubah) {
                session()->setFlashdata('error', 'Data gagal diubah');
                return redirect()->to('/barang');
            } else {
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect()->to('/barang');
            }
        }
    }

    public function hapus($kdbarang)
    {
        $barang = $this->barangModel->find($kdbarang);

        if ($barang['foto_barang'] != 'default.jpg') {
            unlink('img/' . $barang['foto_barang']);
        }
        $hapus = $this->barangModel->delete($kdbarang);
        if (!$hapus) {
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->to('/barang');
        } else {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/barang');
        }
    }
}
