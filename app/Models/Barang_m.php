<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_m extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'kdbarang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kdbarang', 'idkategori', 'nama_barang', 'tgl_masuk', 'kondisi_barang', 'foto_barang'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getBarang()
    {
        $builder = $this->db->table('barang');
        $builder->select('barang.*, kategori.nama_kategori');
        $builder->join('kategori', 'kategori.idkategori = barang.idkategori');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function isKodeBarangUnique($kdbarang)
    {
        $query = $this->db->table('barang')
            ->where('kdbarang', $kdbarang)
            ->get();

        return $query->getNumRows() === 0;
    }

    public function editBarang($kdbarang, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('kdbarang', $kdbarang);
        return $builder->update($data);
    }

    public function getBarangByFilter($kategori = null, $start_date = null, $end_date = null, $kondisi = null, $cetak_semua = false)
    {
        $builder = $this->db->table('barang');
        $builder->select('barang.*, kategori.nama_kategori');
        $builder->join('kategori', 'barang.idkategori = kategori.idkategori');

        if (!$cetak_semua) {
            if ($kategori) {
                $builder->where('barang.idkategori', $kategori);
            }
            if ($start_date && $end_date) {
                $builder->where('barang.tgl_masuk >=', $start_date);
                $builder->where('barang.tgl_masuk <=', $end_date);
            } elseif ($start_date) {
                $builder->where('barang.tgl_masuk >=', $start_date);
            } elseif ($end_date) {
                $builder->where('barang.tgl_masuk <=', $end_date);
            }
            if ($kondisi) {
                $builder->where('barang.kondisi_barang', $kondisi);
            }
        }

        return $builder->get()->getResultArray();
    }

    public function getJumlahBarang()
    {
        return $this->countAll();
    }
}
